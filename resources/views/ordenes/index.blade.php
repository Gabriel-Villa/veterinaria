@extends('layouts.layout', ['noFooter' => true])

@section('title', 'Ordenes')

@section('content')
    @include('partials.navbar-dashboard')
    <section class="page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-0">
                    <h1>Listado Ordenes </h1>
                    <x-alerta />
                    
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="text-dark">#</th>
                                <th scope="col" class="text-dark">Nombre Producto</th>
                                <th scope="col" class="text-dark">Cliente</th>
                                <th scope="col" class="text-dark">Categoria</th>
                                <th scope="col" class="text-dark text-center">Cantidad</th>
                                <th scope="col" class="text-dark">Mensaje</th>
                                <th scope="col" class="text-dark text-center">Fecha Compra</th>
                                <th scope="col" class="text-dark text-center">Fecha Entrega</th>
                                <th scope="col" class="text-dark text-center">Hora Entrega</th>
                                <th scope="col" class="text-dark text-center">Estado</th>
                                <th scope="col" class="text-dark">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ordenes as $index => $orden)
                                <tr>
                                    <th class="text-dark">{{ $index+1 }}</th>
                                    <td class="text-dark">{{ $orden->detalle->producto->nombre ?? '' }}</td>
                                    <th class="text-dark">{{ $orden->cliente->name ?? '' }} {{ $orden->cliente->apellido_paterno ?? '' }}</th>
                                    <td class="text-dark">{{ $orden->detalle->producto->categoria->nombre_categoria ?? '' }}</td>
                                    <td class="text-center text-dark">{{ $orden->detalle->cantidad ?? ''}}</td>
                                    <td>{{ $orden->mensaje }}</td>
                                    <td class="text-center text-dark">{{ Carbon\Carbon::parse($orden->fecha_compra)->format('d/m/Y') }}</td>
                                    <td class="text-center text-dark">{{ Carbon\Carbon::parse($orden->fecha_entrega)->format('d/m/Y') }}</td>
                                    <td class="text-center text-dark">{{ $orden->hora_entrega }}</td>
                                    <td class="text-center text-dark font-weight-bold">{{ config('helpers.estado_orden')[$orden->estado] }}</td>
                                    <td>
                                        <button class="btn btn-small btn-warning" onclick="editar_orden({{ $orden->id_orden }})">Editar <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        {{-- <form action="{{ route('orden.destroy', $orden->id_orden) }}" method="post">
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar esta orden')" name="name" value="Eliminar">	
                                        </form>	 --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="11">Aun no existe ni una orden de compra!.</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal" id="modal-orden" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal-body-orden" style="height: 450px !important;">
            </div>
        </div>
    </div>  

    <script>
        function editar_orden(id)
        {
            let url_editar = "{{ route('orden.show', ':id') }}".replace(":id", id);
            $.ajax({
                url: `${url_editar}`,
                type: "GET",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
                dataType: "HTML",
                success: function (data) {
                    $("#modal-orden").modal("show");
                    $("#modal-body-orden").html(data);
                },
            });
        }
    </script>

@endsection
