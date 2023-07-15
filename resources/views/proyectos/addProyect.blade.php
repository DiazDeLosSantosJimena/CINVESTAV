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
        --bd-callout-border: #0078a0;
    }
</style>

@section('content')
<div class="container">
    <form action="{{ route('proyectos.store') }}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        <div class="col-sm-12 col-md-12 mx-5">
            <h3>Registro de Proyectos</h3>
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
        <div class="col-sm-12 col-md-12 col-lg-6 row">
            <div class="col-sm-12 col-md-12">
                <div class="bd-callout bd-callout-info">
                    <p class="mx-3">Modalidad de participación. <strong class="text-danger">*</strong></p>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 text-center">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="modality" id="modality1" value="P" {{ old('modality') == 'P' ? 'checked' : 'checked' }}>
                    <label class="form-check-label" for="modality1">Ponencia</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="modality" id="modality2" value="C" {{ old('modality') == 'C' ? 'checked' : '' }}>
                    <label class="form-check-label" for="modality2">Cartel</label>
                </div>
            </div>
            @error('modality')
            <label class="form-check-label text-danger" for="flexRadioDefault1">
                {{ $message }}
            </label>
            @enderror
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 row">
            <div class="col-sm-12 col-md-12">
                <div class="bd-callout bd-callout-info">
                    <p class="mx-3">Eje tematico. <strong class="text-danger">*</strong></p>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="eje" id="eje1" value="U" {{ old('eje') == 'U' ? 'checked' : 'checked' }}>
                    <label class="form-check-label" for="eje1">
                        Nivel Universitario por área.(Cálculo, Algebra, Geometría Analitca, Algebra Lineal, etc.)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="eje" id="eje2" value="P" {{ old('eje') == 'P' ? 'checked' : '' }}>
                    <label class="form-check-label" for="eje2">
                        Nivel Preuniversitario.(Bachillerato.)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="eje" id="eje3" value="B" {{ old('eje') == 'B' ? 'checked' : '' }}>
                    <label class="form-check-label" for="eje3">
                        Nivel Básico.(Primaria o secundaria.)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="eje" id="eje4" value="STEM" {{ old('eje') == 'STEM' ? 'checked' : '' }}>
                    <label class="form-check-label" for="eje4">
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="bd-callout bd-callout-info">
                <p class="mx-3">Archivos.</p>
            </div>
        </div>
        <div class="col-12 row">
            <div class="col-sm-12 col-md-3 text-center mt-4">
                <p>Archivo 1: <strong class="text-danger">*</strong> <br> ( <a href="#" id="resumeArchive">Archivo 1</a> )</p>
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="mb-3 mt-3">
                    <input class="form-control @error('resumen') is-invalid @enderror" type="file" id="resumen" name="resumen">
                    <div class="form-text" id="resumen-addon4">(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .docx, docx no mayor a 1MB)</div>
                </div>
                @error('resumen')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                @enderror
            </div>
            <div class="col-sm-12 col-md-3 text-center mt-4">
                <p>Archivo 2: <strong class="text-danger">*</strong> <br> ( <a href="#" id="archivo2">Archivo 2</a> )</p>
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="mb-3 mt-3">
                    <input class="form-control @error('extenso') is-invalid @enderror" type="file" id="extenso" name="extenso">
                    <div class="form-text" id="archivo2-addon4">(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .docx, docx no mayor a 1MB)</div>
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
                    <p class="mx-3">Autores.</p>
                </div>
            </div>
        </div>
        <div class="form-text col-6">
            En este apartado ingrese los autores de la ponencia.
        </div>
        <div class="col-6 text-end">
            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="bi bi-plus-lg"></i>
            </button>
        </div>
        <div class="collapse my-3" id="collapseExample">
            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-3 mb-3">
                        <label for="nombre" class="form-label">Nombre.</label> <label for="nombreA" class="text-danger">*</label>
                        <input type="text" class="form-control" id="nombreA" name="nombreA" aria-describedby="nombre" value="">
                    </div>
                    <div class="col-sm-12 col-md-3 mb-3">
                        <label for="apellidoPaterno" class="form-label">Apellido Paterno.</label> <label for="apellidoPaternoA" class="text-danger">*</label>
                        <input type="text" class="form-control" id="apellidoPaternoA" name="apellidoPaternoA" aria-describedby="apellidoPaterno" value="">
                    </div>
                    <div class="col-sm-12 col-md-3 mb-3">
                        <label for="apellidoMaterno" class="form-label">Apellido Materno.</label>
                        <input type="text" class="form-control" id="apellidoMaternoA" name="apellidoMaternoA" aria-describedby="apellidoMaterno" value="">
                    </div>
                    <div class="col-sm-12 col-md-3 mb-3">
                        <label for="titulo" class="form-label">Grado Academico.</label> <label for="tituloA" class="text-danger">*</label>
                        <input type="text" class="form-control" id="tituloA" name="tituloA" aria-describedby="titulo" value="">
                    </div>
                    <div class="col-sm-12 col-md-12 mt-2 text-end">
                        <input type="hidden" id="registroarray" name="registroA">
                        <button class="btn btn-success" id="registrarBtn">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tabla -->
        <div class="col-12 mt-3">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Grado Academico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle" id="registrosTableBody">
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
            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
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

    var radioModality1 = document.querySelector('#modality1');
    var radioModality2 = document.querySelector('#modality2');
    var archive1 = document.querySelector("#resumeArchive");
    var archive2 = document.querySelector('#archivo2');
    var ad = document.querySelector('#archivo2-addon4');

    radioModality1.addEventListener('click', () => {
        archive1.textContent = "Formato-Resumen-ponencia-EICAL-13.docx";
        archive2.textContent = "Formato-extenso-evaluacion-EICAL-13.docx";
        archive1.href = "{{ Storage::url('proposals/Formato-Resumen-ponencia-EICAL-13.docx') }}";
        archive2.href = "{{ Storage::url('proposals/Formato-extenso-evaluacion-EICAL-13.docx') }}";
        ad.textContent = "(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .docx, docx no mayor a 1MB)";
    });

    radioModality2.addEventListener('click', () => {
        archive1.textContent = "Formato-CARTEL-EICAL-13.docx";
        archive2.textContent = "Cartel_Formato-XIII-EICAL.pptx";
        archive1.href = "{{ Storage::url('proposals/Formato-CARTEL-EICAL-13.docx') }}";
        archive2.href = "{{ Storage::url('proposals/Cartel_Formato-XIII-EICAL.pptx') }}";
        ad.textContent = "(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .jpg, jpg no mayor a 2MB)";
    });

    if (radioModality1.checked === true) {
        archive1.textContent = "Formato-Resumen-ponencia-EICAL-13.docx";
        archive2.textContent = "Formato-extenso-evaluacion-EICAL-13.docx";
        archive1.href = "{{ Storage::url('proposals/Formato-Resumen-ponencia-EICAL-13.docx') }}";
        archive2.href = "{{ Storage::url('proposals/Formato-extenso-evaluacion-EICAL-13.docx') }}";
        ad.textContent = "(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .docx, docx no mayor a 1MB)";
    } else if (radioModality2.checked === true) {
        archive1.textContent = "Formato-CARTEL-EICAL-13.docx";
        archive2.textContent = "Cartel_Formato-XIII-EICAL.pptx";
        archive1.href = "{{ Storage::url('proposals/Formato-CARTEL-EICAL-13.docx') }}";
        archive2.href = "{{ Storage::url('proposals/Cartel_Formato-XIII-EICAL.pptx') }}";
        ad.textContent = "(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .jpg, jpg no mayor a 2MB)";
    }
