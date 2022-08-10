<form method="post" 
    action="{{ isset($feedback->id_orden) ? route('feedback.update', [$feedback->id_orden]) : route('feedback.store') }}">
    @csrf
    @if (isset($feedback->id_orden))
        @method('PATCH')
    @endif
    <input type="hidden" name="id_orden" id="id_orden" value="{{ $id_orden }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            Dejanos tu Feedback
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="comentario" class="text-dark">Comentario</label>
            <textarea class="form-control" name="comentario" id="comentario" rows="3" maxlength="80">{{ isset($feedback->comentario) ? $feedback->comentario : '' }}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
