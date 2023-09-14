@extends('layout.navbar')
@section('title','Actividades')
@section('content')

<div class="container">
    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Excelente!</strong> {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-12 mx-5 my-4">
            <h3>Actividades</h4>
        </div>

        <div class="col-6 mx-5">
            <label for="">Selecciona una actividad:</label>
            <select class="form-select" aria-label="Default select example" id="selectTaller" onchange="mostrarTalleres()">
                <option selected>Selecciona una opción</option>
                <option value="1">Conferencias Magistrales</option>
                <option value="2">Conferencias Especiales</option>
                <option value="3">Grupos Temáticos</option>
                <option value="4">Talleres</option>
                <option value="5">Actividad</option>
                <option value="6">Proyectos</option>
            </select>
        </div>
        <div class="col-12 table-responsive">
            <table class="table" id="tablaTalleres">
                <thead>
                    <tr class="text-center">
                        <th>Presentador</th>
                        <th>Nombre del Taller</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Lugar</th>
                        <th>Asistencia</th>
                    </tr>
                </thead>
                <tbody class="align-middle text-center">
                   
                </tbody>
            </table>
        </div>
        <hr class="border border-primary border-3 opacity-75">
        <div class="col-12 table-responsive">
            <h3>Talleres seleccionados</h3>
            <table class="table" id="tablaTalleresSeleccionados">
                <thead>
                    <tr class="text-center">
                        <th>Presentador</th>
                        <th>Nombre del Taller</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Lugar</th>
                        <th>Asistencia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle text-center">

                </tbody>
            </table>
        </div>


        <div class="col-12 table-responsive">
            <h3>Ponencias seleccionadas</h3>
            <table class="table" id="tablaPonenciasSeleccionadas">
                <thead>
                    <tr class="text-center">
                        <th>Presentador</th>
                        <th>Nombre de la Ponencia</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Lugar</th>
                        <th>Asistencia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle text-center">

                </tbody>
            </table>
        </div>

        <form id="formularioEnviar" method="POST" action="{{ route('attendance.store') }}">
            @csrf
            <input type="hidden" name="workshop_ids[]" id="talleresIdsInput">
            <input type="hidden" name="project_ids[]" id="proyectosIdsInput">
            <button id="enviarButton" type="submit" class="btn btn-primary" style="display: none;">Enviar</button>
        </form>


    </div>
</div>


<script>
    var talleresSeleccionados = [];
    var proyectosSeleccionados = [];
    var talleresIds = [];
    var proyectoIds = [];


    function mostrarTalleresSeleccionados() {
        var tablaTalleresSeleccionados = document.getElementById("tablaTalleresSeleccionados").getElementsByTagName("tbody")[0];
        tablaTalleresSeleccionados.innerHTML = "";


        talleresSeleccionados.forEach(function(taller) {
            var filaSeleccionada = tablaTalleresSeleccionados.insertRow();
            var celdaNombreSeleccionado = filaSeleccionada.insertCell(0);
            var celdaTituloSeleccionado = filaSeleccionada.insertCell(1);
            var celdaFechaSeleccionado = filaSeleccionada.insertCell(2);
            var celdaHoraSeleccionado = filaSeleccionada.insertCell(3);
            var celdaLugarSeleccionado = filaSeleccionada.insertCell(4);
            var celdaAsistenciaSeleccionado = filaSeleccionada.insertCell(5);
            var celdaBotones = filaSeleccionada.insertCell(6);

            celdaNombreSeleccionado.innerHTML = taller.nameu;
            celdaTituloSeleccionado.innerHTML = taller.title;
            celdaFechaSeleccionado.innerHTML = taller.date;
            celdaHoraSeleccionado.innerHTML = taller.hour;
            celdaLugarSeleccionado.innerHTML = taller.site;
            celdaAsistenciaSeleccionado.innerHTML = taller.assistance;


            var botonQuitar = document.createElement("button");
            botonQuitar.innerHTML = '<i class="bi bi-trash"></i>';
            botonQuitar.className = "btn btn-danger";
            botonQuitar.onclick = function() {

                var tallerIndex = talleresSeleccionados.indexOf(taller);
                if (tallerIndex > -1) {
                    talleresSeleccionados.splice(tallerIndex, 1);
                }

                mostrarTalleres();


                mostrarTalleresSeleccionados();
            };
            celdaBotones.appendChild(botonQuitar);
        });


        talleresIds = talleresSeleccionados.map(function(taller) {
            return taller.id;
        });

        document.getElementById('talleresIdsInput').value = talleresIds.join(',');



        var enviarButton = document.getElementById("enviarButton");
        if (talleresSeleccionados.length > 0 || proyectosSeleccionados.length > 0) {
            enviarButton.style.display = "block";
        } else {
            swi--;
        }

        if (swi > 0) {
            btnGuardar.className = "btn btn-primary";
        } else {
            enviarButton.style.display = "none";
        }
    }
</script>
<script>
    var navbar = document.querySelector('#attendance');
    navbar.className = "mdl-layout__tab is-active";
</script>

@endsection