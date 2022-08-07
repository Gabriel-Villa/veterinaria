<form method="post" action="{{ route('orden.update', [$orden->id_orden]) }}">
    @csrf
    @if (isset($orden->id_orden))
        @method('PATCH')
        <input type="hidden" name="id_orden" id="id_orden" value="{{ $orden->id_orden }}">
    @endif
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            Editar Orden - 
            {{ $orden->cliente->name ?? '' }} 
            {{ $orden->cliente->apellido_paterno ?? '' }} 
            <i class="fa fa-user-o" aria-hidden="true"></i>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <p class="text-dark font-weight-bold">Producto: <span class="font-weight-normal">{{ $orden->detalle->producto->nombre ?? '' }}</span> </p>
        <p class="text-dark font-weight-bold">Cantidad: <span class="font-weight-normal">{{ $orden->detalle->cantidad ?? '' }}</span> </p>
        <div class="form-group">
            <label for="estado" class="text-dark">Estado orden</label>
            <select class="form-control" id="estado" name="estado">
                @foreach(config('helpers.estado_orden') as $index =>  $estado)
                    <option value="{{ $index }}" {{ $orden->estado == $index ? 'selected' : '' }}>{{ $estado }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="mensaje_proveedor" class="text-dark">Mensaje para el usuario</label>
            <textarea class="form-control" name="mensaje_proveedor" id="mensaje_proveedor" rows="3" maxlength="80">{{ $orden->mensaje_proveedor }}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
