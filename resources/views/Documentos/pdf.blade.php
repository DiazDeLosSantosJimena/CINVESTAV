<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
<style>
        .image-right {
            float: right;
            margin-right: 10px; 
        }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/navbar.css">
    <div class="container">
        <br>
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/img/gobierno.png'))) }}" height="40px">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/img/eical.png'))) }}" height="40px" class="image-center">
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/img/utvt.png'))) }}" height="40px" class="image-right">
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/img/EdoMex.png'))) }}" height="30px" class="image-right">


    </div>

</head>
<body>
      <section class="container my-6">
        <section class="row">
            <section class="col my-3">
                <h3 class="text-center">Proyectos</h3>
            </section>
        </section>
        <b>Fecha: @php echo date('d/m/Y'); @endphp</b>
    </section>
    <br>
    <center>
<div class="col-11">
<table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th class="text-center" scope="col">Nombre del Proyecto</th>
                        <th scope="col">Descripción</th>
                        <th class="text-center" scope="col">Rama</th>
                        @if(Auth::user()->role_id !== 3)
                        <th>User</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($proyectos as $prop) --}}
                    <tr class="align-middle">
                        <td></td>
                        <td class="text-center"></td>
                        <td></td>
                        <td class="text-center"></td>
                        {{-- @if(Auth::user()->role_id !== 3) --}}
                        <td></td>
                        {{-- @endif --}}

                    {{-- @endforeach --}}
                    </tbody>
            </table>
    </div>
</center>

<footer class="pie-pagina">
<div class="container">
    <img src="img/derecha.png" alt="Logos de los participantes" width="300">
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/img/izquierda.png'))) }}" height="85px">
</div>
</footer>

</body>

</html>