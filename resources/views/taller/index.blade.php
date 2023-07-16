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
    <div class="row">
        <div class="col mx-5">
            <h3>Talleres</h4>
        </div>
        <div class="col d-flex justify-content-end my-5">
            <a class="btn btn-success" href="taller/create"><i class="bi bi-plus-lg"></i></a>
        </div>
        <div class="col-12 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Nombre del Taller</th>
                        <th scope="col" class="text-center">Tipo de Actividad</th>
                        <th scope="col" class="text-center">Estatus</th>
                        <th scope="col" class="text-center" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($talle as $info)
                    <tr>
                        <td class="text-center">{{$info->name}}</td>
                        <td class="text-center">{{$info->activity}}</td>
                        <td class="text-center">
                            @if($info -> status > 0)
                            <p style="color: green;">Activo</p>
                            @else
                            <p style="color: red;">Inactivo</p>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a class="btn btn-primary" href="taller/{{$info->id}}"><i class="bi bi-eye-fill"></i></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-warning text-white" href="{{ route('taller.edit', $info->id) }}"><i class="bi bi-pencil-square"></i></a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('taller.destroy', $info->id) }}" method="POST">
                                {!! csrf_field() !!}
                                @method("delete")
                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var navbar = document.querySelector('#taller');
    navbar.className = "mdl-layout__tab is-active";
</script>

@endsection