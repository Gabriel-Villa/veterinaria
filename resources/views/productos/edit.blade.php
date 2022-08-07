@extends('layouts.layout', ['noFooter' => true])

@section('title', 'Editar Producto')

@section('content')
    @include('partials.navbar-dashboard')
    <section class="page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <x-alerta />
                    <h1>Editar Producto</h1>
                    @include('productos.form',  ['producto' => $producto, 'categorias' => $categorias]);
                </div>
            </div>
        </div>
    </section>
@endsection