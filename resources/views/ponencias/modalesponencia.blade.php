@yield('modalestaller')
<!-- ADD MODAL START -->
<div class="modal fade" id="modaladd" tabindex="-1" aria-labelledby="modalaltaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Horario a Proyectos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('presentation.store') }}" method="POST" e>
                    {!! csrf_field() !!}
                    <div class="row py-2">
                        <div class="col-12 my-2">
                            <label for="">Proyecto:</label>
                            <select class="form-control form-select" aria-label="Default select example" name="pro_users">
                                <option value="">Elige el proyecto</option>
                                @foreach($projects as $info)
                                <option value={{$info->id}}>{{$info->title}}|{{$info->name.' | '.$info->app.' | '.$info->apm}}</option>
                                @endforeach
                            </select>
                            @error('activity')
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
                <input type="submit" href="{{ route('presentation.store') }}" class="btn btn-success" value="Enviar" />
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ADD MODAL END -->

<!-- EDIT MODAL START -->
@foreach ($pre as $info)
<div class="modal fade" id="exampleModal{{ $info->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('editPre', ['id' => $info->id]) }}" method="POST">
                    {{ csrf_field('PATCH') }}
                    {{ method_field('PUT') }}
                    <div class="row py-2">
                        <div class="col-12 my-2">
                            <label for="">Proyecto:</label>
                            <select class="form-control form-select" aria-label="Default select example" name="pro_users" value="{{$info->pro_users}}">
                                <option value="">Elige el proyecto</option>
                                @foreach($pro as $proyect)
                                <option value={{$proyect->id}} {{ $proyect->id == $info->pro_users ?'selected':''; }}>{{$proyect->title}}|{{$proyect->name.' | '.$proyect->app.' | '.$proyect->apm}}</option>
                                @endforeach
                            </select>
                            @error('activity')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror

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
                                    @if($info -> estado > 0)
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
@foreach($pre as $info)
<div class="modal fade" id="modalDelete{{ $info->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Esta a punto de eliminar el registro: <br> <strong>{{ $info->id .' '. $info->title .' '. $info->name .' '. $info->apm }}</strong> <br> ¿Desea continuar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <form action="{{ route('presentation.destroy', $info->id) }}" method="post">
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