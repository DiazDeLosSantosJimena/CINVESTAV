@extends('layout.navbar')
@section('title','Talleres')
@section('content')
<div class="container">
    <div class="row justify-content-md-center mb-5">
        <div class="col-12 mx-5 my-4">
            <p class="display-5">
            Mis Talleres
            </p>
        </div>
        <div class="col-xl-4 col-md-12 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <a href="{{route('pdftaller')}}">
                        <div class="row no-gutters align-items-center" style="color: #0078a1;">
                            <div class="col-12 text-center my-5">
                                <i class="bi bi-filetype-pdf" style="font-size: 5rem; color: #7f7f7f;"></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h4>Mis talleres</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary"> Clic para observar los talleres a los que te inscribiste </button>
        </div>
        <div class="col-12 text-end mt-5">
            <a href="{{ route('attendance.reingreso') }}">Registrar nuevamente mis talleres</a>
        </div>
    </div>
</div>

<script>
    var navbar = document.querySelector('#attendance');
    navbar.className = "mdl-layout__tab is-active";
</script>
@endsection