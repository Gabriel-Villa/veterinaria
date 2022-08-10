<form method="post"
    enctype="multipart/form-data"
    action="{{ isset($producto->id_producto) ? route('producto.update', [$producto->id_producto]) : route('producto.store') }}">
    
    @csrf

    @if (isset($producto->id_producto))
        @method('PATCH')
        <input type="hidden" name="id_producto" id="id_producto" value="{{ $producto->id_producto }}">
    @endif

    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            {{ isset($producto->id_producto) ? 'Editar producto' : 'Crear producto' }}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <input type="hidden" name="id_proveedor" value="{{ Auth::user()->id }}">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" value="{{ isset($producto->nombre) ? $producto->nombre : '' }}"
                name="nombre" id="nombre" aria-describedby="nombre" placeholder="Nombre Producto">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" value="{{ isset($producto->precio) ? $producto->precio : '' }}"
                name="precio" id="precio" min="1" maxlength="5" onchange="setTwoNumberDecimal" step=".01"  aria-describedby="precio" placeholder="Precio">
        </div>
        <div class="form-group">
            <label for="precio">Stock</label>
            <input type="number" min="1" class="form-control" value="{{ isset($producto->stock) ? $producto->stock : '' }}"
                name="stock" id="stock" aria-describedby="stock" placeholder="stock">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea class="form-control" id="descripcion" rows="3" name="descripcion">{{ isset($producto->descripcion) ? $producto->descripcion : '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Categoria</label>
            <select class="form-control" id="categoria" name="id_categoria">
                <option value="">Seleccionar categoria</option>
                @forelse ($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}"  {{ isset($producto->id_categoria) && $categoria->id_categoria == $producto->id_categoria ? 'selected' : ''  }}>
                        {{ $categoria->nombre_categoria }}
                    </option>                
                @empty
                @endforelse
            </select>
        </div>
        @if (!isset($producto->id_categoria))
            <div class="custom-file mt-2">
                <input type="file" class="custom-file-input" id="image" name="image" required>
                <label class="custom-file-label" for="image" accept=".jpeg, .png, .jpg">Elejir imagen</label>
            </div>
            <div class="custom-file mt-2">
                <input type="file" multiple class="custom-file-input" id="image-detalle" name="image-detalle[]" required>
                <label class="custom-file-label" for="image-detalle" accept=".jpeg, .png, .jpg">Elejir imagen detalles</label>
            </div>
        @endif
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">
            {{ isset($producto->id_producto) ? 'Editar' : 'Crear' }}
        </button>
    </div>
</form>
