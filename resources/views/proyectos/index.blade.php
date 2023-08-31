@extends('layout.navbar')
@section('title', 'Proyectos')
@section('estilos')
<style>
     /* checkbox-rect2 */
     .checkbox-rect2 input[type="checkbox"] {
            display: none;
        }

        .checkbox-rect2 input[type="checkbox"]+label {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 20px;
            font: 14px/20px "Open Sans", Arial, sans-serif;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        .checkbox-rect2 input[type="checkbox"]:hover+label:hover {
            color: rgb(23, 86, 228);
        }

        .checkbox-rect2 input[type="checkbox"]:hover+label:before {
            border: 1px solid #343a3f;
            box-shadow: 2px 1px 0 #343a3f;
        }

        .checkbox-rect2 input[type="checkbox"]+label:last-child {
            margin-bottom: 0;
        }

        .checkbox-rect2 input[type="checkbox"]+label:before {
            content: "";
            display: block;
            width: 1.7em;
            height: 1.7em;
            border: 1px solid #343a3f;
            border-radius: 0.2em;
            position: absolute;
            left: 0;
            top: 0;
            -webkit-transition: all 0.2s, background 0.2s ease-in-out;
            transition: all 0.2s, background 0.2s ease-in-out;
            background: rgba(255, 255, 255, 0.03);
            box-shadow: -2px -1px 0 #343a3f;
            background: #f3f3f3;
        }

        .checkbox-rect2 input[type="checkbox"]:checked+label:before {
            content: "\2713";
            border: 2px solid #fff;
            border-radius: 0.3em;
            background: #0078a1;
            box-shadow: 2px 1px 0 #50565a;
            display: flex;
            justify-content: center;
            align-content: center;
            margin-bottom: auto;
            color: #fff;
            width: 1.7em;
            height: 1.7em;
        }

        /* checkbox-rect2 end */
</style>
@endsection
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
            <h2>Ponencias Registradas</h2>
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
                        <th class="text-center" scope="col">Nombre de la Ponencia</th>
                        <th scope="col" class="text-center">Modalidad de participación</th>
                        <th scope="col" class="text-center">Eje Tematico</th>
                        @if(Auth::user()->rol_id !== 3)
                        <th class="text-center">User</th>
                        @endif
                        <th scope="col" class="text-center">Estado del proyecto</th>
                        @if(Auth::user()->rol_id === 1)
                        <th scope="col" class="text-center">Estado de Pago</th>
                        @endif
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
                                @elseif( $prop->projects->thematic_area == 'HM')
                                Historia de las Matemáticas
                                @else
                                {{ $prop->projects->thematic_area }}
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
                            <span class="badge text-white text-bg-info">Proceso de evaluación</span>
                            @elseif($prop->projects->status >= 3)
                            <span class="badge text-white text-bg-success">Proyecto Aceptado</span>
                            @else
                            <span class="badge text-white text-bg-danger">Rechazado</span>
                            @endif
                        </td>
                        @if(Auth::user()->rol_id === 1)
                        <td class="text-center">
                            @if($prop->projects->status > 3)
                            <span class="badge text-white text-bg-success" id="pago{{ $prop->id }}">Realizado</span>
                            @else
                            <span class="badge text-white text-bg-warning" id="pago{{ $prop->id }}">Pendiente</span>
                            @endif
                        </td>
                        @endif
                        <td class="text-center">
                            <a href="{{ route('proyectos.show', $prop->id) }}" class="btn btn-primary">
                                <i class="bi bi-info-circle-fill"></i>
                            </a>
                        </td>
                        @if($prop->projects->status == 3 && Auth::user()->rol_id == 1)
                        <td>
                            <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#formatoPagoModal{{ $prop->projects->id }}">
                                <i class="bi bi-currency-dollar"></i>
                            </button>
                        </td>
                        @endif
                        @if(Auth::user()->id === $prop->user_id)
                            @if($prop->projects->status == 1) <td class="text-center">
                            <a href="{{ route('proyectos.edit', $prop->id) }}" class="btn btn-info text-white">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $prop->projects->id }}">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </td>
                            @endif
                            @if($prop->projects->status === 3)
                            <td class="text-center" id="pago{{ $prop->projects->id }}">
                                <a href="{{ route('proyectos.pagoView', $prop->projects->id) }}" class="btn btn-warning text-white"><i class="bi bi-currency-dollar"></i></a>
                            </td>
                            @endif
                        @endif
                        @if(Auth::user()->rol_id == 1 && $prop->projects->status == 1)
                            <td class="text-center">
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
                <form action="{{ route('proyectos.destroy', $prop->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formatoPagoModal{{ $prop->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Formato de Pago</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Si el proyecto <strong>{{ $prop->title }}</strong> cuenta con el formato de pago correspondiente, porfavor marque la casilla.
                <form action="{{ route('proyectos.statusPago', $prop->id) }}" method="post">
                {{ csrf_field('PATCH') }}
                {{ method_field('PUT') }}
                @error('verify')
                    <div class="col-12 my-2 text-center">
                        <small class="form-text text-danger">{{$message}}</small>
                    </div>
                @enderror
                <div class="col-12 d-flex justify-content-center align-content-center mb-3 mt-3">
                    <div class="item">
                        <div class="checkbox-rect2">
                            <input class="confirm" type="checkbox" id="checkPago{{ $prop->id }}" value="1" name="verify">
                            <label for="checkPago{{ $prop->id }}" class="form-check-label"></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Enviar</button>
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
    @if(Auth::user()->rol_id != 1)
    var add = document.querySelector('#add');
    add.className = "mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent";
    @endif

    @foreach($proyectos2 as $prop)
    @if($prop->archive == 3)

    var estadoPago = document.querySelector("#pago{{ $prop->id }}");
    estadoPago.style.display = "none";

    @endif
    @endforeach
</script>

@endsection