@extends('layout.navbar')
@section('content')
<div class="container text-center">
    <div class="row">
        <div class="col-12">
            <h2>Perfíl</h2>
        </div>
        <div class="col-md-12 col-sm-auto mb-5">
            <div class="row">
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
    </div>
</div>

<script>
    var navbar = document.querySelector('#perfil');
    navbar.className = "mdl-layout__tab is-active";
</script>
@endsection