</script>

<script>
    var registros = [];
    var btnRegister = document.getElementById('registrarBtn');

    document.getElementById('registrarBtn').addEventListener('click', function(event) {
        event.preventDefault();

        var titulo = document.getElementById('tituloA').value;
        var nombre = document.getElementById('nombreA').value;
        var apellidoPaterno = document.getElementById('apellidoPaternoA').value;
        var apellidoMaterno = document.getElementById('apellidoMaternoA').value;

        if (titulo !== '' && nombre !== '' && apellidoPaterno !== '') {
            if (registros.length < 3) {
                var registro = {
                    titulo: titulo,
                    nombre: nombre,
                    apellidoPaterno: apellidoPaterno,
                    apellidoMaterno: apellidoMaterno
                };

                registros.push(registro);

                document.getElementById("registroarray").value = JSON.stringify(registros);
                console.log(registros);

                var navbar = document.querySelector('#proyectos');
                navbar.className = "mdl-layout__tab is-active";

                var tableBody = document.getElementById('registrosTableBody');

                var fila = document.createElement('tr');

                var celdaNombre = document.createElement('td');
                celdaNombre.textContent = registro.nombre;
                fila.appendChild(celdaNombre);

                var celdaApellidoPaterno = document.createElement('td');
                celdaApellidoPaterno.textContent = registro.apellidoPaterno;
                fila.appendChild(celdaApellidoPaterno);

                var celdaApellidoMaterno = document.createElement('td');
                celdaApellidoMaterno.textContent = registro.apellidoMaterno;
                fila.appendChild(celdaApellidoMaterno);

                var celdaTitulo = document.createElement('td');
                celdaTitulo.textContent = registro.titulo;
                fila.appendChild(celdaTitulo);

                var celdaAcciones = document.createElement('td');
                var botonEditar = document.createElement('button');
                botonEditar.textContent = 'Borrar';
                botonEditar.classList.add('btn', 'btn-sm', 'btn-danger', 'borrar-btn');
                botonEditar.dataset.index = registros.length - 1;
                celdaAcciones.appendChild(botonEditar);
                fila.appendChild(celdaAcciones);

                botonEditar.addEventListener('click', function() {
                    var rowIndex = this.dataset.index;
                    registros.splice(rowIndex, 1);
                    tableBody.removeChild(this.parentNode.parentNode);
                    console.log(registros);
                });

                tableBody.appendChild(fila);

                document.getElementById('tituloA').value = '';
                document.getElementById('nombreA').value = '';
                document.getElementById('apellidoPaternoA').value = '';
                document.getElementById('apellidoMaternoA').value = '';
            } else {
                alert('No se pueden hacer más de 3 registros.');
            }
        }
    });
</script>
@endsection