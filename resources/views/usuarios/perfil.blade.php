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
                    <img src="{{ asset('img/perfil/'.Auth::user()->photo ) }}" alt="Photo" class="img-fluid rounded" style="width: 220px;">
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
                @if(Auth::user()->rol_id == 3)
                <div class="col-md-4 col-sm-6">
                    <h5>Contacto alterno:</h5>
                    <p>{{Auth::user()->alternative_contact}}</p>
                </div>
                @else
                <div class="col-md-4 col-sm-6">
                    <h5>Grado Academico:</h5>
                    <p>{{Auth::user()->alternative_contact}}</p>
                </div>
                @endif
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
                    <form action="{{route('soportemail')}}" method="GET">
                        <div class="form-floating mb-3">
                            <input type="text" name="asunto" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Asunto:</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" name="comentario" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Motivo del Correo</label>
                        </div>
                        <div class="text-start my-3">
                            <button type="submit" class="btn btn-success">Enviar</button>
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