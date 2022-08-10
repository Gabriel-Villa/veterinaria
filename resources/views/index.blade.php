@extends('layouts.layout')

@section('title', Config::get('app.name'))

<style>
    #nombre::placeholder { color: #545E62 !important; font-weight: normal !important}
</style>

@section('content')
    <div class="wrapper">
        <section class="page-section-pt">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <x-alerta />
                    </div>
                    <div class="w-100"></div>
                    <form method="get" {{ route('index') }} class="p-0 m-0 row" style="width: 100% !important;">

                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="filter-sidebar">
                                <div class="filter-widget">
                                    <div class="filter-title">
                                        <h5>Filtrar por categoria</h5>
                                    </div>
                                    <ul class="filter-list">
                                        @forelse ($categorias as $categoria)
                                            <div class="form-check custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="form-check-input check-categoria" {{ !is_null(request()->input('categoria')) && in_array($categoria->id_categoria, request()->input('categoria')) ? 'checked' : '' }} name="categoria[]" value="{{ $categoria->id_categoria }}">
                                            <label class="form-check-label" for="exampleCheck1">
                                                {{ $categoria->nombre_categoria }}
                                            </label>
                                        </div>
                                        @empty
                                            <label class="custom-control-label">Sin Categoria</label>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--Product Right-->
                        <div class="col-lg-9 col-md-9">
                            <div class="product-widget mb-3">
                                <div class="row ">
                                    <div class="col-lg-3 col-5 p-0">
                                        <select name="precio" class="custom-select">
                                            <option selected value="">Ordenar por</option>
                                            <option value="asc" {{ request()->input('precio') == 'asc' ? 'selected' : ''}}>Precio bajo - alto</option>
                                            <option value="desc" {{ request()->input('precio') == 'desc' ? 'selected' : ''}}>Price alto - bajo</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-4">
                                        <input class="form-control" type="text" name="nombre" id="nombre" style="background: white !important;border: 1px solid grey;" placeholder="Buscar Producto" value="{{ request()->input('nombre') }}">
                                    </div>
                                    <div class="col-lg 3 col-3">
                                        <button class="btn btn-primary">Filtrar <i style="margin-left: 10px;" class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!--item-->
                                @forelse ($productos as $index => $producto)
                                    <div class="col-4 col-sm-4 col-md-3 col-lg-3">
                                        <div class="productblock product-list-wrap product-list">
                                            <div class="Content">
                                                <a href="javascript:void(0)">
                                                    <img class="img-fluid" src="/images/productos/{{ $producto['imagen'] }}" alt="img" style="height: 250px; width: 250px;">
                                                </a>
                                                <div class="product-title"><a
                                                        href="product-detail-fullwidth.html">{{ $producto['nombre'] }}</a></div>
                                                <div class="product-price"> <ins>{{ $producto['precio'] }}</ins> </div>
                                                <a class="btn btn-success"
                                                    href="{{ route('producto.show', $producto['nombre']) }}">Detalle</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-danger font-weight-bold ml-3">Aun no hay productos disponibles !</p>
                                @endforelse
                                <div class="w-100"></div>
                                {{ $productos->links() }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
