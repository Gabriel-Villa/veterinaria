<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\ProductoDetalle;
use App\Models\TablaMaestroDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'], ['except' => ['show']]);
        $this->middleware('can:producto.index')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $productos = Producto::query();
        $productos = Auth::user()->hasRole('admin') ? $productos : $productos->ByProveedor(Auth::user()->id); 
        
        if (request()->has('search') && request()->filled('search')) {
            $productos = $productos->LikeNombre(request()->input('search'));
        }

        $productos = $productos->orderBy('producto.id_producto')->paginate(20);
        return view('productos.index', compact("productos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.form', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        try {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            
            $archivo = $request->file('image');
            $archivo->move(public_path().'/images/productos/',$name);

            $request->request->add(['imagen' => $name]);
            $id_producto = Producto::insertGetId($request->only(['id_proveedor', 'nombre', 'precio', 'descripcion', 'imagen', 'stock', 'id_categoria']));
            
            if($request->hasfile('image-detalle')){

                foreach($request->file('image-detalle') as $file)
                {
                    $nombre = $file->getClientOriginalName();
                    $file->move(public_path().'/images/productos/', $nombre);
                    ProductoDetalle::insert(['id_producto' => $id_producto, 'imagen' => $nombre]);
                }
            }

            return redirect()->back()->with('message', 'Producto creado exitosamente');

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => ['Ocurrio un error al crear el producto.']]);
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::ByNombre($id)->ByStock()->with('categoria', 'proveedor')->first();
            
        if(!$producto) abort(404);
        
        $producto_detalle = ProductoDetalle::ByIdProducto($producto->id_producto)->get();
        $metodos_pago = TablaMaestroDetalle::ByIdMaestro(1)->get();

        return view('productos.show', compact('producto', 'producto_detalle', 'metodos_pago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categoria::all();
        $producto = Producto::ById($id)->first();
        return view('productos.form', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        Producto::ById($id)->update($request->only(['id_proveedor', 'nombre', 'precio', 'descripcion', 'stock', 'id_categoria']));
        return redirect()->back()->with('message', 'Producto editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::ById($id)->delete();
        return redirect()->back()->with('message', 'Producto eliminada exitosamente');
    }
}
