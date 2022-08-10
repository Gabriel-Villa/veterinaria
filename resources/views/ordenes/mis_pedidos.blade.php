@extends('layouts.layout')

@section('title', 'Mis pedidos')

<style>
    #nombre::placeholder {
        color: #545E62 !important;
        font-weight: normal !important
    }
</style>

@php
    function formatear_total($pedido)
    {
        if( !isset($pedido->detalle->cantidad) && !isset($pedido->detalle->producto->precio) ){
            return 0;
        }
        return number_format(($pedido->detalle->cantidad * $pedido->detalle->producto->precio), 2);
    }
@endphp

@section('content')
    <div class="wrapper">
        <section class="page-section-pt">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <x-alerta />
                    </div>
                    <div class="w-100"></div>
                    <!--===== Wishlist Section =====-->
                    <div class="container">
                        <div class="main-block bg-light">
                            <div class="row">
                                <h3 class="text-center ml-3 mb-4 mt-1">Mis pedidos <i class="fa fa-archive" aria-hidden="true"></i></h3>
                                <div class="col-lg-12">
                                    <div class="table-responsive cart-table border-radius bg-white">
                                        <table class="table mb-0 table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Foto</th>
                                                    <th>Nombre</th>
                                                    <th>Total</th>
                                                    <th>Fecha Compra</th>
                                                    <th>Metodo Pago</th>
                                                    <th>Proveedor</th>
                                                    <th>Mensaje Proveedor</th>
                                                    <th>Estado</th>
                                                    <th>Reclamo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($pedidos as $pedido)
                                                    <tr>
                                                        <td class="thumbnail">
                                                            <img class="img-fluid rounded"src="/images/productos/{{ $pedido->detalle->producto->imagen ?? '' }}" alt="" style="height: 70px; width: 70px" />
                                                        </td>
                                                        <td class="text-dark">{{ $pedido->detalle->producto->nombre ?? '' }}</td>
                                                        <td class="text-dark">S/ {{  formatear_total($pedido) }}</td>
                                                        <td class="text-success">{{ Carbon\Carbon::parse($pedido->fecha_compra)->format('d/m/Y') }}</td>
                                                        <td class="text-dark">{{ $pedido->detalle->metodo_pago->valor ?? '' }}</td>
                                                        <td class="text-dark">{{ $pedido->detalle->producto->proveedor->name ?? '' }}</td>
                                                        <td class="text-dark">{{ $pedido->mensaje_proveedor }}</td>
                                                        <td class="text-dark text-weight-bold">{{ config('helpers.estado_orden')[$pedido->estado] }}</td>
                                                        <td class="remove-product text-dark">
                                                            <button class="btn btn-danger" onclick="modal_feedback({{ $pedido->id_orden }})">Reclamo <i class="fa fa-exclamation-circle ml-2" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <td colspan="8">
                                                        Aun no has comprado ni un producto , inicia ya ! 
                                                        <a class="btn btn-primary ml-3" href="{{ route('index') }}">Ver Productos</a> 
                                                    </td>
                                                @endforelse
                                                {{ $pedidos->links() }}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===== End Wishlist Section =====-->
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal" id="modal-reclamo" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal-body-reclamo">
            </div>
        </div>
    </div> 

    <script>
        function modal_feedback(orden_id)
        {
            let url_editar = "{{ route('feedback.edit', ':id') }}".replace(":id", orden_id);
            $.ajax({
                url: `${url_editar}`,
                type: "GET",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
                dataType: "HTML",
                success: function (data) {
                    $("#modal-reclamo").modal("show");
                    $("#modal-body-reclamo").html(data);
                },
            });
        }
    </script>

@endsection
