<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | CINESTAV</title>
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
                @if(Auth::user()->rol_id === 3 || Auth::user()->rol_id === 1)
                <a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent mdl-cell--hide-desktop" id="add" href="{{ route('addProyect') }}">
                    <i class="material-icons" role="presentation">add</i>
                    <span class="visuallyhidden">Add</span>
                </a>
                <a href="{{ route('proyectos.index') }}" class="mdl-layout__tab" id="proyectos">Proyectos</a>
                @endif
                @if(Auth::user()->rol_id === 2 || Auth::user()->rol_id === 1)
                <a href="{{ route('evaluacion') }}" class="mdl-layout__tab" id="evaluaciones">Evaluación</a>
                @endif
                <a href="{{ route('registro') }}" class="mdl-layout__tab" id="registro">Registrarse</a>
                <a href="{{ route('perfil') }}" class="mdl-layout__tab" id="perfil">Perfíl</a>
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
                        <div class="col-4" style="text-align: end;">
                            <img src="{{ asset('img/logo_estado.png') }}" class="img-fluid" alt="Encuentro" width="160px">
                        </div>
                        <div class="col-4 text-center">
                            <img src="{{ asset('img/logo_negativo.png') }}" class="img-fluid" alt="Encuentro" width="150px">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('img/logotipoutvt.png') }}" class="img-fluid" alt="UTVT" width="250px">
                        </div>
                    </div>
                    <div class="col-12 text-center my-5">
                        Preguntas/Comentarios: correo@gmail.com
                    </div>
                </div>
            </footer>
        </main>
    </div>
</body>

</html>