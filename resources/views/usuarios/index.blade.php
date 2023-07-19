@extends('layout.navbar')
@section('title', 'Usuarios')

<script src="{{ asset('js\jquery-3.6.4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        // --------Programas =-> Metas---------------------------------------------------
        $("#proyecto").on('change', function() {
            var id_proyecto = $(this).find(":selected").val();
            console.log(id_proyecto);
            if (id_proyecto == 0) {
                $("#juez").html('<option value="0">-- Seleccione un Proyecto antes --</option>');
            } else {
                $("#juez").load('js_juez?id_proyecto=' + id_proyecto);
            }
        });
    });
</script>

@section('content')

<div class="container">
    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Excelente!</strong> {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="col-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Usuarios</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Evaluadores</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <div class="container">
                    <div class="row">
                        <br>
                        <div class="col mx-5 mt-4">
                            <h3>Usuarios</h3>
                        </div>
                        <div class="col-12 table-responsive mt-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Titulo academico</th>
                                        <th>Email</th>
                                        <th class="text-center">Teléfono</th>
                                        <th class="text-center">País</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Municipio</th>
                                        <th class="text-center">Tipo de usuario</th>
                                        <th class="text-center" colspan="3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @foreach($usuariosG as $usuario)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $usuario->name .' '. $usuario->app .' '. $usuario->apm}}</td>
                                        <td>{{ $usuario->academic_degree }}</td>
                                        <td>{{ $usuario->email}}</td>
                                        <td>{{ $usuario->phone}}</td>
                                        <td class="text-center">{{ $usuario->country}}</td>
                                        <td class="text-center">{{ $usuario->state}}</td>
                                        <td class="text-center">{{ $usuario->municipality}}</td>
                                        <td class="text-center">@if($usuario->rol_id == 3)
                                            Ponente
                                            @elseif($usuario->rol_id == 4)
                                            Público General
                                            @endif</td>
                                        <td class="text-center">
                                            <!-- Button edit modal -->
                                            <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editUsuario{{ $usuario->id }}"><i class="bi bi-pencil-square"></i></button>
                                        </td>
                                        <td class="text-center">
                                            <!-- Button edit modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUsuario{{ $usuario->id }}"><i class="bi bi-trash-fill"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="container">
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
            </div>
        </div>
    </div>
</div>

@section('modales')
@include('usuarios.modalesjuez')
@endsection

@endsection