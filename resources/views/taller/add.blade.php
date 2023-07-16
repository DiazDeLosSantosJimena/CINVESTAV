@extends('layout.navbar')
@section('title', 'Agregar Taller')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h4></h4>
        </div>
        <div class="col-12">
            <form action="{{ url('taller') }}" method="post">
            {!! csrf_field() !!}

            <label for=""> Nombre:</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name')}}">
            @error('name')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
            <label for=""> Actividad:</label>
            <input class="form-control @error('activity') is-invalid @enderror" type="text" id="activity" name="activity" value="{{old('activity')}}">
            @error('activity')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
            <label for=""> Fecha:</label>
            <input class="form-control" type="date" id="date" name="date" value="{{old('date')}}">
            @error('date')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
            <label for=""> Hora:</label>
            <input class="form-control" type="time" id="hour" name="hour" value="{{old('hour')}}">
            @error('hour')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
            <label for=""> Sitio:</label>
            <input class="form-control" type="text" id="site" name="site" value="{{old('site')}}">
            @error('site')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
            <div class="row">
                <a class="btn btn-danger m-3" href="{{ route('taller.index') }}">Cancelar</a>
                <button type="submit" class="btn btn-primary m-3" value="save">Guadar</button>

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