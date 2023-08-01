@extends('layout.navbar')
@section('content')
<link rel="stylesheet" href="{{ asset('css/inputs.css') }}">
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h3>Datos del Ponente</h3>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Nombre del postulante:</strong><br> {{ $uni->user->name .' '. $uni->user->app .' '. $uni->user->apm }}</p>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Correo:</strong><br> {{ $uni->user->email }}</p>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Teléfono:</strong><br> {{ $uni->user->phone }}</p>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Contacto Alterno:</strong><br> {{ $uni->user->alternative_contact }}</p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>País:</strong><br> {{ $uni->user->country }}</p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Estado:</strong><br> {{ $uni->user->state }}</p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Ciudad:</strong><br> {{ $uni->user->municipality }}</p>
                </div>
            </div>     
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h3>Datos del Proyecto</h3>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Título del proyecto:</strong><br> {{ $uni->projects->title }}</p>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Modalidad de participación:</strong>
                        <br>
                        @if($uni->projects->modality == 'P')
                        Ponencia
                        @elseif( $uni->projects->modality == 'C')
                        Cartel
                        @else
                        {{ $uni->projects->modality }}
                        @endif
                    </p>
                </div>
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Eje tematico:</strong>
                        <br>
                        @if($uni->projects->thematic_area == 'U')
                        Nivel Universitario por área.(Cálculo, Algebra, Geometría Analitca, Algebra Lineal, etc.)
                        @elseif( $uni->projects->thematic_area == 'P')
                        Nivel Preuniversitario.(Bachillerato.)
                        @elseif( $uni->projects->thematic_area == 'B')
                        Nivel Básico.(Primaria o secundaria.)
                        @elseif( $uni->projects->thematic_area == 'STEM')
                        Ciencia, Tecnológia, Ingenieria y Matemáticas (STEM).
                        @else
                        {{ $uni->projects->modality }}
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
                    <p><strong>Institución de procedencia:</strong><br> {{ $uni->projects->sending_institution }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 my-2">
            <div class="row justify-content-md-center">
                <div class="col-md-12 col-sm-12 text-center mb-3">
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
        <script>
            var navbar = document.querySelector('#evaluaciones');
            navbar.className = "mdl-layout__tab is-active";
        </script>
        <div class="col-md-12 col-sm-12 my-2 text-center">
            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</div>
@endsection