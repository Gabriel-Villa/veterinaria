<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\OrdenDetalle;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdenController extends Controller
{
    
    public function __construct(){
        $this->middleware('can:orden.index')->only('orden.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
       
        $ordenes = Orden::query()->with('cliente', 'detalle');
        $ordenes = Auth::user()->hasRole('admin') 
            ? $ordenes 
            : $ordenes->whereHas('detalle.producto',function($query) {
                $query->where('producto.id_proveedor', Auth::user()->id);
            });

        $ordenes = $ordenes->orderBy('orden.id_orden', 'desc')->paginate(20);
        return view('ordenes.index', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {

            $producto = Producto::ById($request->id_producto)->first();

            if(!$producto) abort(404);

            $request->request->add([
                'id_cliente' => Auth::user()->id,
                'fecha_compra' => date("Y-m-d H:i:s"),
                'hora_entrega' => $request->hora_entrega.":".$request->minuto_entrega.":00"
            ]);

            $id_orden = Orden::insertGetId($request->only('id_cliente', 'fecha_entrega', 'mensaje', 'hora_entrega', 'fecha_compra'));

            $request->request->add([
                'id_orden' => $id_orden,
                'comision' => round(($request->cantidad * $producto->precio) / 100)
            ]);
     
            OrdenDetalle::insert($request->only('id_orden', 'id_producto', 'cantidad', 'comision', 'id_metodo_pago'));

            $producto->stock = $producto->stock - $request->cantidad; 
    
            return redirect()->back()->with('message', 'Orden de compra creada exitosamente');

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['credenciales' => ['Ocurrio un error al procesar tu compra.']]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdenController  $ordenController
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orden = Orden::ById($id)->with('cliente', 'detalle')->first();
        return view('ordenes.form', compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdenController  $ordenController
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdenController $ordenController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrdenController  $ordenController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdenController $ordenController)
    {
        Orden::ById($request->id_orden)->update($request->only(['estado', 'mensaje_proveedor']));
        return redirect()->back()->with('message', 'Orden actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdenController  $ordenController
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenController $ordenController)
    {
        //
    }

    public function mis_pedidos()
    {
        $pedidos = Orden::query()
            ->with('detalle')
            ->ByIdCliente(Auth::user()->id)
            ->orderBy('orden.id_orden', 'desc')
            ->paginate(20);
        // dd($pedidos);
        return view('ordenes.mis_pedidos', compact('pedidos'));
    }

}
