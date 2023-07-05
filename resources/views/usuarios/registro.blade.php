@extends('layout.navbar')
@section('title', 'Registro Ponente')

@section('content')

<div class="container">
    <div class="row">
        <h3 class="my-2">Registro Ponente</h3>
        <div class="alert alert-info" role="alert">
            Tenga en cuenta que los datos proporcionados en el siguiente formulario seran utilizados para la creación de la constancia de asistencia al evento, así como el registro de la ponencia u otros elementos, toda información será enviada al correo que se especifique en el campo de "Correo Electrónico", favor de verificar los datos antes de enviar la información de registro.
        </div>
        <div class="col-12 mx-5">
            <h4>~ Datos Personales ~</h4>
        </div>
        <form action="{{ route ('users.store')}}" method="post">
            @csrf
        <div class="col-4">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label> <label for="nombre" class="text-danger">*</label>
                <input type="text" class="form-control" name="name" id="nombre" placeholder="Ingrese su nombre">
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="app" class="form-label">Apellido Paterno:</label> <label for="app" class="text-danger">*</label>
                <input type="text" class="form-control" name="apm" id="app" placeholder="Ingrese su Apellido Paterno">
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="apm" class="form-label">Apellido Materno:</label>
                <input type="text" class="form-control" name="app" id="app" placeholder="Ingrese su Apellido Materno">
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="tel" class="form-label">Teléfono:</label> <label for="tel" class="text-danger">*</label>
                <input type="text" class="form-control" name="phone" id="tel" placeholder="Ingrese su número de teléfono">
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico:</label> <label for="email" class="text-danger">*</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="nombre@ejemplo.com">
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label> <label for="nombre" class="text-danger">*</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese una contraseña">
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="confirmPass" class="form-label">Confirmar contraseña:</label> <label for="nombre" class="text-danger">*</label>
                <input type="password" class="form-control" id="confirmPass" placeholder="Confirme la contraseña anterior">
            </div>
        </div>
        <div class="col-12 mx-5">
            <h4>~ Dirección ~</h4>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="tel" class="form-label">Pais/Country:</label> <label for="tel" class="text-danger">*</label>
                <input type="text" class="form-control"  id="tel" name="country" placeholder="Ingrese su numero de teléfono">
            </div>
            </div>

        <div class="col-4">

        </div>

        <div class="col-4">
            <div class="mb-3">
                <label for="tel" class="form-label">Estado/State:</label> <label for="tel" class="text-danger">*</label>
                <input type="text" class="form-control"  id="tel" name="state" placeholder="Ingrese su numero de teléfono">
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="tel" class="form-label">Municipio/municipality:</label> <label for="tel" class="text-danger">*</label>
                <input type="text" class="form-control"  id="tel" name="municipality" placeholder="Ingrese su numero de teléfono">
            </div>
        </div>
        <input type="hidden" value="4" name="role_id" id="role_id">
        <div class="col-12 d-flex justify-content-center align-content-center my-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="p" name="assistance" id="confirm">
                <label class="form-check-label" for="flexCheckDefault">
                    He revisado los datos proporcionados y certifico que la información capturadas sean correctas y responsabilidad de quien la captura.
                </label>
            </div>
        </div>
        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-success disabled" id="btnRegistro">Enviar</button>
        </form>
        </div>
    </div>
</div>

<script>
    var navbar = document.querySelector('#registro');
    navbar.className = "mdl-layout__tab is-active";

    var checkBox = document.querySelector("#confirm");
    var btnEnviar = document.querySelector("#btnRegistro");

    checkBox.addEventListener('click', () => {
        if (checkBox.checked) {
            btnEnviar.className = "btn btn-success";
        } else {
            btnEnviar.className = "btn btn-success disabled";
        }
    });
</script>
@endsection
