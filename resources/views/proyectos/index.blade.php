@extends('layout.navbar')
@section('title', 'Proyectos')
@section('content')
<div class="container">
    <div class="row">
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Excelente!</strong> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="col col-sm-4 mx-5">
            <h2>Proyectos</h2>
        </div>
        <div class="col col-sm-6 p-4 d-flex justify-content-end mdl-cell--hide-desktop">
            <a class="btn btn-success" href="addProyect"><i class="bi bi-plus-circle-fill"></i></a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th class="text-center" scope="col">Nombre del Proyecto</th>
                        <th scope="col">Descripción</th>
                        <th class="text-center" scope="col">Rama</th>
                        @if(Auth::user()->role_id !== 3)
                        <th>User</th>
                        @endif
                        <th scope="col" class="text-center">Estatus</th>
                        <th scope="col" class="text-center" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proposals as $prop)
                    <tr class="align-middle">
                        <td>{{ $loop->index + 1 }}</td>
                        <td class="text-center">{{ $prop->project->name }}</td>
                        <td>{{ $prop->project->description }}</td>
                        <td class="text-center">{{ $prop->rama->name }}</td>
                        @if(Auth::user()->role_id !== 3)
                        <td>{{ $prop->user->name }}</td>
                        @endif
                        <td class="text-center">
                            @if($prop->status === 0)
                            <span class="badge text-white text-bg-warning">Pendiente</span>
                            @elseif($prop->status === 1)
                            <span class="badge text-white text-bg-success">Success</span>
                            @else
                            <span class="badge text-white text-bg-danger">Danger</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('proposals.show', $prop->id) }}" class="btn btn-primary">
                                <i class="bi bi-info-circle-fill"></i>
                            </a>
                        </td>
                        @if(Auth::user()->id === $prop->user_id)
                        <td class="text-center">
                            <a href="{{ route('proposals.edit', $prop->id) }}" class="btn btn-info text-white">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-danger" id="show-dialog{{ $prop->id }}" type="button">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('proyectos.modal')

<script>
    var navbar = document.querySelector('#proyectos');
    navbar.className = "mdl-layout__tab is-active";
    var add = document.querySelector('#add');
    add.className = "mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent";
</script>

@endsection