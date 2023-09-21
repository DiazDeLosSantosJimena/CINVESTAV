@extends('layout.navbar')
@section('title','Inicio')
@section('content')

<div class="container">
    <div class="row justify-content-md-center mb-5">
        <div class="col-12 mx-5 my-4">
            <p class="display-5">
                Reportes Excel
            </p>
        </div>
        <div class="col-xl-4 col-md-12 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <a href="{{route('project.export')}}">
                        <div class="row no-gutters align-items-center" style="color: #0078a1;">
                            <div class="col-12 text-center my-5">
                                <i class="bi bi-award-fill" style="font-size: 5rem; color: #7f7f7f;"></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h4>Ponencias</h4>
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
                    <a href="{{route('cartel.export')}}">
                        <div class="row no-gutters align-items-center" style="color: #0078a1;">
                            <div class="col-12 text-center my-5">
                                <i class="bi bi-easel-fill" style="font-size: 5rem; color: #7f7f7f;"></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h4>Carteles</h4>
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
                    <a href="{{route('project.exporta')}}">
                        <div class="row no-gutters align-items-center" style="color: #0078a1;">
                            <div class="col-12 text-center my-5">
                                <i class="bi bi-clipboard-check-fill" style="font-size: 5rem; color: #7f7f7f;"></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h4>Ponencia/Cartel Aceptadas</h4>
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
                    <a href="{{route('project.exportar')}}" class="">
                        <div class="row no-gutters align-items-center" style="color: #0078a1;">
                            <div class="col-12 text-center my-5">
                                <i class="bi bi-graph-down" style="font-size: 5rem; color: #7f7f7f;"></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h4>Ponencia/Cartel Rechazadas</h4>
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
                    <a href="{{route('talleres.export')}}">
                        <div class="row no-gutters align-items-center" style="color: #0078a1;">
                            <div class="col-12 text-center my-5">
                                <i class='bi bi-clipboard-data-fill' style="font-size: 5rem; color: #7f7f7f;"></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h4>Talleres</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var navbar = document.querySelector('#report');
    navbar.className = "mdl-layout__tab is-active";
</script>

@endsection