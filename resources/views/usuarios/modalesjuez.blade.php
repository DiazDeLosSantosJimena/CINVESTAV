@yield('modalesjuez')


<!-- ADD MODAL START -->
<div class="modal fade" id="modalalta" tabindex="-1" aria-labelledby="modalaltaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('agregarjuez') }}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row py-2">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" aria-label="First name" name="name">
                            @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Institucion:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="apm">
                            @error('apm')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Titulo academico:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="academic_degree">
                            @error('academic_degree')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="name@example.com">
                        @error('email')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Telefono:</label>
                        <input type="numbre" class="form-control" name="phone" placeholder="000-000-000">
                        @error('phone')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pais:</label>
                        <input type="text" class="form-control" name="country" placeholder="MEXICO">
                        @error('country')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Estado:</label>
                        <input type="text" class="form-control" name="state" placeholder="Estado de Mexico">
                        @error('state')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Municipio:</label>
                        <input type="text" class="form-control" name="municipality" placeholder="Toluca">
                        @error('municipality')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <hr>
                        <label for=""> Asistecia:</label>
                        <select class="form-select" id="assitance" name="assistance">
                            <option selected>Seleccione una opcion</option>
                            <option value="P">Presencial</option>
                            <option value="F">Virtual</option>
                        </select>
                        <hr>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" href="usuarios/store" class="btn btn-success" value="Enviar" />
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ADD MODAL END -->

<!-- EDIT MODAL START -->
@foreach ($usuarios as $usuario)
<div class="modal fade" id="exampleModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('salvarjuez', ['id' => $usuario->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field('PATCH') }}
                    {{ method_field('PUT') }}

                    <div class="row py-2">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" aria-label="First name" name="name" value="{{ $usuario -> name }}">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Institucion:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="apm" value="{{ $usuario -> apm }}">
                        </div>
                    </div>
                    <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Titulo academico:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="academic_degree" value="{{ $usuario -> academic_degree }}">
                        </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" value="{{$usuario -> email}}" placeholder="name@example.com">
                    </div>
                    <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="phone" value="{{ $usuario -> phone }}">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Pais:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="country" value="{{ $usuario -> country }}">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Estado:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="state" value="{{ $usuario -> state }}">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Municipio:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="municipality" value="{{ $usuario -> municipality }}">
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