@extends('layout.navbar')
@section('content')
<link rel="stylesheet" href="{{ asset('css/inputs.css') }}">
<div class="container text-center">
    <div class="row">
        <div class="col-12">
            <h2>Perfíl</h2>
        </div>
        <div class="col-md-12 col-sm-auto mb-5">
            <div class="row">
                @if(Auth::user()->photo != "")
                <div class="col-12">
                    <img src="{{ asset('img/perfil/'.Auth::user()->photo ) }}" alt="Photo" class="img-fluid" style="width: 220px;">
                </div>
                @endif
                <div class="col-md-4 col-sm-4">
                    <h5>Nombre(s):</h5>
                    <p>{{Auth::User()->name}}</p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <h5>Apellido Paterno:</h5>
                    <p>{{Auth::user()->app}}</p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <h5>Apellido Materno:</h5>
                    <p>{{Auth::user()->apm}}</p>
                </div>
                <div class="col-md-4 col-sm-6">
                    <h5>Correo:</h5>
                    <p>{{Auth::user()->email}}</p>
                </div>
                <div class="col-md-4 col-sm-6">
                    <h5>Teléfono:</h5>
                    <p>{{Auth::user()->phone}}</p>
                </div>
                <div class="col-md-4 col-sm-6">
                    <h5>Grado academico:</h5>
                    <p>{{Auth::user()->academic_degree}}</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-sm-12 col-md-12">
            <div class="row">
                <div class="col-12">
                    <h2>Preguntas y/o Comentarios</h2>
                </div>
                <div class="indicador my-3" role="alert">
                    Para preguntas, aclaraciones o correcciones en los datos de la cuenta, por favor llenar el siguiente formulario.
                </div>
                <div class="col-sm-12 col-md-6  d-flex justify-content-center align-items-center">
                    <p class="display-4">Contacto:</p>
                </div>
                <div class="col-sm-12 col-md-6">
                    <form action="">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="asunto" id="asunto">
                            <label for="asunto">Asunto:</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="motivo" name="motivo" style="height: 100px"></textarea>
                            <label for="motivo">Motivo del Correo</label>
                        </div>
                        <div class="text-start my-3">
                            <button type="button" class="btn btn-success">Enviar</button>
                        </div>
                    </form>
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