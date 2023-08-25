@extends('layout.navbar')
@section('title', 'Ponencias')
@section('content')

<div class="container">
    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Excelente!</strong> {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="col-12">
        <a href="taller" class="btn btn-primary">Talleres</a>

        <a href="presentation" class="btn btn-primary">Proyectos aprobados</a>

        <div class="container">
            <div class="row">
                <br>
                <div class="col mx-5 mt-4">
                    <h3>Proyectos Aprobados</h3>
                </div>
                <div class="col text-end mt-4">
                    <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modaladd"><i class="bi bi-plus-lg"></i></button>
                </div>
                <div class="col-12 table-responsive mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Nombre de la ponencia</th>
                                <th scope="col" class="text-center">Presentador</th>
                                <th scope="col" class="text-center">Tipo de Actividad</th>
                                <th scope="col" class="text-center">Fecha</th>
                                <th scope="col" class="text-center">Hora</th>
                                <th scope="col" class="text-center">Estatus</th>
                                <th scope="col" class="text-center" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach($pre as $info)
                            <tr>
                                <td class="text-center">{{$info->title}}</td>
                                <td class="text-center">{{$info->name}} {{$info->app}} {{$info->apm}}</td>
                                @if($info->modality == 'P' )
                                <td class="text-center">Ponencia</td>
                                @else
                                <td class="text-center">Cartel</td>
                                @endif
                                <td class="text-center">{{$info->date}}</td>
                                <td class="text-center">{{$info->hour}}</td>
                                <td class="text-center">
                                    @if($info -> estado > 0)
                                    <p style="color: green;">Activo</p>
                                    @else
                                    <p style="color: red;">Inactivo</p>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $info->id }}"><i class="bi bi-pencil-square"></i></button>
                                </td>
                                <td class="text-center">
                                   
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $info->id }}"><i class="bi bi-trash-fill"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    var navbar = document.querySelector('#ponencias');
    navbar.className = "mdl-layout__tab is-active";
</script>
@section('modales')
@include('ponencias.modalesponencia')
@endsection

@endsection