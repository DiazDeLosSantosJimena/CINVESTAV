@extends('layout.navbar')
@section('title', 'Talleres')
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
                    <h3>Talleres</h3>
                </div>
                <div class="col text-end mt-4">
                    <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modaladd"><i class="bi bi-plus-lg"></i></button>
                </div>
                <div class="col-12 table-responsive mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Nombre del Taller</th>
                                <th scope="col" class="text-center">Presentadores</th>
                                <th scope="col" class="text-center">Fecha</th>
                                <th scope="col" class="text-center">Hora</th>
                                <th scope="col" class="text-center" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach($talle as $info)
                            <tr>
                                <td class="text-center">{{$info->title}}</td>
                                <td class="text-center">{{$info->nameu}}</td>
                                <td class="text-center">{{$info->date}}</td>
                                <td class="text-center">{{$info->hour}}</td>
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
    var navbar = document.querySelector('#taller');
    navbar.className = "mdl-layout__tab is-active";
</script>
@section('modales')
@include('taller.modalestaller')
@endsection

@endsection