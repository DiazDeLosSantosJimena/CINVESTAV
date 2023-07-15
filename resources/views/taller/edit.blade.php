@extends('layout.navbar')
@section('title', 'Editar Taller')
@section('content')

<div class="container">
    <div class="row">
        <div class="col mx-5">
            <h3>Editar</h4>
        </div>
        <div class="col-12">
            <form action="{{url('taller/' .$workshop->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <label> Nombre:</label>
                <input class="form-control" type="text" name="name" id="name" value="{{$workshop->name}}">

                <label> Actividad:</label>
                <input class="form-control" type="text" name="activity" id="activity" value="{{$workshop->activity}}">

                <label for=""> Fecha:</label>
                <input class="form-control" type="date" id="date" name="date" value="{{$workshop->date}}">

                <label for=""> Hora:</label>
                <input class="form-control" type="time" id="hour" name="hour" value="{{$workshop->hour}}">

                <label for=""> Sitio:</label>
                <input class="form-control" type="text" id="site" name="site" value="{{$workshop->site}}">
                <div class="mb-3">
                    <div class="form-check form-switch">
                        @if($workshop -> status > 0)
                        <input class="form-check-input" type="checkbox" role="switch" name="status" checked>
                        @else
                        <input class="form-check-input" type="checkbox" role="switch" name="status">
                        @endif
                        <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                    </div>
                </div>
                <div class="row">
                    <a class="btn btn-danger m-3" href="/taller">Cancelar</a>
                    <button type="submit" class="btn btn-primary m-3" value="update">Guadar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var navbar = document.querySelector('#taller');
    navbar.className = "mdl-layout__tab is-active";
</script>
@endsection