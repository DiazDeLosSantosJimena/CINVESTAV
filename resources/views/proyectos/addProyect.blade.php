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
        content: "\2713";
        border: 2px solid #fff;
        border-radius: 0.3em;
        background: #0078a1;
        box-shadow: 2px 1px 0 #50565a;
        display: flex;
        justify-content: center;
        align-content: center;
        margin-bottom: auto;
        color: #fff;
        width: 1.7em;
        height: 1.7em;
    }

    /* checkbox-rect2 end */
</style>
<script src="https://www.google.com/recaptcha/api.js"></script>
@endsection

@section('content')
<div class="container">
    <form action="{{ route('proyectos.store') }}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        <div class="col-sm-12 col-md-12 mx-5 my-4">
            <h3>Registro de Ponencias</h3>
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
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="eje" id="eje5" value="HM" {{ old('eje') == 'HM' ? 'checked' : '' }}>
                    <label class="form-check-label" for="eje4">
                        Historia de las Matemáticas
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
                    <input class="form-control @error('resumen') is-invalid @enderror" type="file" id="resumen" accept=".docx" name="resumen">
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
                    <input class="form-control @error('extenso') is-invalid @enderror" type="file" id="extenso" accept=".docx,image/jpeg" name="extenso">
                    <div class="form-text" id="archivo2-addon4">(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .docx, docx no mayor a 1MB)</div>
                </div>
                @error('extenso')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                @enderror
            </div>
            <div class="col-sm-12 col-md-3 text-center mt-4" id="ponenciaPPTX">
                <p>Archivo 3: <strong class="text-danger">*</strong> <br> ( <a href="{{ Storage::url('proposals/Plantilla-Ponencias-EICAL-14.pptx') }}">Plantilla-ponencia-EICAL-14.pptx"</a> )</p>
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
                    <div class="col-sm-12 col-md-4 mb-3">
                        <label for="nombre" class="form-label">Nombre.</label> <label for="nombreA" class="text-danger">*</label>
                        <input type="text" class="form-control" id="nombreA" name="nombreA" aria-describedby="nombre" value="">
                    </div>
                    <div class="col-sm-12 col-md-4 mb-3">
                        <label for="apellidoPaterno" class="form-label">Apellido Paterno.</label> <label for="apellidoPaternoA" class="text-danger">*</label>
                        <input type="text" class="form-control" id="apellidoPaternoA" name="apellidoPaternoA" aria-describedby="apellidoPaterno" value="">
                    </div>
                    <div class="col-sm-12 col-md-4 mb-3">
                        <label for="apellidoMaterno" class="form-label">Apellido Materno.</label>
                        <input type="text" class="form-control" id="apellidoMaternoA" name="apellidoMaternoA" aria-describedby="apellidoMaterno" value="">
                    </div>
                    <div class="col-sm-12 col-md-12 mb-3">
                        <label for="titulo" class="form-label">Institución de Procedencia.</label> <label for="tituloA" class="text-danger">*</label>
                        <input type="text" class="form-control" id="tituloA" name="tituloA" aria-describedby="titulo" value="">
                        <div class="form-text" id="basic-addon4">Le pedimos no utilizar siglas y escribir el nombre completo de la institución o empresa de procedencia.</div>
                    </div>
                    <div class="col-sm-12 col-md-12 mb-3">
                        <label for="titulo" class="form-label">País.</label> <label for="paisA" class="text-danger">*</label>
                        <input type="text" class="form-control" id="paisA" name="paisA" aria-describedby="paisA" value="">
                    </div>
                    <div class="col-sm-12 col-md-12 mt-2 text-end">
                        <input type="hidden" id="registroarray" name="registroA">
                        <button type="button" class="btn btn-success" id="registrarBtn">Registrar</button>
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
                        <th class="text-center">Institución de Procedencia</th>
                        <th>País</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle" id="registrosTableBody">
                </tbody>
            </table>
        </div>
        <hr class="my-4">
        <div class="col-12 d-flex justify-content-center align-content-center my-3">
            <div class="item">
                <div class="checkbox-rect2">
                    <input class="confirm" type="checkbox" id="checkbox-rect2" value="" name="verify" onclick="checkedBox(this.value)">
                    <label for="checkbox-rect2" class="form-check-label">He revisado los datos proporcionados y certifico que la información capturadas sean correctas y responsabilidad de quien la captura.</label>
                </div>
            </div>
        </div>
        <!--CAPTCHA-->
        <div class="col-12 d-flex justify-content-center align-content-center my-3">
            <div class="form-group">
                <div class="g-recaptcha" id="captchalogin" data-sitekey="6LcSYHcnAAAAAKKbYvQhXhQtN3evu7yxowlNSW04" data-callback='onSubmit' data-action='submit'></div>
            </div>
        </div>
        @error('g-recaptcha-response')
        <div class="col-12 d-flex justify-content-center align-content-center">
            <label class="form-check-label text-danger" for="flexRadioDefault1">
                {{ $message }}
            </label>
        </div>
        @enderror
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

    var checkBox = document.getElementsByClassName('confirm');
    var btnEnviar = document.querySelector("#btnRegistro");

    checkBox[0].value = 1;
    checkedBox = (val) => {
        if (val == 1) {
            btnEnviar.className = "btn btn-success";
            checkBox[0].value = 0;
        } else if (val == 0) {
            btnEnviar.className = "btn btn-success disabled";
            checkBox[0].value = 1;
        } else {

        }
    }

    var radioModality1 = document.querySelector('#modality1');
    var radioModality2 = document.querySelector('#modality2');
    var archivoPPTX = document.querySelector('#ponenciaPPTX');
    var archive1 = document.querySelector("#resumeArchive");
    var archive2 = document.querySelector('#archivo2');
    var ad = document.querySelector('#archivo2-addon4');

    radioModality1.addEventListener('click', () => {
        archivoPPTX.style.display = 'block';
        archive1.textContent = "Formato-Resumen-ponencia-EICAL-14.docx";
        archive2.textContent = "Formato-extenso-evaluacion-EICAL-14.docx";
        archive1.href = "{{ Storage::url('proposals/Formato-Resumen-ponencia-EICAL-14.docx') }}";
        archive2.href = "{{ Storage::url('proposals/Formato-extenso-evaluacion-EICAL-14.docx') }}";
        ad.textContent = "(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .docx, docx no mayor a 1MB)";
    });

    radioModality2.addEventListener('click', () => {
        archivoPPTX.style.display = 'none';
        archive1.textContent = "Formato-CARTEL-EICAL-14.docx";
        archive2.textContent = "Cartel_Formato-XVI-EICAL.pptx";
        archive1.href = "{{ Storage::url('proposals/Formato-CARTEL-EICAL-14.docx') }}";
        archive2.href = "{{ Storage::url('proposals/Cartel_Formato-XVI-EICAL.pptx') }}";
        ad.textContent = "(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .jpg, jpg no mayor a 2MB)";
    });

    if (radioModality1.checked === true) {
        archivoPPTX.style.display = 'block';
        archive1.textContent = "Formato-Resumen-ponencia-EICAL-14.docx";
        archive2.textContent = "Formato-extenso-evaluacion-EICAL-14.docx";
        archive1.href = "{{ Storage::url('proposals/Formato-Resumen-ponencia-EICAL-14.docx') }}";
        archive2.href = "{{ Storage::url('proposals/Formato-extenso-evaluacion-EICAL-14.docx') }}";
        ad.textContent = "(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .docx, docx no mayor a 1MB)";
    } else if (radioModality2.checked === true) {
        archivoPPTX.style.display = 'none';
        archive1.textContent = "Formato-CARTEL-EICAL-14.docx";
        archive2.textContent = "Cartel_Formato-XIII-EICAL.pptx";
        archive1.href = "{{ Storage::url('proposals/Formato-CARTEL-EICAL-14.docx') }}";
        archive2.href = "{{ Storage::url('proposals/Cartel_Formato-XIII-EICAL.pptx') }}";
        ad.textContent = "(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .jpg, jpg no mayor a 2MB)";
    }
</script>

<script>
    var registros = [];
    var btnRegister = document.getElementById('registrarBtn');

    btnRegister.addEventListener('click', function(event) {
        event.preventDefault();

        var nombre = document.getElementById('nombreA').value;
        var apellidoPaterno = document.getElementById('apellidoPaternoA').value;
        var apellidoMaterno = document.getElementById('apellidoMaternoA').value;
        var titulo = document.getElementById('tituloA').value;
        var pais = document.getElementById('paisA').value;

        if (nombre !== '' && apellidoPaterno !== '' && titulo !== '' && pais !== '') {
            if (registros.length < 3) {
                var registro = {
                    nombre: nombre,
                    apellidoPaterno: apellidoPaterno,
                    apellidoMaterno: apellidoMaterno,
                    titulo: titulo,
                    pais: pais,
                };

                registros.push(registro);

                document.getElementById("registroarray").value = JSON.stringify(registros);
                console.log(registros);

                // Aquí comienza el código para agregar los registros a la tabla
                var tableBody = document.getElementById('registrosTableBody');

                var fila = document.createElement('tr');

                // Crea las celdas para cada atributo del registro
                var celdaNombre = document.createElement('td');
                celdaNombre.textContent = nombre;
                fila.appendChild(celdaNombre);

                var celdaApellidoPaterno = document.createElement('td');
                celdaApellidoPaterno.textContent = apellidoPaterno;
                fila.appendChild(celdaApellidoPaterno);

                var celdaApellidoMaterno = document.createElement('td');
                celdaApellidoMaterno.textContent = apellidoMaterno;
                fila.appendChild(celdaApellidoMaterno);

                var celdaTitulo = document.createElement('td');
                celdaTitulo.textContent = titulo;
                celdaTitulo.className = "text-center";
                fila.appendChild(celdaTitulo);

                var celdaPais = document.createElement('td');
                celdaPais.textContent = pais;
                fila.appendChild(celdaPais);

                var celdaAcciones = document.createElement('td');
                var botonEliminar = document.createElement('button');
                celdaAcciones.className = "text-center";
                botonEliminar.textContent = 'Eliminar';
                botonEliminar.classList.add('btn', 'btn-danger', 'btn-sm');
                botonEliminar.addEventListener('click', function() {
                    eliminarRegistro(registro);
                });
                celdaAcciones.appendChild(botonEliminar);
                fila.appendChild(celdaAcciones);

                tableBody.appendChild(fila);

                // Restablecer los campos de entrada después de agregar el registro
                document.getElementById('nombreA').value = '';
                document.getElementById('apellidoPaternoA').value = '';
                document.getElementById('apellidoMaternoA').value = '';
                document.getElementById('tituloA').value = '';
                document.getElementById('paisA').value = '';
            } else {
                alert('No se pueden hacer más de 3 registros.');
            }
        }
    });

    function eliminarRegistro(registro) {
        var index = registros.indexOf(registro);
        if (index !== -1) {
            registros.splice(index, 1);
            actualizarTabla();
        }
    }

    function actualizarTabla() {
        var tableBody = document.getElementById('registrosTableBody');
        tableBody.innerHTML = '';

        registros.forEach(function(registro) {
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
            celdaTitulo.className = "text-center";
            celdaTitulo.textContent = registro.titulo;
            fila.appendChild(celdaTitulo);

            var celdaPais = document.createElement('td');
            celdaPais.textContent = registro.pais;
            fila.appendChild(celdaPais);

            var celdaAcciones = document.createElement('td');
            celdaAcciones.className = "text-center";
            var botonEliminar = document.createElement('button');
            botonEliminar.textContent = 'Eliminar';
            botonEliminar.classList.add('btn', 'btn-danger', 'btn-sm');
            botonEliminar.addEventListener('click', function() {
                eliminarRegistro(registro);
            });
            celdaAcciones.appendChild(botonEliminar);
            fila.appendChild(celdaAcciones);

            tableBody.appendChild(fila);
        });
    }
</script>
@endsection