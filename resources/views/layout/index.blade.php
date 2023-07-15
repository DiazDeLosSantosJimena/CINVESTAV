@extends('layout.navbar')
@section('title','Inicio')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mx-5 my-4">
            <p class="display-5">
                Inicio
            </p>
        </div>
        <div class="col-xl-4 col-md-12 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <a href="{{ route('proyectos.index') }}">
                        <div class="row no-gutters align-items-center" style="color: #0078a1;">
                            <div class="col-12 text-center my-3">
                                <i class="bi bi-house-door-fill" style="font-size: 7rem; color: #7f7f7f;"></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h3>Proyectos</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <a href="{{ route('evaluacion.index') }}">
                        <div class="row no-gutters align-items-center" style="color: #0078a1;">
                            <div class="col-12 text-center my-3">
                                <i class="bi bi-clipboard-check-fill" style="font-size: 7rem; color: #7f7f7f;"></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h3>Evaluación</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <a href="{{ route('taller.index') }}" class="">
                        <div class="row no-gutters align-items-center" style="color: #0078a1;">
                            <div class="col-12 text-center my-3">
                                <i class='bi bi-clipboard-data-fill' style="font-size: 7rem; color: #7f7f7f;"></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h3>Registro Talleres</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <a href="{{ route('usuarios') }}">
                        <div class="row no-gutters align-items-center" style="color: #0078a1;">
                            <div class="col-12 text-center my-3">
                                <i class='bi bi-person-fill-add' style="font-size: 7rem; color: #7f7f7f;"></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h3>Registro Evaluadores</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <a href="{{ route('attendance.index') }}">
                        <div class="row no-gutters align-items-center" style="color: #0078a1;">
                            <div class="col-12 text-center my-3">
                                <i class='bi bi-boxes' style="font-size: 7rem; color: #7f7f7f;"></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h3>Actividades</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <div class="row no-gutters align-items-center" style="color: #0078a1;">
                        <div class="col-12 text-center my-3">
                            <a href="{{ route('perfil') }}">
                                <i class='bi bi-person-circle' style="font-size: 7rem; color: #7f7f7f;"></i>
                            </a>
                        </div>
                        <div class="col-12 text-center">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                <a href="{{ route('perfil') }}" style="color: #0078a1;">
                                    <h3>Perfíl</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <a href="{{ route('encuentro') }}" class="">
                        <div class="row no-gutters align-items-center" style="color: #0078a1;">
                            <div class="col-12 text-center my-3">
                                <img src="{{ asset('img/logo_positivo.png') }}" alt="Encuentro" class="img-fluid" style="height: 220px;">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    var navbar = document.querySelector('#inicio');
    navbar.className = "mdl-layout__tab is-active";
</script>

@endsection