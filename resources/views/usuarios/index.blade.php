@include('usuarios.modalesjuez')
@extends('layout.navbar')
@section('title', 'Usuarios')

@section('content')

<div class="container">
    <div class="row">
        <div class="col mx-5">
            <h3>Usuarios</h4>
        </div>
        <div class="col d-flex justify-content-end my-5">
            <button type="button" class="btn btn-success mx-1 my-1" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="col-12 table-responsive">
            <table class="table">
                <thead>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Institucion</th>
                            <th>Titulo academico</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Pais</th>
                            <th>Estado</th>
                            <th>Municipio</th>
                            <th class="text-center">Acciones</th>
                            <th></th>

                        </tr>
                    </thead>
                <tbody>
                    <?php
                    $a = 1;
                    ?>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td><?php echo $a++?></td>
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
                        @endforeach
                    </tr>
                </tbody>
            </table>
          
        </div>
    </div>
</div>

@endsection