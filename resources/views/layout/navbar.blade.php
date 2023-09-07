<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | CINVESTAV</title>
    @yield('estilos')
    @include('layout.head')
</head>

<body class="mdl-demo mdl-color-text--grey-700 mdl-base">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header mdl-layout__header--scroll portfolio-header">
            <div class="mdl-layout--large-screen-only mdl-layout__header-row">
            </div>
            <div class="mdl-layout--large-screen-only mdl-layout__header-row">
                <img src="{{ asset('img/logo_color.png') }}" style="width: 290px;">
            </div>
            <div class="mdl-layout--large-screen-only mdl-layout__header-row">
            </div>
            <div class="mdl-layout__tab-bar mdl-js-ripple-effect" style="background-color: #2e2e2e;">
                <a href="{{ route('inicio') }}" class="mdl-layout__tab" id="inicio">Inicio</a>
                {{-- @if(Auth::user()->rol_id === 3 || Auth::user()->rol_id === 1) --}}
                @if(Auth::user()->rol_id === 3)
                <a data-bs-toggle="tooltip" data-trigger="manual" data-placement="bottom" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell--hide-desktop" id="add" href="{{ route('proyectos.create') }}">
                    Agregar Ponencia +
                    <!-- <i class="material-icons" role="presentation">add</i> -->
                    <span class="visuallyhidden">Add</span>
                </a>
                @endif
                @if(Auth::user()->rol_id === 3 || Auth::user()->rol_id === 1)
                <a href="{{ route('proyectos.index') }}" class="mdl-layout__tab" id="proyectos">Ponencias</a>
                @endif
                @if(Auth::user()->rol_id === 2 || Auth::user()->rol_id === 1)
                <a href="{{ route('evaluacion.index') }}" class="mdl-layout__tab" id="evaluaciones">Evaluación</a>
                @endif
                @if(Auth::user()->rol_id === 1)
                <a href="{{ route('usuarios') }}" class="mdl-layout__tab" id="usuarios">Usuarios</a>
                <a href="{{ route('taller.index') }}" class="mdl-layout__tab" id="taller">Talleres</a>
                @endif
                @if(Auth::user()->rol_id === 3 || Auth::user()->rol_id === 4 || Auth::user()->rol_id === 1 || Auth::user()->rol_id === 5)
                <a href="@if(Auth::user()->rol_id ==1) {{ route('attendance.index') }} @else # @endif" class="mdl-layout__tab" id="attendance">Actividades</a>
                <!-- <a href="#" class="mdl-layout__tab" id="attendance">Actividades</a> -->
                @endif
                <a href="{{ route('perfil') }}" class="mdl-layout__tab" id="perfil">Perfíl</a>
                <a href="{{ route('encuentro') }}" class="mdl-layout__tab" id="encuentro">Acerca De</a>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="mdl-layout__tab" id="logout" style="background-color: transparent; border: none;">Salir</button>
                </form>
            </div>
        </header>
        <main class="mdl-layout__content">
            <div class="mdl-layout__tab-panel is-active">
                @yield('content')
            </div>
            <footer class="mdl-mega-footer mt-5">
                <div class="container my-5">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 my-3 text-center">
                            <a href="{{ route('encuentro') }}"><img src="{{ asset('img/logo_negativo.png') }}" class="img-fluid" alt="Encuentro" width="150px"></a>
                        </div>
                        <hr>
                        <div class="col-sm-12 col-md-4 mt-3 text-center">
                            <img src="{{ asset('img/logo_estado.png') }}" class="img-fluid" alt="Encuentro" width="160px">
                        </div>
                        <div class="col-sm-12 col-md-4 mt-3 text-center">
                            <img src="{{ asset('img/LogoCinvestavBlancoLargo.png') }}" class="img-fluid" alt="UTVT" width="160px">
                        </div>
                        <div class="col-sm-12 col-md-4 mt-3 text-center">
                            <img src="{{ asset('img/logotipoutvtBlanco.png') }}" class="img-fluid" alt="UTVT" width="250px">
                        </div>
                    </div>
                </div>
            </footer>
        </main>
    </div>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>

@yield('modales')

</html>