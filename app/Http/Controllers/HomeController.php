<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(Request $request)
    {
        $categorias = Categoria::take(5)->get();
        $productos = Producto::select('*')->ByStock();
        
        if($request->has('nombre') && $request->filled('nombre')){
            $productos->where('producto.nombre', 'like', '%'.$request->nombre.'%');
        }

        if($request->has('categoria') && $request->filled('categoria')){
            $productos->ByCatergoria($request->categoria);
        }

        if($request->has('precio') && $request->filled('precio')){
            $productos->orderBy('producto.precio', $request->precio);
        }
    
        $productos = $productos->paginate(8);
        $productos->appends($request->all());
        return view('index', compact('productos', 'categorias'));
    }

}
