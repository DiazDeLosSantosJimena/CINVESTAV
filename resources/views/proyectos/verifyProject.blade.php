@extends('layout.navbar')
@section('content')
<link rel="stylesheet" href="{{ asset('css/inputs.css') }}">
<div class="container">
    <div class="row mt-4">
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
                @if(count($authors) > 0)
                <div class="col-md-12 col-sm-12 my-3 text-center">
                    <p><strong>~ Autores ~</strong></p>
                </div>
                @foreach($authors as $author)
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Nombre:</strong><br> {{ $author->name }} </p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Apellido Paterno:</strong><br> {{ $author->app }}</p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Apellido Materno:</strong><br> {{ $author->apm }}</p>
                </div>
                @endforeach
                @endif
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Institución de procedencia:</strong><br> {{ $proyect->projects->sending_institution }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 my-2">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center mb-4">
                    <h3>Documentos</h3>
                </div>
                @foreach($files as $file)
                <div class="col-auto mb-3 text-center">
                    <!-- Button Chip -->
                    <a href="{{ route('proyectos.download', $file->id) }}" type="button" class="mdl-chip" style="background-color: #0178a0; color: white;">
                        <span class="mdl-chip__text">{{ $file->name }}</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-12 text-center mb-3">
            <h4>Estatus del Proyecto</h4>
        </div>
        <div class="col-md-4 col-sm-4 my-2 text-center">
            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
        <div class="col-md-4 col-sm-4 my-2 text-center">
            <form action="{{ route('proyectos.accept', $proyect->projects->id) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" value="2" name="status">
                <button type="submit" class="btn btn-success">Aceptar Proyecto</button>
            </form>
        </div>
        <div class="col-md-4 col-sm-4 my-2 text-center">
            <form action="{{ route('proyectos.accept', $proyect->projects->id) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" value="0" name="status">
                <button type="submit" class="btn btn-danger">Rechazar Proyecto</button>
            </form>
        </div>
    </div>
</div>


<script>
    var navbar = document.querySelector('#proyectos');
    navbar.className = "mdl-layout__tab is-active";
</script>
@endsection