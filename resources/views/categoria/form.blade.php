<form method="post"
    action="{{ isset($categoria->id_categoria) ? route('categoria.update', [$categoria->id_categoria]) : route('categoria.store') }}">
    
    @csrf
    @if (isset($categoria->id_categoria))
        @method('PATCH')
        <input type="hidden" name="id_categoria" id="id_categoria" value="{{ $categoria->id_categoria }}">
    @endif

    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            {{ isset($categoria->id_categoria) ? 'Editar categoria' : 'Crear categoria' }}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" value="{{ isset($categoria->nombre_categoria) ? $categoria->nombre_categoria : '' }}"
                class="form-control" name="nombre_categoria" aria-describedby="nombre" placeholder="Nombre Categoria">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">
            {{ isset($categoria->id_categoria) ? 'Editar' : 'Crear' }}
        </button>
    </div>
</form>
