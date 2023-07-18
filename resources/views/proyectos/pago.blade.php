@extends('layout.navbar')
@section('title', 'Formato de Pago')
@section('content')
<style>
    .bd-callout {
        --bs-link-color-rgb: var(--bd-callout-link);
        --bs-code-color: var(--bd-callout-code-color);
        padding: 1.25rem;
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
        color: var(--bd-callout-color, inherit);
        background-color: var(--bd-callout-bg, var(--bs-gray-100));
        border-left: 0.25rem solid var(--bd-callout-border, var(--bs-gray-300));
    }

    .bd-callout-info {
        --bd-callout-color: var(--bs-info-text-emphasis);
        --bd-callout-bg: none;
        --bd-callout-border: #0078a0;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12 text-center my-4">
            <p class="display-4">Formato de Pago</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="bd-callout bd-callout-info">
                <p class="mx-3">A continuación ingrese el documento del formato de pago correspondiente, de lo contrario el proyecto no continuara con la evaluación. Una vez subido el formato de pago, el proyecto quedará a la espera de una confirmación que sera enviada vía correo electrónico.</p>
            </div>
        </div>
        <div class="col-12 mb-3 text-center">
            <a href="{{ Storage::url('proposals/Detalles_del_Pago.pdf') }}" type="button" class="btn btn-lg" style="background-color: #0178a0; color: white;">
                Archivo de Detalles del Pago
            </a>
        </div>
        <div class="col-12">
            <form action="{{ route('subirPago', $project->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-3">
                    <input class="form-control @error('pago') is-invalid @enderror" type="file" id="pago" name="pago">
                    <div class="form-text" id="pago-addon4">(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .pdf, pdf no mayor a 2MB)</div>
                </div>
                @error('pago')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                @enderror
        </div>
        <div class="col-6 text-center mt-3">
            <a href="{{ route('proyectos.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
        <div class="col-6 text-center mt-3">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
        </form>
    </div>
</div>

<script>
    var navbar = document.querySelector('#proyectos');
    navbar.className = "mdl-layout__tab is-active";
</script>
@endsection