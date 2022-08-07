@extends('layouts.layout', ['noFooter' => true])

@section('title', 'Crear Categoria')

@section('content')
    @include('partials.navbar-dashboard')
    <section class="page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <x-alerta />
                    <h1>Editar categoria</h1>
                    @include('categoria.form',  ['categoria' => $categoria]);
                </div>
            </div>
        </div>
    </section>
@endsection