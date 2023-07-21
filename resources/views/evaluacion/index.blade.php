@extends('layout.navbar')
@section('content')
<div class="container">
    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Excelente!</strong> {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-12 mx-5">
            <h3>Evaluaciones</h4>
        </div>
        <div class="col-12 mx-5 mt-2">
            <h5>Evaluaciones realizadas</h5>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th class="text-center" scope="col">Nombre del Proyecto</th>
                        <th scope="col" class="text-center">Modalidad de participación</th>
                        <th scope="col">Eje Tematico</th>
                        <th scope="col">Usuario</th>
                        <th scope="col" class="text-center">Estatus</th>
                        <th scope="col" class="text-center" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($evaluados as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->title}}</td>
                        <td class="text-center">
                            @if($p->modality == 'P')
                            Ponencia
                            @elseif($p->modality == 'C')
                            Cartel
                            @else
                            {{ $p->modality }}
                            @endif
                        </td>
                        <td class="text-center">
                            <small>
                                @if($p->thematic_area == 'U')
                                Nivel Universitario por área.(Cálculo, Algebra, Geometría Analitca, Algebra Lineal, etc.)
                                @elseif( $p->thematic_area == 'P')
                                Nivel Preuniversitario.(Bachillerato.)
                                @elseif( $p->thematic_area == 'B')
                                Nivel Básico.(Primaria o secundaria.)
                                @elseif( $p->thematic_area == 'STEM')
                                Ciencia, Tecnológia, Ingenieria y Matemáticas (STEM).
                                @else
                                {{ $p->modality }}
                                @endif
                            </small>
                        </td>
                        <td>{{$p->email}}</td>
                        <td class="text-center"><span class="badge text-white text-bg-success">Calificado</span></td>
                        <th class="text-center" scope="row"><a type="button" class="btn btn-primary" href="{{ route('evaluacion.edit', $p->id_evaluar) }}" style="background-color: #0178a0;">Volver a calificar <i class="bi bi-pencil-square"></i></a></th>{{-- {{ route('proyectos.edit', $prop->id) }} --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12 mx-5 mt-5">
            <h5>Evaluaciones por realizar</h5>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <th scope="col">#</th>
                    <th class="text-center" scope="col">Nombre del Proyecto</th>
                    <th scope="col" class="text-center">Modalidad de participación</th>
                    <th scope="col" class="text-center">Eje Tematico</th>
                    <th>Usuario</th>
                    <th scope="col" class="text-center">Estatus</th>
                    <th scope="col" class="text-center" colspan="3">Acciones</th>
                </thead>
                <tbody class="align-middle">
                    @foreach ($proyectos as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->title}}</td>
                        <td class="text-center">
                            @if($p->modality == 'P')
                            Ponencia
                            @elseif($p->modality == 'C')
                            Cartel
                            @else
                            {{ $p->modality }}
                            @endif
                        </td>
                        <td class="text-center">
                            <small>
                                @if($p->thematic_area == 'U')
                                Nivel Universitario por área.(Cálculo, Algebra, Geometría Analitca, Algebra Lineal, etc.)
                                @elseif( $p->thematic_area == 'P')
                                Nivel Preuniversitario.(Bachillerato.)
                                @elseif( $p->thematic_area == 'B')
                                Nivel Básico.(Primaria o secundaria.)
                                @elseif( $p->thematic_area == 'STEM')
                                Ciencia, Tecnológia, Ingenieria y Matemáticas (STEM).
                                @else
                                {{ $p->modality }}
                                @endif
                            </small>
                        </td>
                        <td>{{$p->email}}</td>
                        <td class="text-center"><span class="badge text-white text-bg-danger">Sin Calificar</span></td>
                        <th class="text-center" scope="row"><a type="button" class="btn btn-primary" href="{{ route('evaluacion.show', $p->id_evaluar) }}" style="background-color: #0178a0;">Calificar <i class="bi bi-pencil-square"></i></a></th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var navbar = document.querySelector('#evaluaciones');
    navbar.className = "mdl-layout__tab is-active";
</script>

@endsection