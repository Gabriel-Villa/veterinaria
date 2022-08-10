<?php

namespace App\Http\Controllers;

use App\Models\OrdenFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedBackController extends Controller
{
    
    public function __construct(){
        $this->middleware('can:feedback.index')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $feedbacks = OrdenFeedback::query()->with('orden', 'tipo_feedback');
        $feedbacks = Auth::user()->hasRole('admin') 
            ? $feedbacks 
            : $feedbacks->whereHas('orden.detalle.producto',function($query) {
                $query->where('producto.id_proveedor', Auth::user()->id);
            });

        $feedbacks = $feedbacks->orderBy('orden_feedback.id_orden_feedback')->paginate(20);
        
        return view('feedback.index', compact('feedbacks'));
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
        $request->request->add(['id_tipo_feedback' => 4]);
        OrdenFeedback::insert($request->only(['id_orden', 'comentario' ,'id_tipo_feedback']));
        return redirect()->back()->with('message', 'Gracias por dejarnos  tu feedback');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($orden_id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_orden)
    {
        $feedback = OrdenFeedback::with('orden')->ByOrden($id_orden)->first();
        return view('feedback.form', compact('feedback', 'id_orden'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        OrdenFeedback::ByOrden($id)->update($request->only(['comentario']));
        return redirect()->back()->with('message', 'Actualizaste tu feedback !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
