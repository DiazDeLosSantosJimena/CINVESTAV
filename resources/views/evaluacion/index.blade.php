@extends('layout.navbar')
@section('content')
<div class="container">
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
                        <th scope="col">Nombre del Proyecto</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Fecha de la evaluación</th>
                        <th scope="col" class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle">
                        <th class="text-center" scope="row" colspan="4">Proyectos evaluados</th>
                        <th class="text-center" scope="row"><a type="button" class="btn btn-primary" href="addProyect" style="background-color: #0178a0;">Calificar <i class="bi bi-pencil-square"></i></a></th>{{-- {{ route('proyectos.edit', $prop->id) }} --}}
                    </tr>
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
                        <th scope="col">Eje Tematico</th>
                        <th>User</th>
                        <th scope="col" class="text-center">Estatus</th>
                        <th scope="col" class="text-center" colspan="3">Acciones</th>
                </thead>
                <tbody>     
                        @foreach ($proyectos as $p)
                            <tr>
                                <td>{{$p->projects->id}}</td>
                                <td>{{$p->projects->title}}</td>
                                <td>{{$p->projects->modality}}</td>
                                <td>{{$p->projects->thematic_area}}</td>
                                <td>{{$p->user->email}}</td>
                                <td>{{$p->projects->status}}</td>
                                <td>
                                    <th class="text-center" scope="row"><a type="button" class="btn btn-primary" href="{{ route('proyectos.show', $p->id) }}" style="background-color: #0178a0;">Calificar <i class="bi bi-pencil-square"></i></a></th>{{-- {{ route('proyectos.edit', $prop->id) }} --}}
                                </td>
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
