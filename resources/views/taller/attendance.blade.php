@extends('layout.navbar')
@section('title','Actividades')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mx-5">
            <h3>Actividades</h4>
        </div>
        <div class="col-12 table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>Nombre del Taller</th>
                        <th>Tipo de Actividad</th>
                        <th>Horarios</th>
                        <th>Asistencia</th>
                    </tr>
                </thead>
                <tbody class="align-middle text-center">
                    @foreach($work as $info)
                    <tr>
                        <td>{{$info->name}}</td>
                        <td>{{$info->activity}}</td>
                        <td>{{$info->hour}}-{{$info->date}}</td>
                        <td class="text-center" scope="col">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <div class="form-check">
                                    <form action="{{ url('attendance') }}" method="post">
                                        {!! csrf_field() !!}
                                        <input class="form-check-input" type="checkbox" value="{{ $info -> id}}" name="workshop_id[]" id="taller{{ $loop->index + 1 }}" onclick="check('{{ $loop->index + 1 }}')">
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    <div class="text-end mb-5">
                        <button type="submit" class="btn btn-primary disabled m-3" value="save" id="guardarTaller">Guadar</button>
                    </div>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var navbar = document.querySelector('#attendance');
    navbar.className = "mdl-layout__tab is-active";
    var btnGuardar = document.querySelector("#guardarTaller");
    var swi = 0;
    check = (valor) => {
        var checkBox = document.querySelector('#taller' + valor);
        if (checkBox.checked) {
            swi++;
        } else {
            swi--;
        }

        if (swi > 0) {
            btnGuardar.className = "btn btn-primary";
        } else {
            btnGuardar.className = "btn btn-primary disabled";
        }
    }
</script>
@endsection