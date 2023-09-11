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
        <div class="col-12 table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>Nombre del Taller</th>
                        <th>Tipo de Actividad</th>
                        <th>Horarios</th>
                        <th>Asistencia</th>
                    </tr>
                </thead>
                <tbody class="align-middle text-center">
                    @foreach($work as $info)
                    <tr>
                        <td>{{$info->name}}</td>
                        <td>{{$info->activity}}</td>
                        <td>{{$info->hour}}-{{$info->date}}</td>
                        <td class="text-center" scope="col">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <div class="form-check">
                                    <form action="{{ url('attendance') }}" method="post">
                                        {!! csrf_field() !!}
                                        <input class="form-check-input" type="checkbox" value="{{ $info -> id}}" name="workshop_id[]" id="taller{{ $loop->index + 1 }}" onclick="check('{{ $loop->index + 1 }}')">
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    <div class="text-end mb-5">
                        <button type="submit" class="btn btn-primary disabled m-3" value="save" id="guardarTaller">Guadar</button>
                    </div>
                    </form>
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
            enviarButton.style.display = "none";
        }

    }

    function enviarTalleresSeleccionados() {

        document.getElementById('formularioEnviar').submit();
    }


    function mostrarTalleres() {
        var select = document.getElementById("selectTaller");
        var opcionSeleccionada = select.value;

        if (opcionSeleccionada === "5") {
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

            axios.get(`/attendance/${opcionSeleccionada}`)
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


@endsection