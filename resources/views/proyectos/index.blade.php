@extends('layout.navbar')
@section('title', 'Proyectos')
@section('content')
<div class="container">
    <div class="row">
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Excelente!</strong> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="col mdl-cell--hide-tablet mx-5">
            <h2>Proyectos</h2>
        </div>
        <div class="col mdl-cell--hide-desktop mdl-cell--hide-phone mx-5">
            <h2>Proyectos</h2>
        </div>
        @if(Auth::user()->rol_id === 3)
        <div class="col mdl-cell--hide-desktop text-end mt-4">
            <a class="btn btn-info rounded-5" href="{{ route('proyectos.create') }}" style="color: white;"><i class="material-icons mt-1" role="presentation">add</i></a>
        </div>
        @endif
        <div class="col-12 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th class="text-center" scope="col">Nombre del Proyecto</th>
                        <th scope="col" class="text-center">Modalidad de participación</th>
                        <th scope="col" class="text-center">Eje Tematico</th>
                        @if(Auth::user()->rol_id !== 3)
                        <th class="text-center">User</th>
                        @endif
                        <th scope="col" class="text-center">Estatus</th>
                        <th scope="col" class="text-center" colspan="5">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proyectos as $prop)
                    <tr class="align-middle">
                        <td>{{ $loop->index + 1 }}</td>
                        <td class="text-center">{{ $prop->projects->title }}</td>
                        <td class="text-center">
                            @if($prop->projects->modality == 'P')
                            Ponencia
                            @elseif( $prop->projects->modality == 'C')
                            Cartel
                            @else
                            {{ $prop->projects->modality }}
                            @endif
                        </td>
                        <td class="text-center">
                            <small>
                                @if($prop->projects->thematic_area == 'U')
                                Nivel Universitario por área.(Cálculo, Algebra, Geometría Analitca, Algebra Lineal, etc.)
                                @elseif( $prop->projects->thematic_area == 'P')
                                Nivel Preuniversitario.(Bachillerato.)
                                @elseif( $prop->projects->thematic_area == 'B')
                                Nivel Básico.(Primaria o secundaria.)
                                @elseif( $prop->projects->thematic_area == 'STEM')
                                Ciencia, Tecnológia, Ingenieria y Matemáticas (STEM).
                                @else
                                {{ $prop->projects->modality }}
                                @endif
                            </small>
                        </td>
                        @if(Auth::user()->rol_id !== 3)
                        <td class="text-center">{{ $prop->user->name .' '.$prop->user->email }}</td>
                        @endif
                        <td class="text-center">
                            @if($prop->projects->status === 1)
                            <span class="badge text-white text-bg-warning">Pendiente</span>
                            @elseif($prop->projects->status === 2)
                            <span class="badge text-white text-bg-success">Aceptado</span>
                            @else
                            <span class="badge text-white text-bg-danger">Rechazado</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('proyectos.show', $prop->id) }}" class="btn btn-primary">
                                <i class="bi bi-info-circle-fill"></i>
                            </a>
                        </td>
                        @if(Auth::user()->id === $prop->user_id)
                        <td class="text-center">
                            <a href="{{ route('proyectos.edit', $prop->id) }}" class="btn btn-info text-white">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('pdf')}}" class="btn btn-danger text-white">
                                <i class="bi bi-filetype-pdf"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $prop->projects->id }}">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </td>
                        <td id="pago{{ $prop->projects->id }}">
                            <a href="{{ route('proyectos.pagoView', $prop->projects->id) }}" class="btn btn-warning">Pago <i class="bi bi-card-heading"></i></a>
                        </td>
                        @endif
                        @if(Auth::user()->rol_id == 1)
                        <td class="text-center" id="pago{{ $prop->projects->id }}">
                            <a href="{{ route('proyectos.verifyProject', $prop->projects->id) }}" class="btn btn-warning"><i class="bi bi-check-square-fill text-white"></i></a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@section('modales')
@foreach($modales as $prop)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $prop->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Esta a punto de eliminar el registro: <br> <strong>{{ $prop->title }}</strong> <br> ¿Desea continuar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <form action="{{ route('proyectos.delete', $prop->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection


<script>
    var navbar = document.querySelector('#proyectos');
    navbar.className = "mdl-layout__tab is-active";
    var add = document.querySelector('#add');
    add.className = "mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent";

    @foreach($proyectos2 as $prop)
    @if($prop -> archive == 3)
    
    var btnPago = document.querySelector('#pago{{ $prop->id }}');
    var accion = document.querySelector('#acciones');
    btnPago.style.display = "none";

    @endif
    @endforeach
</script>

@endsection