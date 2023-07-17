@extends('layout.navbar')
@section('title', 'Usuarios')

@section('content')

<div class="container">
    <div class="row">
        <div class="col mx-5">
            <h3>Usuarios</h4>
        </div>
        <div class="col d-flex justify-content-end my-5">
            <a href="#" class="btn btn-primary mx-2">Asignar Proyectos a Evaluadores</a>
            <a class="btn btn-success" href="#"><i class="bi bi-plus-lg"></i></a>
        </div>
        <div class="col-12 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection