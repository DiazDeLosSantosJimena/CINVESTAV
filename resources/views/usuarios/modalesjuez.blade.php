@yield('modalesjuez')
<!-- ADD MODAL START -->
<div class="modal fade" id="modalalta" tabindex="-1" aria-labelledby="modalaltaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Evaluadores</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('agregarjuez') }}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row py-2">
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" name="app" value="{{ old('app') }}">
                            @error('app')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 mb-1">
                            <label for="exampleInputEmail1" class="form-label">Apellido Materno:</label>
                            <input type="text" class="form-control" name="apm" value="{{ old('apm') }}">
                            @error('apm')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleInputEmail1" class="form-label">Grado Academico:</label>
                            <input type="text" class="form-control" name="alternative_contact" value="{{ old('alternative_contact') }}">
                            @error('alternative_contact')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" name="phone" placeholder="000-000-0000" value="{{ old('phone') }}">
                            @error('phone')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="correo@ejemplo.com" value="{{ old('email') }}">
                            @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 text-center my-3">
                            <button class="btn btn-success" onclick="generatePassword()">Generar Contraseña</button>
                        </div>
                        @error('password')
                        <div class="col-12 text-end">
                            <label class="form-check-label @error('password') text-danger @enderror text-secondary">
                                {{ $message }}
                            </label>
                        </div>
                        @enderror
                        <div class="col-12 my-3">
                            <label class="form-check-label text-secondary" id="labelPass">
                                Contraseña generada:
                            </label>
                        </div>
                        <input class="form-control" type="hidden" value="" id="passwordGenerate" name="password" readonly>
                        <hr>
                        <div class="col-4 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Pais:</label>
                            <input type="text" class="form-control" name="country" value="{{ old('country') }}">
                            @error('country')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Estado:</label>
                            <input type="text" class="form-control" name="state" value="{{ old('state') }}">
                            @error('state')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Municipio:</label>
                            <input type="text" class="form-control" name="municipality" value="{{ old('municipality') }}">
                            @error('municipality')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <input type="submit" href="{{ route('agregarjuez') }}" class="btn btn-success" value="Enviar" />
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ADD MODAL END -->

<!-- ADD Special Invit MODAL START -->
<div class="modal fade" id="modalaltaPublicE" tabindex="-1" aria-labelledby="modalaltaPublicELabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Invitados Especiales</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('agregarInvitado') }}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row py-2">
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nameE" value="{{ old('nameE') }}">
                            @error('nameE')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" name="appE" value="{{ old('appE') }}">
                            @error('appE')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 mb-1">
                            <label for="exampleInputEmail1" class="form-label">Apellido Materno:</label>
                            <input type="text" class="form-control" name="apmE" value="{{ old('apmE') }}">
                            @error('apmE')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleInputEmail1" class="form-label">Grado Academico:</label>
                            <input type="text" class="form-control" name="alternative_contact" value="{{ old('alternative_contact') }}">
                            @error('alternative_contact')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" name="phoneE" placeholder="000-000-000" value="{{ old('phoneE') }}">
                            @error('phoneE')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="correo@ejemplo.com" value="{{ old('email') }}">
                            @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Pais:</label>
                            <input type="text" class="form-control" name="countryE" value="{{ old('countryE') }}">
                            @error('countryE')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Estado:</label>
                            <input type="text" class="form-control" name="stateE" value="{{ old('stateE') }}">
                            @error('stateE')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Municipio:</label>
                            <input type="text" class="form-control" name="municipalityE" value="{{ old('municipalityE') }}">
                            @error('municipalityE')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <small>
                                <label for="" class="form-check-label text-secondary">
                                    Una vez registrado el invitado se le enviará un correo de invitación.
                                </label>
                            </small>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <input type="submit" href="{{ route('agregarjuez') }}" class="btn btn-success" value="Enviar" />
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ADD Special Invit MODAL END -->

<!-- EDIT MODAL START -->
@foreach ($usuarios as $usuario)
<div class="modal fade" id="exampleModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registro Evaluador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('salvarjuez', ['id' => $usuario->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field('PATCH') }}
                    {{ method_field('PUT') }}
                    <div class="row py-2">
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $usuario -> name) }}">
                            @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" name="app" value="{{ old('app', $usuario -> app) }}">
                            @error('app')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 mb-1">
                            <label for="exampleInputEmail1" class="form-label">Apellido Materno:</label>
                            <input type="text" class="form-control" name="apm" value="{{ old('apm', $usuario -> apm) }}">
                            @error('apm')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleInputEmail1" class="form-label">Grado Academico:</label>
                            <input type="text" class="form-control" name="alternative_contact" value="{{ old('alternative_contact', $usuario -> alternative_contact) }}">
                            @error('alternative_contact')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" name="phone" placeholder="000-000-000" value="{{ old('phone', $usuario -> phone) }}">
                            @error('phone')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="correo@ejemplo.com" value="{{ old('email', $usuario -> email) }}">
                            @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Pais:</label>
                            <input type="text" class="form-control" name="country" value="{{ old('country', $usuario -> country) }}">
                            @error('country')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Estado:</label>
                            <input type="text" class="form-control" name="state" value="{{ old('state', $usuario -> state) }}">
                            @error('state')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Municipio:</label>
                            <input type="text" class="form-control" name="municipality" value="{{ old('municipality', $usuario -> municipality) }}">
                            @error('municipality')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <hr class="mb-0">
                        <div class="col-12">
                            <h5>Cambio de contraseña</h5>
                            <div class="form-text" id="basic-addon4">Si deseas realizar un cambio de contraseña, por favor ingresa la nueva contraseña en el espacio proporcionado. En caso contrario, simplemente omite esta sección y continúa completando los demás campos con la información requerida.</div>
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" name="password" placeholder="" value="">
                        </div>
                        @error('password')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                        <div class="col-12 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Confirmar contraseña:</label>
                            <input type="password" class="form-control" name="password_current" placeholder="" value="">
                        </div>
                        @error('password_current')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-success" value="Enviar" />
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- EDIT MODAL END -->
















<script>
    $(function() {
        $('#modalmod').modal('show')
    });
</script>
<script>
    $(function() {
        $('#modalshow').modal('show')
    });
    $(function() {
        $('#modalver').modal('show')
    });
    $(function() {
        $('#eliminarmodal').modal('show')
    });
</script>