@yield('modalestaller')
<!-- ADD MODAL START -->
<div class="modal fade" id="modaladd" tabindex="-1" aria-labelledby="modalaltaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Taller</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('taller.store') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="row py-2">
                        <div class="col-12 my-2">
                            <label for="floatingTextarea2">Presentadores</label>
                           
                                <textarea class="form-control" style="height: 100px" name="nameu" value="{{old('nameu')}}"></textarea>
                        </div>
                        @error('nameu')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                        <div class="col-12 my-2">
                            <label for="">Actividad:</label>
                            <select class="form-select" aria-label="Default select example" name="activity">
                                <option selected>Selecciona una opción</option>
                                <option value="1">Conferencias Magistrales</option>
                                <option value="2">Conferencias Especiales</option>
                                <option value="3">Grupos Temáticos</option>
                                <option value="4">Talleres</option>
                            </select>
                            @error('activity')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="">Titulo de la actividad:</label>
                            <textarea class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}"></textarea>
                            @error('title')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="">Nivel de la actividad:</label>
                            <input class="form-control @error('level') is-invalid @enderror" type="text" id="level" name="level" value="{{old('level')}}">
                            @error('level')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="">Fecha:</label>
                            <input class="form-control" type="date" id="date" name="date" value="{{old('date')}}">
                            @error('date')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="">Hora:</label>
                            <input class="form-control" type="time" id="hour" name="hour" value="{{old('hour')}}">
                            @error('hour')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="">Sitio:</label>
                            <input class="form-control" type="text" id="site" name="site" value="{{old('site')}}">
                            @error('site')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="">Numero de participantes:</label>
                            <input class="form-control" type="text" id="participants" name="participants" value="{{old('participants')}}">
                            @error('participants')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 my-2">
                            <label for="">Asistencia:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="assistance" id="flexRadioDefault1" value="Presencial">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Presencial
                                </label>
                            </div>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="assistance" id="flexRadioDefault2" value="Virtual">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Virtual
                                </label>
                            </div>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="assistance" id="flexRadioDefault2" value="Prsencial/Virtual">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Presencial/Virtual
                                </label>
                            </div>
                            @error('assistance')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>


                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <input type="submit" href="{{ route('taller.store') }}" class="btn btn-success" value="Enviar" />
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ADD MODAL END -->

<!-- EDIT MODAL START -->
@foreach ($talle as $info)
<div class="modal fade" id="exampleModal{{ $info->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('editTaller', ['id' => $info->id]) }}" method="POST">
                    {{ csrf_field('PATCH') }}
                    {{ method_field('PUT') }}
                    <div class="row py-2">
                        <div class="col-12 my-2">
                            <label for="">Presentadores:</label>
                            <textarea class="form-control"  id="floatingTextarea2" style="height: 100px" name="nameu">{{ old('nameu', $info -> nameu) }}</textarea>
                            @error('nameu')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                            <div class="col-12 my-2">
                                <label for="">Actividad:</label>
                                <select class="form-select" aria-label="Default select example" name="activity">
                                    <option value="1" {{ $info->activity == 1 ? 'selected' : '' }}>Conferencias Magistrales</option>
                                    <option value="2" {{ $info->activity == 2 ? 'selected' : '' }}>Conferencias Especiales</option>
                                    <option value="3" {{ $info->activity == 3 ? 'selected' : '' }}>Grupos Temáticos</option>
                                    <option value="4" {{ $info->activity == 4 ? 'selected' : '' }}>Talleres</option>
                                </select>
                                @error('activity')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-12 my-2">
                                <label for="">Titulo de la actividad:</label>
                                <textarea class="form-control @error('title') is-invalid @enderror" id="floatingTextarea2" style="height: 100px" name="title">{{ old('title', $info -> title) }}</textarea>
                                @error('title')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-12 my-2">
                                <label for="">Nivel de la actividad:</label>
                                <input class="form-control @error('level') is-invalid @enderror" type="text" id="level" name="level" value="{{ old('level', $info -> level) }}">
                                @error('level')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="">Fecha:</label>
                                <input class="form-control" type="date" id="date" name="date" value="{{ old('date', $info -> date) }}">
                                @error('date')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="">Hora:</label>
                                <input class="form-control" type="time" id="hour" name="hour" value="{{ old('hour', $info -> hour) }}">
                                @error('hour')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-12 my-2">
                                <label for="">Sitio:</label>
                                <input class="form-control" type="text" id="site" name="site" value="{{ old('site', $info -> site) }}">
                                @error('site')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-12 my-2">
                                <label for="">Numero de participantes:</label>
                                <input class="form-control" type="text" id="participants" name="participants" value="{{ old('participants', $info -> participants) }}">
                                @error('participants')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-12 my-2">
                                <label for="">Asistencia:</label>
                                @if($info->assistance == "Presencial")
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="assistance" id="flexRadioDefault1" value="Presencial" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Presencial
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="assistance" id="flexRadioDefault2" value="Virtual">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Virtual
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="assistance" id="flexRadioDefault2" value="Prsencial/Virtual">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Presencial/Virtual
                                    </label>
                                </div>
                                @elseif($info->assistance == "Virtual")
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="assistance" id="flexRadioDefault1" value="Presencial">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Presencial
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="assistance" id="flexRadioDefault2" value="Virtual" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Virtual
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="assistance" id="flexRadioDefault2" value="Prsencial/Virtual">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Presencial/Virtual
                                    </label>
                                </div>
                                @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="assistance" id="flexRadioDefault1" value="Presencial">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Presencial
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="assistance" id="flexRadioDefault2" value="Virtual">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Virtual
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="assistance" id="flexRadioDefault2" value="Prsencial/Virtual" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Presencial/Virtual
                                    </label>
                                </div>
                                @endif
                                @error('assistance')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <br>
                            <div class="mb-3">
                                <label for="">Status:</label>
                                <div class="form-check">
                                    @if($info -> status > 0)
                                    <input class="form-check-input" type="checkbox" name="status" checked>
                                    @else
                                    <input class="form-check-input" type="checkbox" name="status">
                                    @endif
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                                </div>
                            </div>

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
@foreach($talle as $info)
<div class="modal fade" id="modalDelete{{ $info->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Esta a punto de eliminar el registro: <br> <strong>{{  $info->title }}</strong> <br> ¿Desea continuar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <form action="{{ route('taller.destroy', $info->id) }}" method="post">
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