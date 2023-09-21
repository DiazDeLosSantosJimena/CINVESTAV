@extends('layout.navbar')
@section('title','Actividades')
@section('content')

<div class="container">
    @if($status != "")
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $status }}
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
        @if($status != "")
        <form id="formularioEnviar" method="POST" action="{{ route('attendance.update', ['id' => Auth::user()->rol_id]) }}">
            {{ csrf_field('PATCH') }}
            {{ method_field('PUT') }}
            <input type="hidden" name="workshop_ids[]" id="talleresIdsInput">
            <input type="hidden" name="project_ids[]" id="proyectosIdsInput">
            <button id="enviarButton" type="submit" class="btn btn-primary" style="display: none;">Enviar</button>
        </form>
        @else
        <form id="formularioEnviar" method="POST" action="{{ route('attendance.store') }}">
            @csrf
            <input type="hidden" name="workshop_ids[]" id="talleresIdsInput">
            <input type="hidden" name="project_ids[]" id="proyectosIdsInput">
            <button id="enviarButton" type="submit" class="btn btn-primary" style="display: none;">Enviar</button>
        </form>
        @endif
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

    }

    function enviarTalleresSeleccionados() {

        document.getElementById('formularioEnviar').submit();
    }


    function mostrarTalleres() {
        var select = document.getElementById("selectTaller");
        var opcionSeleccionada = select.value;

        if (opcionSeleccionada === "6") {
            axios.get(`/projects-data`)
                .then(function(response) {

                    var proyectos = response.data;
                    var tablaBody = document.getElementById("tablaTalleres").getElementsByTagName("tbody")[0];
                    tablaBody.innerHTML = "";

                    proyectos.forEach(function(proyecto) {
                        var fila = tablaBody.insertRow();
                        var celdaNombre = fila.insertCell(0);
                        var celdaTitulo = fila.insertCell(1);
                        var celdaFecha = fila.insertCell(2);
                        var celdaHora = fila.insertCell(3);
                        var celdaLugar = fila.insertCell(4);
                        var celdaAsistencia = fila.insertCell(5);
                        var celdaAcciones = fila.insertCell(6);


                        celdaNombre.innerHTML = proyecto.name + " " + proyecto.app + " " + proyecto.apm;
                        celdaTitulo.innerHTML = proyecto.title;
                        celdaFecha.innerHTML = proyecto.date;
                        celdaHora.innerHTML = proyecto.hour;
                        celdaLugar.innerHTML = proyecto.site;
                        celdaAsistencia.innerHTML = proyecto.assistance;



                        var botonAgregar = document.createElement("button");
                        botonAgregar.innerHTML = "Agregar";
                        botonAgregar.className = "btn btn-success";
                        botonAgregar.onclick = function() {

                            proyectosSeleccionados.push(proyecto);


                            tablaBody.removeChild(fila);


                            mostrarProyectosSeleccionados()
                        };
                        celdaAcciones.appendChild(botonAgregar);

                    });
                })
                .catch(function(error) {
                    console.error(error);
                });


        } else {

            axios.get(`attendance/${opcionSeleccionada}`)
                .then(function(response) {

                    var tablaBody = document.getElementById("tablaTalleres").getElementsByTagName("tbody")[0];
                    tablaBody.innerHTML = "";


                    var talleresFiltrados = response.data.filter(function(taller) {

                        return !talleresSeleccionados.some(function(seleccionado) {
                            return taller.id === seleccionado.id;
                        });
                    });


                    talleresFiltrados.forEach(function(taller) {
                        var fila = tablaBody.insertRow();
                        var celdaNombre = fila.insertCell(0);
                        var celdaTitulo = fila.insertCell(1);
                        var celdaFecha = fila.insertCell(2);
                        var celdaHora = fila.insertCell(3);
                        var celdaLugar = fila.insertCell(4);
                        var celdaAsistencia = fila.insertCell(5);
                        var celdaBoton = fila.insertCell(6);

                        celdaNombre.innerHTML = taller.nameu;
                        celdaTitulo.innerHTML = taller.title;
                        celdaFecha.innerHTML = taller.date;
                        celdaHora.innerHTML = taller.hour;
                        celdaLugar.innerHTML = taller.site;
                        celdaAsistencia.innerHTML = taller.assistance;

                        var boton = document.createElement("button");
                        boton.innerHTML = "Agregar";
                        boton.className = "btn btn-success";
                        boton.onclick = function() {

                            talleresSeleccionados.push(taller);


                            tablaBody.removeChild(fila);


                            mostrarTalleresSeleccionados();
                        };
                        celdaBoton.appendChild(boton);
                    });
                })
                .catch(function(error) {
                    console.error(error);
                });
        }
    }

    function mostrarProyectosSeleccionados() {
        var tablaPonenciasSeleccionadas = document.getElementById("tablaPonenciasSeleccionadas").getElementsByTagName("tbody")[0];
        tablaPonenciasSeleccionadas.innerHTML = "";

        proyectosSeleccionados.forEach(function(proyecto) {
            var filaSeleccionada = tablaPonenciasSeleccionadas.insertRow();
            var celdaNombreSeleccionado = filaSeleccionada.insertCell(0);
            var celdaTituloSeleccionado = filaSeleccionada.insertCell(1);
            var celdaFechaSeleccionado = filaSeleccionada.insertCell(2);
            var celdaHoraSeleccionado = filaSeleccionada.insertCell(3);
            var celdaLugarSeleccionado = filaSeleccionada.insertCell(4);
            var celdaAsistenciaSeleccionado = filaSeleccionada.insertCell(5);
            var celdaBotones = filaSeleccionada.insertCell(6);


            celdaNombreSeleccionado.innerHTML = proyecto.name + " " + proyecto.app + " " + proyecto.apm;
            celdaTituloSeleccionado.innerHTML = proyecto.title;
            celdaFechaSeleccionado.innerHTML = proyecto.date;
            celdaHoraSeleccionado.innerHTML = proyecto.hour;
            celdaLugarSeleccionado.innerHTML = proyecto.site;
            celdaAsistenciaSeleccionado.innerHTML = proyecto.assistance;

            var botonQuitar = document.createElement("button");
            botonQuitar.innerHTML = '<i class="bi bi-trash"></i>';
            botonQuitar.className = "btn btn-danger";
            botonQuitar.onclick = function() {

                var proyectoIndex = proyectosSeleccionados.indexOf(proyecto);
                if (proyectoIndex > -1) {
                    proyectosSeleccionados.splice(proyectoIndex, 1);
                }

                mostrarTalleres();


                mostrarProyectosSeleccionados();


            };
            celdaBotones.appendChild(botonQuitar);
        });

        proyectoIds = proyectosSeleccionados.map(function(proyecto) {
            return proyecto.id;
        });
        document.getElementById('proyectosIdsInput').value = proyectoIds.join(',');

        var enviarButton = document.getElementById("enviarButton");
        if (talleresSeleccionados.length > 0 || proyectosSeleccionados.length > 0) {
            enviarButton.style.display = "block";
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