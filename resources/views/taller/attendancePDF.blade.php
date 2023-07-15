@extends('layout.navbar')
@section('title','Talleres')
@section('content')
<div class="container text-center">
    <div class="row">
        <div class="col-12 my-5">
            <p class="display-1">Mis Talleres</p>
        </div>
        <div class="col-12">
            <button class="btn btn-primary"> Clic para observar los talleres a los que te inscribiste </button>
        </div>
    </div>
</div>

<script>
    var navbar = document.querySelector('#attendance');
    navbar.className = "mdl-layout__tab is-active";
</script>
@endsection