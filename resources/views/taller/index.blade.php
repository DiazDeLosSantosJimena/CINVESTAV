@extends('layout.navbar')
@section('title', 'Talleres')
@section('content')

<div class="container">
    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Excelente!</strong> {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-12 mx-5 my-4">
            <h3>Talleres</h4>
        </div>
        <!-- <div class="col d-flex justify-content-end my-5">
            <a class="btn btn-success" href="taller/create"><i class="bi bi-plus-lg"></i></a>
        </div> -->
        <div class="col-12 text-center">
            <p class="display-1">Proximamente...</p>
        </div>
    </div>
</div>

<script>
    var navbar = document.querySelector('#taller');
    navbar.className = "mdl-layout__tab is-active";
</script>

@endsection