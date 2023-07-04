@extends('layout.navbar')
@section('title', 'Tablas')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6 my-3">
            <a href="users" class="btn">
                <div class="card text-center rounded-5 border-light" style="color: #0178a0; background-color: #f2f2f2;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4>Usuarios</h4>
                            </div>
                            <div class="col-12">
                                <h1 class="display-1"><i class="bi bi-people-fill"></i></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 my-3">
            <a href="ramas" class="btn">
                <div class="card text-center rounded-5 border-light" style="color: #0178a0; background-color: #f2f2f2;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4>Ramas</h4>
                            </div>
                            <div class="col-12">
                                <h1 class="display-1"><i class="bi bi-menu-button-wide"></i></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 my-3">
            <a href="roles" class="btn">
                <div class="card text-center rounded-5 border-light" style="color: #0178a0; background-color: #f2f2f2;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4>Roles</h4>
                            </div>  
                            <div class="col-12">
                                <h1 class="display-1"><i class="bi bi-toggles"></i></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<script>
    var navbar = document.querySelector('#tablas');
    navbar.className = "mdl-layout__tab is-active";
</script>
@endsection