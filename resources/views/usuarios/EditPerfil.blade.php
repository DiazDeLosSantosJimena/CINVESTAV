@extends('layout.navbar')
@section('content')

<div class="container mb-5">
    <div class="row">
        <div class="col-12 mx-5">
            <h3>Editar Perfil</h3>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Apellido paterno:</label>
                        <input type="text" class="form-control" name="app" placeholder="Apellido">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Apellido materno:</label>
                        <input type="text" class="form-control" name="apm" placeholder="Apellido">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Correo:</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" name="pass" placeholder="Contraseña">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" name="fn">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Teléfono:</label>
                        <input type="text" class="form-control" name="telefono" placeholder="xxxxxx">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 text-center">
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('img/perfil/default.jpg') }}" alt="foto.jpg" style="height: 200px;">
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto de perfil</label>
                        <input class="form-control" type="file" name="foto">
                    </div>
                </div>
                <div class="col-6 mt-3">
                    <a class="btn btn-danger" href="perfil">Cancelar</a>
                </div>
                <div class="col-6 mt-3">
                    <a class="btn btn-success" href="perfil">Guardar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var navbar = document.querySelector('#perfil');
    navbar.className = "mdl-layout__tab is-active";
</script>

@endsection