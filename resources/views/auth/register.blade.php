<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/material.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">
<link rel="shortcut icon" href="{{asset('/img/logo_negativo.png')}}" />
<style>
    body {
        background-image: url("../img/cinestav_fondo.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>
<div class="container h-100 w-100 d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-12 text-center row">
            <div class="col-6">
                <a href="registroPonente" class="btn">
                    <div class="card text-center rounded-5 border-light shadow" style="color: #0178a0; background-color: #f2f2f2;">
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
            <div class="col-6">
                <a class="btn" href="registroGeneral" role="button">
                    <div class="card text-center rounded-5 border-light shadow" style="color: #0178a0; background-color: #f2f2f2;">
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
        </div>
        <div class="col-12 text-center mt-5">
            <a href="{{ route('login') }}" type="button" class="btn btn-info" style="color: white;">Regresar</a>
        </div>
    </div>
</div>

<script>
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