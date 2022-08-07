@extends('layouts.layout', ['noFooter' => true])

@section('title', 'Categorias')

@section('content')
    @include('partials.navbar-dashboard')
    <section class="page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-0">
                    <h1>Listado categorias</h1>
                    <button class="btn btn-primary my-4" type="button" onclick="modal_categoria()">Nueva categoria</button>
                    <x-alerta />
                    
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="text-dark">#</th>
                                <th scope="col" class="text-center text-dark">Nombre</th>
                                <th scope="col" class="text-center text-dark">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categorias as $categoria)
                                <tr>
                                    <th scope="row" class="text-dark">{{ $categoria->id_categoria }}</th>
                                    <td class="text-center text-dark">{{ $categoria->nombre_categoria }}</td>
                                    <td>
                                        <div class="row d-flex justify-content-center">
                                            <button class="btn btn-small btn-warning" onclick="modal_categoria({{ $categoria->id_categoria }})">Editar <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <form action="{{ route('categoria.destroy', $categoria->id_categoria ) }}" method="post">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar esta categoria')" name="name" value="Eliminar">	
                                            </form>	
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="3">Aun no existe ni una categoria</th>
                                </tr>
                            @endforelse
                            {{ $categorias->links() }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal" id="modal-categoria" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal-body-categoria" style="height: 250px !important;">
            </div>
        </div>
    </div> 

    <script>
        function modal_categoria(id = null)
        {
            let url_editar = id == null 
                ? "{{ route('categoria.create') }}"
                : "{{ route('categoria.show', ':id') }}".replace(":id", id);

            $.ajax({
                url: `${url_editar}`,
                type: "GET",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
                dataType: "HTML",
                success: function (data) {
                    $("#modal-categoria").modal("show");
                    $("#modal-body-categoria").html(data);
                },
            });
        }
    </script>

@endsection
