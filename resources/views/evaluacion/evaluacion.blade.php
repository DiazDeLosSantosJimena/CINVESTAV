@extends('layout.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h3>Datos del Postulante</h3>
                </div>
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Nombre del postulante:</strong><br> </p>
                </div>
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Correo:</strong><br> </p>
                </div>
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Teléfono:</strong><br> </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h3>Datos del Proyecto</h3>
                </div>
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Nombre del proyecto:</strong><br> </p>
                </div>
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Descripción:</strong><br> </p>
                </div>
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Fecha de publicación:</strong><br> </p>
                </div>
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Categoría:</strong><br> </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 my-2">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h3>Documentos</h3>
                </div>
                <div class="col-auto mb-3 text-center">
                    <p><strong>Resumen:</strong></p>
                    <!-- Button Chip -->
                    <a href="" type="button" class="mdl-chip" style="background-color: #0178a0; color: white;">
                        <span class="mdl-chip__text">Archivo</span>
                    </a>
                </div>
                <div class="col-auto mb-3 text-center">
                    <p><strong>Extenso:</strong></p>
                    <!-- Button Chip -->
                    <a href="" type="button" class="mdl-chip" style="background-color: #0178a0; color: white;">
                        <span class="mdl-chip__text">Archivo</span>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 mx-5">
                    <h3>Calificación</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Criterio</th>
                                <th scope="col">Puntuación Evaluada</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle">
                                <th>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus molestias esse dolorum praesentium debitis nihil quas voluptatem ea et in. Iusto debitis ipsum ut magni labore, necessitatibus molestiae quas sit.</th>
                                <th class="text-center">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="NO.">
                                    </div>
                                </th>
                            </tr>
                            <tr class="align-middle table-group-divider">
                                <th style="text-align: end;">Total:</th>
                                <th class="text-center">
                                    <p>0</p>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col d-flex justify-content-end">
                    <button type="button" class="btn btn-success">Calificar</button>
                </div>
            </div>
        </div>
        <script>
            var navbar = document.querySelector('#evaluaciones');
            navbar.className = "mdl-layout__tab is-active";
        </script>
        <div class="col-md-12 col-sm-12 my-2 text-center">
            <a href="{{ route('project.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</div>
<script>
    var navbar = document.querySelector('#proyectos');
    navbar.className = "mdl-layout__tab is-active";
</script>
@endsection