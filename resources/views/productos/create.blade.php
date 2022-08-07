@extends('layouts.layout', ['noFooter' => true])

@section('title', 'Crear Producto')

@section('content')
    @include('partials.navbar-dashboard')
    <section class="page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <x-alerta />
                    <h1>Nuevo producto</h1>
                    @include('productos.form', ['categorias' => $categorias]);
                </div>
            </div>
        </div>
    </section>
@endsection