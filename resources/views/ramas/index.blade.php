@extends('layout.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-4 mx-5">
            <h2>Ramas</h2>
        </div>
        <div class="col col-sm-6 p-4 d-flex justify-content-end mdl-cell--hide-desktop">
            <a class="btn btn-success" href="addProyect"><i class="bi bi-plus-circle-fill"></i></a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
