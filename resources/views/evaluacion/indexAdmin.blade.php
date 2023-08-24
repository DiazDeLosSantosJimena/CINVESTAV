@extends('layout.navbar')
@section('title','Evaluaciones')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mx-5">
            <h3>Evaluaciones</h4>
        </div>
        <div class="col-12 mx-5 mt-2">
            <h5>Evaluaciones realizadas</h5>
        </div>
        <div class="col-12 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th class="text-center" scope="col">Nombre del Proyecto</th>
                        <th scope="col" class="text-center">Modalidad de participación</th>
                        <th scope="col" class="text-center">Eje Tematico</th>
                        <th scope="col" class="text-center">Evaluador</th>
                        <th scope="col" class="text-center">Estatus</th>
                        <th scope="col" class="text-center" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($proyectos as $p)
                    <tr>
                        <td class="text-center">{{$loop -> index + 1}}</td>
                        <td class="text-center">{{$p->title}}</td>
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
                                @elseif( $p->thematic_area == 'HM')
                                Historia de las Matemáticas
                                @else
                                {{ $p->thematic_area }}
                                @endif
                            </small>
                        </td>
                        <td class="text-center">{{$p->email}}</td>
                        <td class="text-center"><span class="badge text-white @if($p->status) text-bg-success @else text-bg-danger @endif">@if($p->status) Calificado @else Sin revisión @endif</span></td>
                        <th class="text-center" scope="row"><a type="button" class="btn btn-primary" href="{{ route('evaluacion.edit', $p->id_evaluar) }}" style="background-color: #0178a0;"><i class="bi bi-eye-fill"></i></a></th>{{-- {{ route('proyectos.edit', $prop->id) }} --}}
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