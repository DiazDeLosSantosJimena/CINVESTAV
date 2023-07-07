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
<div class="col-12 row">
    <div class="col-sm-12 col-md-3">
        <div class="bd-callout bd-callout-info">
            <p class="mx-3">Autores.</p>
        </div>
    </div>
</div>
<form class="row" action="{{ route('authors.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
<div class="form-text col-6">
    En este apartado ingrese los autores de la ponencia.
  </div>
  <div class="col-6 text-end">
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      <i class="bi bi-plus-lg"></i>
    </button>
  </div>
  <div class="collapse my-3" id="collapseExample">
    <div class="card card-body">
      <div class="row">
        <div class="col-sm-12 col-md-3 mb-3">
          <label for="titulo" class="form-label">Título.</label> <label for="tituloA" class="text-danger">*</label>
          <input type="text" class="form-control" id="tituloA" name="tituloA" aria-describedby="titulo" value="">
        </div>
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
        <div class="col-sm-12 col-md-12 mt-2 text-end">
            <input type="hidden" id="registroarray" name="registro">
          <button class="btn btn-success" id="registrarBtn">Registrar</button>

        </div>
    </form>
      </div>
    </div>
  </div>

  <!-- Tabla -->
  <table class="table mt-4">
    <thead>
      <tr>
        <th>Título</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="registrosTableBody">
    </tbody>
  </table>

  <script>
    var registros = [];

    document.getElementById('registrarBtn').addEventListener('click', function(event) {
      event.preventDefault();

      if (registros.length >= 3) {
        return;
      }

      var titulo = document.getElementById('tituloA').value;
      var nombre = document.getElementById('nombreA').value;
      var apellidoPaterno = document.getElementById('apellidoPaternoA').value;
      var apellidoMaterno = document.getElementById('apellidoMaternoA').value;

      if (titulo !== '' && nombre !== '' && apellidoPaterno !== '') {
        var registro = {
          titulo: titulo,
          nombre: nombre,
          apellidoPaterno: apellidoPaterno,
          apellidoMaterno: apellidoMaterno
        };

        registros.push(registro);

  var miVariable = "Hola, mundo!";
  document.getElementById("registroarray").value = JSON.stringify(registros);
        console.log(registros);


console.log(registros);

        // perla = "hola mundo ";
        // document.getElementById("registro").value = perla;

        var tableBody = document.getElementById('registrosTableBody');

        var fila = document.createElement('tr');

        var celdaTitulo = document.createElement('td');
        celdaTitulo.textContent = registro.titulo;
        fila.appendChild(celdaTitulo);

        var celdaNombre = document.createElement('td');
        celdaNombre.textContent = registro.nombre;
        fila.appendChild(celdaNombre);

        var celdaApellidoPaterno = document.createElement('td');
        celdaApellidoPaterno.textContent = registro.apellidoPaterno;
        fila.appendChild(celdaApellidoPaterno);

        var celdaApellidoMaterno = document.createElement('td');
        celdaApellidoMaterno.textContent = registro.apellidoMaterno;
        fila.appendChild(celdaApellidoMaterno);

        var celdaAcciones = document.createElement('td');
        var botonEditar = document.createElement('button');
        botonEditar.textContent = 'Editar';
        botonEditar.classList.add('btn', 'btn-primary', 'editar-btn');
        botonEditar.dataset.index = registros.length - 1;
        celdaAcciones.appendChild(botonEditar);
        fila.appendChild(celdaAcciones);

        tableBody.appendChild(fila);


        document.getElementById('tituloA').value = '';
        document.getElementById('nombreA').value = '';
        document.getElementById('apellidoPaternoA').value = '';
        document.getElementById('apellidoMaternoA').value = '';

      }
    });


    document.addEventListener('click', function(event) {
      if (event.target.matches('.editar-btn')) {
        if (registros.length >= 3) {
          return;
        }

        var index = event.target.dataset.index;
        var registro = registros[index];


        document.getElementById('tituloA').value = registro.titulo;
        document.getElementById('nombreA').value = registro.nombre;
        document.getElementById('apellidoPaternoA').value = registro.apellidoPaterno;
        document.getElementById('apellidoMaternoA').value = registro.apellidoMaterno;


        registros.splice(index, 1);


        var fila = event.target.closest('tr');
        fila.remove();
      }
    });
  </script>




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
        ad.textContent = "(Favor de seleccionar el archivo que desea cargar. Tipo de archivo .jpg, pdf no mayor a 2MB)";
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
