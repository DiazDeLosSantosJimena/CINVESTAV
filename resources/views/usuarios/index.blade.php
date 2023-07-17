@extends('layout.navbar')
@section('title', 'Usuarios')

<script src="{{ asset('js\jquery-3.6.4.min.js') }}"></script>
<!-- <script>
    $(document).ready(function() {
        // --------Programas =-> Metas---------------------------------------------------
        $("#evaluador").on('change', function() {
            var id_evaluador = $(this).find(":selected").val();
            console.log(id_evaluador);
            if (id_evaluador == 0) {
                $("#proyecto").html('<option value="0">-- Seleccione un evaluador antes --</option>');
            } else {
                $("#proyecto").load('js_proyectos?id_evaluador=' + id_evaluador);
            }
        });
    });
</script> -->

@section('content')
<div class="container">
    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Excelente!</strong> {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <br>
        <div class="col mx-5 mt-4">
            <h3>Proyectos y Evaluadores</h3>
        </div>
        <div class="col text-end mt-4">
            <a href="#" class="btn btn-primary mx-2" id="btn_asignUser" data-bs-toggle="modal" data-bs-target="#modalAsignUser">Asignar Proyectos a Evaluadores</a>
        </div>
        <div class="col-12 table-responsive mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Institucion</th>
                        <th>Titulo academico</th>
                        <th>Email</th>
                        <th>Proyecto</th>
                        <th class="text-center" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($proyectsEvaluators as $usuario)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $usuario->name}}</td>
                        <td>{{ $usuario->app .' '. $usuario->apm }}</td>
                        <td>{{ $usuario->academic_degree}}</td>
                        <td>{{ $usuario->email}}</td>
                        <td>{{ $usuario->title}}</td>
                        <td class="text-center">
                            <!-- Button edit modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $usuario->evaluationId }}"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <br>
        <div class="col mx-5 mt-4">
            <h3>Evaluadores</h3>
        </div>
        <div class="col text-end mt-4">
            <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="col-12 table-responsive mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Institucion</th>
                        <th>Titulo academico</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Pais</th>
                        <th>Estado</th>
                        <th>Municipio</th>
                        <th class="text-center" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($usuarios as $usuario)
                    @if($usuario->deleted_at == null)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $usuario->name}}</td>
                        <td>{{ $usuario->apm}}</td>
                        <td>{{ $usuario->academic_degree}}</td>
                        <td>{{ $usuario->email}}</td>
                        <td>{{ $usuario->phone}}</td>
                        <td>{{ $usuario->country}}</td>
                        <td>{{ $usuario->state}}</td>
                        <td>{{ $usuario->municipality}}</td>
                        <td class="text-center">
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $usuario->id }}"><i class="bi bi-eye-fill"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button edit modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $usuario->id }}"><i class="bi bi-pencil-square"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button edit modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $usuario->id }}"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('modales')
@include('usuarios.modalesjuez')
@endsection

@endsection