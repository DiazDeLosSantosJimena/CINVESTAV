@extends('layout.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mx-5">
            <h3>Perfíl</h3>
        </div>
        <div class="col-md-6 col-sm-auto mb-5">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <h5>Nombre(s):</h5>
                    <p>{{Auth::user()->name}}</p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <h5>Apellido Paterno:</h5>
                    <p>{{Auth::user()->app}}</p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <h5>Apellido Materno:</h5>
                    <p>{{Auth::user()->apm}}</p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <h5>Fecha de Nacimiento:</h5>
                    <p>{{Auth::user()->fn}}</p>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h5>Correo:</h5>
                    <p>{{Auth::user()->email}}</p>
                </div>
                <div class="col-md-4 col-sm-6">
                    <h5>Teléfono:</h5>
                    <p>{{Auth::user()->number}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="row text-center">
                <div class="col-12">
                    <img src="{{ asset('img/perfil/default.jpg') }}" alt="{{Auth::user()->img}}" style="height: 200px;">
                </div>
                <div class="col-12 mt-3">
                    <a class="btn btn-primary" href="EditPerfil" style="background-color: #0178a0;">Editar Perfíl <i class="bi bi-credit-card-2-front-fill"></i></a>
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