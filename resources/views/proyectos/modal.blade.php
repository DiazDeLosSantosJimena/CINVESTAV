@foreach($proposals as $prop)
<dialog class="mdl-dialog" id="dialog{{ $prop->id }}">
    <h4 class="mdl-dialog__title">Eliminar</h4>
    <form action="" id="deleteForm" method="POST">
        @csrf
        @method('delete')
        <div class="mdl-dialog__content">
            <p>
                Está a punto de eliminar el proyecto: <br> {{ $prop->project->name }} <br><br> Desea continuar??
            </p>
        </div>
        <div class="mdl-dialog__actions">
            <button type="submit" class="btn btn-danger">Continuar</button>
            <button type="button" class="btn btn-secondary close">Cancelar</button>
        </div>
    </form>
</dialog>
<script>
    var dialog = document.querySelector('#dialog{{ $prop->id }}');
    var showDialogButton = document.querySelector('#show-dialog{{ $prop->id }}');
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    showDialogButton.addEventListener('click', function() {
        dialog.showModal();
    });
    dialog.querySelector('.close').addEventListener('click', function() {
        dialog.close();
    });
</script>
@endforeach