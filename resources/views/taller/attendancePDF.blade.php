@extends('layout.navbar')
@section('title','Talleres')
@section('content')
<div class="container text-center">
    <div class="row">
        <div class="col-12 my-5">
            <p class="display-1">Mis Talleres</p>
        </div>
        <div class="col-12">
            <a class="btn btn-primary" href="{{route('pdftaller')}}" role="button">Clic para observar los talleres a los que te inscribiste</a>
        </div>
    </div>
</div>

<script>
    var navbar = document.querySelector('#attendance');
    navbar.className = "mdl-layout__tab is-active";
</script>
@endsection