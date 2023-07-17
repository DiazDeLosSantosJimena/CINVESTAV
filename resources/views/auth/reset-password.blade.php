<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Enlace a hojas de estilo CSS externas -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">

    <!-- Enlace a scripts JavaScript externos -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <!-- Enlace a hojas de estilo CSS locales -->
    <link rel="stylesheet" href="{{ asset('css/Sesiones.css') }}">

    <!-- Enlace a hojas de estilos CSS de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Carga de script JavaScript local -->
    <script src="{{ asset('js/reset.js') }}"></script>

    <title>Recuperacion de Contraseña</title>
</head>
<body>
    <div class="mb5 alert">
        <!-- Comprobación de variables de sesión y visualización de alertas -->
        @if($Alerta = Session::get('Correo'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Alerta!</strong> {{$Alerta}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif($Alerta = Session::get('Error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{$Alerta}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    
    <div class="contenedor rounded shadow">
        <div class="text-end">
            <img src="{{asset('logos/logotipoutvt.png')}}" width="200px" alt="">
        </div> <!-- Cierre de la etiqueta del logo -->
        
        <!-- Columna central -->
        <h2 class="text-center pb-3">Restablece tu Contraseña</h2>

        <div class="in">
            <!-- Formulario de recuperación de contraseña -->
            <form id="recuperar" action="" method="GET">
                @csrf <!-- Protección CSRF -->
                
                <input type="hidden" value="{{$id}}" name="id" id="">
                
                <label for="pass" class="form-label">&nbsp; <i class="fa-sharp fa-solid fa-key"></i> Rellena los campos:</label>
                <ul>
                    <li>Ingresa la nueva contraseña.</li>
                    <div class="input-group mb-3">
                        <input type="password" name="pass1" id="password" class="form-control" placeholder="Nueva Contraseña" pattern="(?=.*\d)(?=.*[!@#$%^&*]).{8,}" title="La contraseña debe tener al menos 8 caracteres, 1 número y 1 carácter especial">
                        <button class="btn btn-secondary" onclick="mostrarContrasena()" type="button" id="button-addon2">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    
                    <li>Verifica la contraseña.</li>
                    <div class="input-group mb-3">
                        <input type="password" name="pass2" id="password2" class="form-control" placeholder="Nueva Contraseña" pattern="(?=.*\d)(?=.*[!@#$%^&*]).{8,}" title="La contraseña debe tener al menos 8 caracteres, 1 número y 1 carácter especial">
                        <button class="btn btn-secondary" onclick="mostrarContrasena2()" type="button" id="button-addon2">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </ul>
                
                <div class="boton mb-3 pt-6">
                    <button class="btn btn-success" id="sub" type="submit">Reestablecer</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
