<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/material.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">
<link rel="shortcut icon" href="{{asset('/img/logo_negativo.png')}}" />
<style>
    body {
        background-image: url("../img/cinestav_fondo.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>
<div class="container d-flex justify-content-center align-items-center card">
    <form action="{{ route('registrar')}}" method="post" class="row card-body">
        @csrf
        <h3 class="my-2">Registro Postulante</h3>
        <div class="alert alert-info" role="alert">
            Tenga en cuenta que los datos proporcionados en el siguiente formulario seran utilizados para la creación de la constancia u otros elementos de asistencia al evento, de igual forma, los datos proporcionados seran subrayados como el <strong>ponente</strong>. Al correo que se especifique en el campo de "Correo Electrónico" sera el <strong>autor de contacto</strong>, favor de verificar los datos antes de enviar la información de registro.
        </div>
        <div class="col-12 mx-5">
            <h4>~ Datos Personales ~</h4>
        </div>
        <div class="col-4">
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
        <div class="col-4">
            <div class="mb-3">
                <label for="app" class="form-label">Apellido Paterno:</label> <label for="app" class="text-danger">*</label>
                <input type="text" class="form-control" name="app" id="app" placeholder="Ingrese su Apellido Paterno" value="{{ old('app') }}">
            </div>
            @error('app')
            <label class="form-check-label text-danger" for="flexRadioDefault1">
                {{ $message }}
            </label>
            <br>
            @enderror
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="apm" class="form-label">Apellido Materno:</label>
                <input type="text" class="form-control" name="apm" id="apm" placeholder="Ingrese su Apellido Materno" value="{{ old('apm') }}">
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
                <label for="tel" class="form-label">Grado Academico:</label> <label for="tel" class="text-danger">*</label>
                <input type="text" class="form-control" name="academic_degree" id="academic_degree" placeholder="Ingrese su grado academico" value="{{ old('academic_degree') }}">
            </div>
            <div class="col-12">
                <div class="mb-3 my-2">
                    <label for="tel" class="form-label">Foto del ponente:</label> <label for="tel" class="text-danger">*</label>
                    <input class="form-control @error('foto') is-invalid @enderror" type="file" accept="image/*" name="foto" oninput="autoFill()" id="input1">
                    <input type="hidden" class="form-control" aria-label="First name" name="foto_name" id="input2" readonly>
                    <div class="form-text" id="foto-addon">(Favor de seleccionar el archivo que desea cargar. Tipo de archivo jpeg | jpg | png, no mayor a 2MB)</div>
                </div>
                @error('foto')
                <label class="form-check-label text-danger" for="flexRadioDefault1">
                    {{ $message }}
                </label>
                <br>
                @enderror
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico:</label> <label for="email" class="text-danger">*</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="nombre@ejemplo.com" value="{{ old('email') }}">
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
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Ingrese una contraseña">
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
                    <label for="tel" class="form-label">Pais/Country:</label> <label for="tel" class="text-danger">*</label>
                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" placeholder="Ingrese su país/country" value="{{ old('country') }}">
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
                        <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" placeholder="Ingrese su Estado/Estate" value="{{ old('state') }}">
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
                        <input type="text" class="form-control @error('municipality') is-invalid @enderror" id="municipality" name="municipality" placeholder="Ingrese su Municipio/municipality" value="{{ old('municipality') }}">
                        @error('municipality')
                        <label class="form-check-label text-danger" for="flexRadioDefault1">
                            {{ $message }}
                        </label>
                        <br>
                        @enderror
                    </div>
                </div>
                <input type="hidden" value="3" name="role_id" id="role_id">
                <div class="col-12 d-flex justify-content-center align-content-center my-3">
                    <div class="item">
                        <div class="checkbox-rect2">
                            <input class="confirm" type="checkbox" id="checkbox-rect2" value="" name="verify" onclick="checkedBox(this.value)">
                            <label for="checkbox-rect2" class="form-check-label">He revisado los datos proporcionados y certifico que la información capturadas sean correctas y responsabilidad de quien la captura.</label>
                        </div>
                    </div>
                </div>
                <!--CAPTCHA-->
                <div class="col-12 d-flex justify-content-center align-content-center my-3">
                    <div class="form-group">
                        <div class="g-recaptcha" id="captchalogin" data-sitekey="6LcSYHcnAAAAAKKbYvQhXhQtN3evu7yxowlNSW04" data-callback='onSubmit' data-action='submit'></div>
                    </div>
                </div>
                @error('g-recaptcha-response')
                <div class="col-12 d-flex justify-content-center align-content-center">
                    <label class="form-check-label text-danger" for="flexRadioDefault1">
                        {{ $message }}
                    </label>
                </div>
            </div>
            <div class="col-6 text-center mt-3">
                <a href="{{ route('usuario.index') }}" type="button" class="btn btn-secondary">Regresar</a>
            </div>
            <div class="col-6 text-center mt-3">
                <button type="submit" class="btn btn-success disabled" id="btnRegistro">Enviar</button>
            </div>
        </div>
    </form>
</div>

<script>
    var checkBox = document.querySelector("#confirm");
    var btnEnviar = document.querySelector("#btnRegistro");

        checkBox[0].value = 1;
        checkedBox = (val) => {
            if (val == 1) {
                btnEnviar.className = "btn btn-success";
                checkBox[0].value = 0;
            } else if (val == 0) {
                btnEnviar.className = "btn btn-success disabled";
                checkBox[0].value = 1;
            } else {

            }
        }
    </script>
</body>

</html>