@extends('layout.navbar')
@section('title', 'Registro')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-12 text-center">
            <a class="btn" data-bs-toggle="collapse" href="#formulario" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="role(4)">
                <div class="card text-center rounded-5 border-light" style="color: #0178a0; background-color: #f2f2f2;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4>Público General</h4>
                            </div>
                            <div class="col-12">
                                <h1 class="display-1"><i class="bi bi-people-fill"></i></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-sm-12 text-center">
            <a href="registroPonente" class="btn">
                <div class="card text-center rounded-5 border-light" style="color: #0178a0; background-color: #f2f2f2;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4>&emsp;&ensp;Ponente&ensp;&emsp;</h4>
                            </div>
                            <div class="col-12">
                                <h1 class="display-1"><i class="bi bi-person-video3"></i></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-sm-12 text-center">
            <a class="btn" data-bs-toggle="collapse" href="#formulario" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="role(5)">
                <div class="card text-center rounded-5 border-light" style="color: #0178a0; background-color: #f2f2f2;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4>Invitado Especial</h4>
                            </div>
                            <div class="col-12">
                                <h1 class="display-1"><i class="bi bi-person-heart"></i></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="collapse" id="formulario">
            <div class="col-lg-12 col-sm-12 my-5 card card-body">
                <div class="alert alert-info" role="alert">
                    Tenga en cuenta que los datos proporcionados en el siguiente formulario seran utilizados para la creación de la constancia de asistencia al evento y será enviada al correo que se especifique en el campo de "Correo Electrónico", favor de verificar los datos antes de enviar la información de registro.
                </div>
                <form action="" method="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 mx-5">
                            <h4>Datos Personales</h4>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label> <label for="nombre" class="text-danger">*</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="app" class="form-label">Apellido Paterno:</label> <label for="app" class="text-danger">*</label>
                                <input type="text" class="form-control" id="app" placeholder="Ingrese su Apellido Paterno">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="apm" class="form-label">Apellido Materno:</label>
                                <input type="text" class="form-control" id="app" placeholder="Ingrese su Apellido Materno">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico:</label> <label for="email" class="text-danger">*</label>
                                <input type="text" class="form-control" id="email" placeholder="nombre@ejemplo.com">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="tel" class="form-label">Teléfono:</label> <label for="tel" class="text-danger">*</label>
                                <input type="text" class="form-control" id="tel" placeholder="Ingrese su numero de teléfono">
                            </div>
                        </div>
                        <div class="col-12 mx-5">
                            <h4>Dirección</h4>
                        </div>
                        <div class="col-4">
                            <div class="form-floating">
                                <select class="form-select" id="pais" aria-label="Floating label select example">
                                    <option selected>Seleccione su país</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="pais">País</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating">
                                <select class="form-select" id="estado" aria-label="Floating label select example">
                                    <option selected>Seleccione su estado</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="estado">Estado</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="municipio" placeholder="Escriba su municipio">
                                <label for="municipio">Municipio</label>
                            </div>
                        </div>
                        <input type="hidden" value="4" name="role_id" id="role_id">
                        <div class="col-12 d-flex justify-content-center align-content-center my-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="confirm">
                                <label class="form-check-label" for="flexCheckDefault">
                                    He revisado los datos proporcionados y certifico que la información capturadas sean correctas y responsabilidad de quien la captura.
                                </label>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3">
                            <button type="submit" class="btn btn-success disabled" id="btnRegistro">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    role = (valor) => {
        var inputRole = document.querySelector("#role_id");
        inputRole.value = valor;
    }

    var navbar = document.querySelector('#registro');
    navbar.className = "mdl-layout__tab is-active";

    var checkBox = document.querySelector("#confirm");
    var btnEnviar = document.querySelector("#btnRegistro");

    checkBox.addEventListener('click', ()=>{
        if(checkBox.checked){
            btnEnviar.className = "btn btn-success";
        }else{
            btnEnviar.className = "btn btn-success disabled";
        }
    });
</script>
@endsection
