@extends('layout.navbar')
@section('title', 'Agregar Proyecto')

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
        --bd-callout-border: #00dfee;
    }
</style>

@section('content')
<div class="container">
    <form class="row" action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="col-12 mx-5">
            <h3>Pre-registro Proyectos</h3>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título de la Ponencia / Cartel.</label> <label for="nombre" class="text-danger">*</label>
                <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" aria-describedby="titulo" value="{{ old('titulo') }}">
                @error('titulo')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                @enderror
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="bd-callout bd-callout-info">
                <p class="mx-3">Eje tematico <strong class="text-danger">*</strong></p>
            </div>
        </div>
        <div class="col-12 mdl-cell--hide-phone mdl-cell--hide-tablet">
            <div class="mb-3 text-center">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="eje" id="flexRadioDefault0" value="" checked style="display: none;">
                    <input class="form-check-input" type="radio" name="eje" id="inlineRadio1" value="U">
                    <label class="form-check-label" for="inlineRadio1">Nivel Universitario por área.<br>(Cálculo, Algebra, Geometría Analitca, Algebra Lineal, etc.)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="eje" id="inlineRadio2" value="P">
                    <label class="form-check-label" for="inlineRadio2">Nivel Preuniversitario.<br>(Bachillerato.)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="eje" id="inlineRadio3" value="B">
                    <label class="form-check-label" for="inlineRadio3">Nivel Básico<br>(Primaria o secundaria.)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="eje" id="inlineRadio4" value="STEM">
                    <label class="form-check-label" for="inlineRadio4">Ciencia, Tecnológia, Ingenieria y Matemáticas<br>(STEM)</label>
                </div>
            </div>
            @error('eje')
            <label class="form-check-label text-danger" for="flexRadioDefault1">
                {{ $message }}
            </label>
            @enderror
        </div>
        <div class="col-12 mdl-cell--hide-desktop">
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="eje" id="flexRadioDefault0" value="" checked style="display: none;">
                    <input class="form-check-input" type="radio" name="eje" id="flexRadioDefault1" value="U">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Nivel Universitario por área.(Cálculo, Algebra, Geometría Analitca, Algebra Lineal, etc.)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="eje" id="flexRadioDefault2" value="P">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Nivel Preuniversitario.(Bachillerato.)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="eje" id="flexRadioDefault3" value="B">
                    <label class="form-check-label" for="flexRadioDefault3">
                        Nivel Básico.(Primaria o secundaria.)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="eje" id="flexRadioDefault4" value="STEM">
                    <label class="form-check-label" for="flexRadioDefault4">
                        Ciencia, Tecnológia, Ingenieria y Matemáticas(STEM)
                    </label>
                </div>
            </div>
            @error('eje')
            <label class="form-check-label text-danger" for="flexRadioDefault1">
                {{ $message }}
            </label>
            @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="bd-callout bd-callout-info">
                <p class="mx-3">Archivos</p>
            </div>
        </div>
        <div class="col-12 row">
            <div class="col-3 text-center mt-4">
                <p>Archivo 1 (Resumen): <strong class="text-danger">*</strong></p>
            </div>
            <div class="col-9">
                <div class="mb-3 mt-3">
                    <input class="form-control @error('resumen') is-invalid @enderror" type="file" id="resumen" name="resumen">
                    <div class="form-text" id="basic-addon4">(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .docx, docx no mayor a 1MB)</div>
                </div>
                @error('resumen')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                @enderror
            </div>
            <hr>
            <div class="col-3 text-center mt-4">
                <p>Archivo 2 (Extenso): <strong class="text-danger">*</strong></p>
            </div>
            <div class="col-9">
                <div class="mb-3 mt-3">
                    <input class="form-control @error('extenso') is-invalid @enderror" type="file" id="extenso" name="extenso">
                    <div class="form-text" id="basic-addon4">(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .docx, docx no mayor a 1MB)</div>
                </div>
                @error('extenso')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                @enderror
            </div>
        </div>
        <div class="col-12 row">
            <div class="col-sm-12 col-md-3">
                <div class="bd-callout bd-callout-info">
                    <p class="mx-3">Autores</p>
                </div>
            </div>
        </div>
        <div class="form-text col-6">
            En este apartado ingrese los autores de la ponencia.
        </div>
        <div class="col-6 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="col-12 mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry the Bird</td>
                        <td colspan="2">@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-2 col-md-3">
            <div class="bd-callout bd-callout-info">
                <p class="mx-3">Datos extra:</p>
            </div>
        </div>
        <div class="col-12 row">
            <div class="col-12">
                <label for="inst_pro" class="form-label">Institución de procedencia: <strong class="text-danger">*</strong></label>
                <input type="text" id="inst_pro" name="inst_pro" class="form-control @error('inst_pro') is-invalid @enderror" aria-labelledby="Institución" value="{{ old('inst_pro') }}">
                <div class="form-text" id="basic-addon4">Le pedimos no utilizar siglas y escribir el nombre completo de la institución o empresa de procedencia.</div>
            </div>
            @error('inst_pro')
            <label class="form-check-label text-danger" for="flexRadioDefault1">
                {{ $message }}
            </label>
            @enderror
        </div>
        <hr class="my-4">
        <div class="col-12 d-flex justify-content-center align-content-center my-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="confirm">
                <label class="form-check-label" for="flexCheckDefault">
                    He revisado los datos proporcionados y certifico que la información capturadas sean correctas y responsabilidad de quien la captura.
                </label>
            </div>
        </div>
        <div class="col-6 text-center mt-3">
            <a href="{{ route('project.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
        <div class="col-6 text-center mt-3">
            <button type="submit" class="btn btn-success disabled" id="btnRegistro">Enviar</button>
        </div>
    </form>
</div>




<script>
    var navbar = document.querySelector('#proyectos');
    navbar.className = "mdl-layout__tab is-active";

    var checkBox = document.querySelector("#confirm");
    var btnEnviar = document.querySelector("#btnRegistro");

    checkBox.addEventListener('click', () => {
        if (checkBox.checked) {
            btnEnviar.className = "btn btn-success";
        } else {
            btnEnviar.className = "btn btn-success disabled";
        }
    });
</script>


<script>
    let listaAutores = [];

    const objAutor = {
        nombre: '',
        app: '',
        apm: '',
        grado: ''
    }

    let editando = false;

    const formulario = document.querySelector('#formulario');
</script>

@endsection