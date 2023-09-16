@extends('layout.navbar')
@section('title', 'Agregar Proyecto')
@section('estilos')
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
        --bd-callout-bg: var(--bs-info-bg-subtle);
        --bd-callout-border: #0078a0;
    }

    /* checkbox-rect2 */
    .checkbox-rect2 input[type="checkbox"] {
        display: none;
    }

    .checkbox-rect2 input[type="checkbox"]+label {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 20px;
        font: 14px/20px "Open Sans", Arial, sans-serif;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .checkbox-rect2 input[type="checkbox"]:hover+label:hover {
        color: rgb(23, 86, 228);
    }

    .checkbox-rect2 input[type="checkbox"]:hover+label:before {
        border: 1px solid #343a3f;
        box-shadow: 2px 1px 0 #343a3f;
    }

    .checkbox-rect2 input[type="checkbox"]+label:last-child {
        margin-bottom: 0;
    }

    .checkbox-rect2 input[type="checkbox"]+label:before {
        content: "";
        display: block;
        width: 1.4em;
        height: 1.4em;
        border: 1px solid #343a3f;
        border-radius: 0.2em;
        position: absolute;
        left: 0;
        top: 0;
        -webkit-transition: all 0.2s, background 0.2s ease-in-out;
        transition: all 0.2s, background 0.2s ease-in-out;
        background: rgba(255, 255, 255, 0.03);
        box-shadow: -2px -1px 0 #343a3f;
        background: #f3f3f3;
    }

    .checkbox-rect2 input[type="checkbox"]:checked+label:before {
        border: 2px solid #fff;
        border-radius: 0.3em;
        background: #00e0ef;
        box-shadow: 2px 1px 0 #50565a;
    }

    /* checkbox-rect2 end */
</style>
@endsection

@section('content')
<div class="container">
    <form action="{{ route('proyectos.store') }}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        <div class="col-sm-12 col-md-12 mx-5 my-4">
            <h3>Registro de ponencias</h3>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título del proyecto.</label> <label for="nombre" class="text-danger">*</label>
                <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" aria-describedby="titulo" value="{{ old('titulo') }}">
                @error('titulo')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                @enderror
            </div>
        </div>
     
@endsection