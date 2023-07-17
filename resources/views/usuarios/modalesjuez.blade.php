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
                            <input type="text" class="form-control" name="academic_degree" value="{{ old('academic_degree') }}">
                            @error('academic_degree')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" name="phone" placeholder="000-000-000" value="{{ old('phone') }}">
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
                        <div class="col-12">
                            <label for="" class="form-check-label text-secondary">
                                La contraseña de los evaluadores es por defecto 123123
                            </label>
                        </div>
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
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $usuario -> name) }}">
                            @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="exampleInputEmail1" class="form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" name="app" value="{{ old('name', $usuario -> app) }}">
                            @error('app')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 mb-1">
                            <label for="exampleInputEmail1" class="form-label">Apellido Materno:</label>
                            <input type="text" class="form-control" name="apm" value="{{ old('name', $usuario -> apm) }}">
                            @error('apm')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleInputEmail1" class="form-label">Grado Academico:</label>
                            <input type="text" class="form-control" name="academic_degree" value="{{ old('name', $usuario -> academic_degree) }}">
                            @error('academic_degree')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" name="phone" placeholder="000-000-000" value="{{ old('name', $usuario -> phone) }}">
                            @error('phone')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="correo@ejemplo.com" value="{{ old('name', $usuario -> email) }}">
                            @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="" class="form-check-label text-secondary">
                                La contraseña de los evaluadores es por defecto 123123
                            </label>
                        </div>
                        <hr>
                        <div class="col-4 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Pais:</label>
                            <input type="text" class="form-control" name="country" value="{{ old('name', $usuario -> country) }}">
                            @error('country')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Estado:</label>
                            <input type="text" class="form-control" name="state" value="{{ old('name', $usuario -> state) }}">
                            @error('state')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Municipio:</label>
                            <input type="text" class="form-control" name="municipality" value="{{ old('name', $usuario -> municipality) }}">
                            @error('municipality')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
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

<!-- DELETE MODAL -->
@foreach($usuarios as $usuario)
<div class="modal fade" id="modalDelete{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Esta a punto de eliminar el registro: <br> <strong>{{ $usuario->id .' '. $usuario->name .' '. $usuario->app .' '. $usuario->apm }}</strong> <br> ¿Desea continuar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <form action="{{ route('usuario.destroy', $usuario->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- DELETE MODAL END -->

<!-- DELETE MODAL Evaluations -->
@foreach($proyectsEvaluators as $usuario)
<div class="modal fade" id="modalDelete{{ $usuario->evaluationId }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Esta a punto de eliminar el registro: <br> <strong>{{ $usuario->evaluationId .' '. $usuario->name .' '. $usuario->app .' '. $usuario->apm .' | '. $usuario->title }}</strong> <br> ¿Desea continuar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <form action="{{ route('evaluacion.delete', $usuario->evaluationId) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- DELETE MODAL Evaluations END -->

<!-- ADD MODAL ASIGN EVALUATOR START -->
<div class="modal fade" id="modalAsignUser" tabindex="-1" aria-labelledby="modalaltaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar Evaluadores a Proyectos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('evaluacion.asignEvaluator') }}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row py-2">
                        <div class="col-12 mt-2 my-2">
                            <label for="exampleFormControlInput1" class="form-label">Evaluador:</label>
                            <select class="form-select" name="id_evaluador" id="evaluador" data-search="true" data-silent-initial-value-set="true">
                                <option value="null" selected>Seleccione el evaluador:</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name .' | '. $user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlInput1" class="form-label">Proyecto:</label>
                        <select class="form-select" name="id_proyecto" id="evaluador" data-search="true" data-silent-initial-value-set="true">
                            <option value="null" selected>Seleccione el proyecto:</option>
                            @foreach($proyects as $proyect)
                            <option value="{{ $proyect->id }}">{{ $proyect->id .' | '. $proyect->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- <div class="col-12 mt-1">
                        <label for="exampleFormControlInput1" class="form-label">Proyecto:</label>
                        <select class="form-select" name="proyecto" id="proyecto" data-search="true" data-silent-initial-value-set="true">
                            <option value="null" selected>--- Selecciona un evaluador antes ---</option>
                        </select>
                    </div> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" href="{{ route('agregarjuez') }}" class="btn btn-success" value="Enviar" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ADD MODAL ASIGN EVALUATOR START -->

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