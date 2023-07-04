<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home LogIn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/sesiones.css') }}">
</head>
<body>
    <div class="contenedor shadow">
        <div class="log row m-2 align-items-strech">
            <div class="col">
                <!-- Sesion -->
                <div class="text-end">
                    <img src="{{asset('img/logotipoutvt.png')}}" width="200px" alt="">
                </div><!-- Logo -->

                <h2 class="fw-bold text-center pb-3">Registrate</h2><!-- Form de Inicio de Sesion -->
                
                <form action="" method="POST">
                    @csrf
                        
                </form>
            </div>

            <div class="col bg d-none d-lg-block col-md-6 col-lg-6 col-xl-6 rounded"><!-Imagen></div>
        </div>
    </div>
</body>
</html>
