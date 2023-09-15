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
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("captchalogin").submit();
        }
    </script>
</head>

<body>
    <div class="contenedor shadow">
        <div class="log row m-2 align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-6 col-lg-6 col-xl-6 rounded"><!-- Imagen --></div>

            <div class="col">
                <!-- Sesión -->
                <div class="text-end">
                    <img src="{{asset('img/logotipoutvt.png')}}" width="200px" alt="">
                </div><!-- Logo -->

                <h2 class="fw-bold text-center pb-3">Inicia Sesión</h2><!-- Formulario de Inicio de Sesión -->

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    @error('email')
                    <div class="mb-4 text-center">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                    @enderror
                    @error('g-recaptcha-response')
                    <div class="mb-4 text-center">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="mb-4">
                        <label for="email" class="form-label">&nbsp;<i class="fa-solid fa-envelope"></i> Correo Electrónico:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}" placeholder="Correo" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">&nbsp;<i class="fa-sharp fa-solid fa-key"></i> Contraseña:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Contraseña" required>
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <!-- CAPTCHA -->
                    <div class="form-group">
                        <div class="g-recaptcha" id="captchalogin" data-sitekey="6LcSYHcnAAAAAKKbYvQhXhQtN3evu7yxowlNSW04" data-callback='onSubmit' data-action='submit'></div>
                    </div>
                    <div class="d-grid mt-2">
                        <button id="botonLogin" type="submit" class="btn btn-outline-primary">Iniciar Sesión</button>
                    </div>
                </form>
                <div class="form-group text-center mt-3">
                    <a href="{{route('forgotpass')}}">Olvidé mi contraseña</a>
                </div>
                <div class="col-12 row">
                    <div class="col-6">
                        <p class="text-center mt-3">
                            ¿No tienes una cuenta?
                        </p>
                    </div>
                    <div class="col-6 text-center mt-3">
                        <a href="{{route('register')}}" class="btn btn-outline-primary">Regístrate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const captchaLoginButton = document.querySelector('#botonLogin');
            let submitting = false;

            captchaLoginButton.addEventListener('click', function(event) {
                if (document.querySelector('#email').value != "" && document.querySelector('#password').value != "") {
                    if (!submitting) {
                        submitting = true;
                        captchaLoginButton.className = "btn btn-outline-primary disabled";
                        captchaLoginButton.innerHTML = 'Iniciando sesión...';
                    } else {
                        event.preventDefault(); // Evita el envío del formulario si ya está deshabilitado
                    }
                } else {

                }
            });
        });
    </script>
</body>

</html>