<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Registro Público General</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{asset('/img/logo_negativo.png')}}" />
    <style>
        body {
            background-image: url("../img/cinestav_fondo.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center card">
        <form action="{{ route('registrar')}}" method="post" class="row card-body">
            @csrf
            <h3 class="my-2">Registro público general</h3>
            <div class="alert alert-info" role="alert">
                Tenga en cuenta que los datos proporcionados en el siguiente formulario serán utilizados para la creación de la constancia u otros elementos de asistencia al evento, toda información será enviada al correo que se especifique en el campo de "Correo Electrónico", favor de verificar los datos antes de enviar la información de registro.
            </div>
            <div class="col-12 mx-5">
                <h4>~ Datos personales ~</h4>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label> <label for="nombre" class="text-danger">*</label>
                    <input type="text" class="form-control" name="name" id="nombre" placeholder="Ingrese su nombre" value="{{ old('name') }}">
                </div>
                @error('name')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                <br>
                @enderror
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="mb-3">
                    <label for="app" class="form-label">Apellido paterno:</label> <label for="app" class="text-danger">*</label>
                    <input type="text" class="form-control" name="apm" id="app" placeholder="Ingrese su Apellido Paterno" value="{{ old('app') }}">
                </div>
                @error('app')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                <br>
                @enderror
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="mb-3">
                    <label for="apm" class="form-label">Apellido materno:</label>
                    <input type="text" class="form-control" name="app" id="app" placeholder="Ingrese su Apellido Materno" value="{{ old('apm') }}">
                </div>
                @error('apm')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                <br>
                @enderror
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="tel" class="form-label">Teléfono:</label> <label for="tel" class="text-danger">*</label>
                    <input type="text" class="form-control" name="phone" id="tel" placeholder="Ingrese su número de teléfono" value="{{ old('phone') }}">
                </div>
                @error('phone')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                <br>
                @enderror
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="tel" class="form-label">Grado académico:</label> <label for="tel" class="text-danger">*</label>
                    <input type="text" class="form-control" name="academic_degree" id="academic_degree" placeholder="Ingrese su grado academico" value="{{ old('academic_degree') }}">
                </div>
                @error('academic_degree')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                <br>
                @enderror
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico:</label> <label for="email" class="text-danger">*</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="nombre@ejemplo.com" value="{{ old('email') }}">
                </div>
                @error('email')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                <br>
                @enderror
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label> <label for="nombre" class="text-danger">*</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese una contraseña">
                </div>
                @error('password')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                <br>
                @enderror
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="confirmPass" class="form-label">Confirmar contraseña:</label> <label for="nombre" class="text-danger">*</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirme la contraseña anterior">
                </div>
            </div>
            <div class="col-12 mx-5">
                <h4>~ Dirección ~</h4>
            </div>
            <div class="col-12 row">
                <div class="col-sm-12 col-md-4 mb-3">
                    <label for="tel" class="form-label">País/Country:</label> <label for="tel" class="text-danger">*</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Ingrese su país/country" value="{{ old('country') }}">
                    @error('country')
                    <label class="form-check-label text-danger" for="flexRadioDefault1">
                        {{ $message }}
                    </label>
                    <br>
                    @enderror
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                        <label for="tel" class="form-label">Estado/State:</label> <label for="tel" class="text-danger">*</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Ingrese su Estado/Estate" value="{{ old('state') }}">
                        @error('state')
                        <label class="form-check-label text-danger" for="flexRadioDefault1">
                            {{ $message }}
                        </label>
                        <br>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                        <label for="tel" class="form-label">Municipio/municipality:</label> <label for="tel" class="text-danger">*</label>
                        <input type="text" class="form-control" id="municipality" name="municipality" placeholder="Ingrese su Municipio/municipality" value="{{ old('municipality') }}">
                        @error('municipality')
                        <label class="form-check-label text-danger" for="flexRadioDefault1">
                            {{ $message }}
                        </label>
                        <br>
                        @enderror
                    </div>
                </div>
                <input type="hidden" value="4" name="role_id" id="role_id">
                <div class="col-12 d-flex justify-content-center align-content-center my-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="p" name="assistance" id="confirm">
                        <label class="form-check-label" for="flexCheckDefault">
                            He revisado los datos proporcionados y certifico que la información capturada sean correctas y responsabilidad de quien la captura.
                        </label>
                    </div>
                </div>
                <div class="col-6 text-center mt-3">
                    <a href="{{ route('register') }}" type="button" class="btn btn-secondary">Regresar</a>
                </div>
                <div class="col-6 text-center mt-3">
                    <button type="submit" class="btn btn-success disabled" id="btnRegistro">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        var checkBox = document.querySelector("#confirm");
        var btnEnviar = document.querySelector("#btnRegistro");

        checkBox.addEventListener('click', () => {
            if (checkBox.checked) {
                btnEnviar.className = "btn btn-success";
            } else {
                btnEnviar.className = "btn btn-success disabled";
            }
        });
    </script>
</body>

</html>