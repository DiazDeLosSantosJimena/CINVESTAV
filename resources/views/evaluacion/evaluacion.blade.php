@extends('layout.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h3>Datos del Ponente</h3>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Nombre del postulante:</strong><br> {{ $proyect->user->name .' '. $proyect->user->app .' '. $proyect->user->apm }}</p>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Correo:</strong><br> {{ $proyect->user->email }}</p>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Teléfono:</strong><br> {{ $proyect->user->phone }}</p>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Grado Academico:</strong><br> {{ $proyect->user->academic_degree }}</p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>País:</strong><br> {{ $proyect->user->country }}</p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Estado:</strong><br> {{ $proyect->user->state }}</p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Ciudad:</strong><br> {{ $proyect->user->municipality }}</p>
                </div>
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Asistencia:</strong>
                        <br>
                        @if($proyect->user->assistance == 'p')
                        Presencial
                        @elseif($proyect->user->assistance == 'v')
                        Virtual
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h3>Datos del Proyecto</h3>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Título del proyecto:</strong><br> {{ $proyect->projects->title }}</p>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Modalidad de participación:</strong>
                        <br>
                        @if($proyect->projects->modality == 'P')
                        Ponencia
                        @elseif( $proyect->projects->modality == 'C')
                        Cartel
                        @else
                        {{ $proyect->projects->modality }}
                        @endif
                    </p>
                </div>
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Eje tematico:</strong>
                        <br>
                        @if($proyect->projects->thematic_area == 'U')
                        Nivel Universitario por área.(Cálculo, Algebra, Geometría Analitca, Algebra Lineal, etc.)
                        @elseif( $proyect->projects->thematic_area == 'P')
                        Nivel Preuniversitario.(Bachillerato.)
                        @elseif( $proyect->projects->thematic_area == 'B')
                        Nivel Básico.(Primaria o secundaria.)
                        @elseif( $proyect->projects->thematic_area == 'STEM')
                        Ciencia, Tecnológia, Ingenieria y Matemáticas (STEM).
                        @else
                        {{ $proyect->projects->modality }}
                        @endif
                    </p>
                </div>
                {{--@if($proyect->authors)--}}
                <div class="col-md-12 col-sm-12 my-3 text-center">
                    <p><strong>~ Autores ~</strong></p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Nombre:</strong><br> </p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Apellido Paterno:</strong><br> </p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Apellido Materno:</strong><br> </p>
                </div>
                {{-- @endif --}}
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Institución de procedencia:</strong><br> {{ $proyect->projects->sending_institution }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 my-2">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h3>Documentos</h3>
                </div>
                @foreach($files as $file)
                <div class="col-auto mb-3 text-center">
                    <!-- Button Chip -->
                    <a href="" type="button" class="mdl-chip" style="background-color: #0178a0; color: white;">
                        <span class="mdl-chip__text">{{ $file->name }}</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @if(Auth::user()->rol_id == 2 || Auth::user()->rol_id == 1)
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
        @endif
        <script>
            var navbar = document.querySelector('#evaluaciones');
            navbar.className = "mdl-layout__tab is-active";
        </script>
        <div class="col-md-12 col-sm-12 my-2 text-center">
            <a href="{{ route('evaluacion.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</div>
@endsection