<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>| Inicio Sesión</title>
    <link rel="shortcut icon" href="{{asset('/img/logo_negativo.png')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/sesiones.css') }}">
</head>

<body>
    <div class="contenedor shadow">
        <div class="log row m-2 align-items-strech">
            <div class="col bg d-none d-lg-block col-md-6 col-lg-6 col-xl-6 rounded"><!-Imagen></div>

            <div class="col">
                <!-- Sesion -->
                <div class="text-end">
                    <img src="{{asset('img/logotipoutvt.png')}}" width="200px" alt="">
                </div><!-- Logo -->

                <h2 class="fw-bold text-center pb-3">Inicia Sesión</h2><!-- Form de Inicio de Sesion -->

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="mb-4">
                        <label for="email" class="form-label">&nbsp;<i class="fa-solid fa-envelope"></i> Correo Electrónico:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}" placeholder="Correo" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">&nbsp;<i class="fa-sharp fa-solid fa-key"></i>Contraseña:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Contraseña" required>
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <a href="{{route('forgotpass')}}" class="forgot-pass">Olvide mi contraseña</a>
                        </div>
                    </div>
                    <div class="d-grid mt-2">
                        <button type="submit" class="btn btn-outline-primary">Iniciar Sesión</button>
                    </div>
                    <p class="sign-up mt-3">No tienes una cuenta?<a href="{{route('register')}}"> Registrate</a></p>
                </form>