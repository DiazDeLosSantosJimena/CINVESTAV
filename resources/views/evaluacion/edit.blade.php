@extends('layout.navbar')
@section('content')
<link rel="stylesheet" href="{{ asset('css/inputs.css') }}">
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h3>Datos del Ponente</h3>
                </div>
                @foreach ($user as $uni)
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Nombre del postulante:</strong><br> {{ $uni->name .' '. $uni->app .' '. $uni->apm }}</p>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Correo:</strong><br> {{ $uni->email }}</p>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Teléfono:</strong><br> {{ $uni->phone }}</p>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Grado Academico:</strong><br> {{ $uni->academic_degree }}</p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>País:</strong><br> {{ $uni->country }}</p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Estado:</strong><br> {{ $uni->state }}</p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Ciudad:</strong><br> {{ $uni->municipality }}</p>
                </div>
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Asistencia:</strong>
                        <br>
                    </p> 
                </div>
            </div>     
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h3>Datos del Proyecto</h3>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Título del proyecto:</strong><br> {{ $uni->title }}</p>
                </div>
                <div class="col-md-6 col-sm-12 my-3">
                    <p><strong>Modalidad de participación:</strong>
                        <br>
                        @if($uni->modality == 'P')
                        Ponencia
                        @elseif( $uni->modality == 'C')
                        Cartel
                        @else
                        {{ $uni->modality }}
                        @endif
                    </p>
                </div>
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Eje tematico:</strong>
                        <br>
                        @if($uni->thematic_area == 'U')
                        Nivel Universitario por área.(Cálculo, Algebra, Geometría Analitca, Algebra Lineal, etc.)
                        @elseif( $uni->thematic_area == 'P')
                        Nivel Preuniversitario.(Bachillerato.)
                        @elseif( $uni->thematic_area == 'B')
                        Nivel Básico.(Primaria o secundaria.)
                        @elseif( $uni->thematic_area == 'STEM')
                        Ciencia, Tecnológia, Ingenieria y Matemáticas (STEM).
                        @else
                        {{ $uni->modality }}
                        @endif
                    </p>
                </div>
            @if(count($autores) > 0)
                <div class="col-md-12 col-sm-12 my-3 text-center">
                    <p><strong>~ Autores ~</strong></p>
                </div>
                @foreach($autores as $author)
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Nombre:</strong><br> {{ $author->name }} </p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Apellido Paterno:</strong><br> {{ $author->app }}</p>
                </div>
                <div class="col-md-4 col-sm-12 my-3">
                    <p><strong>Apellido Materno:</strong><br> {{ $author->apm }}</p>
                </div>
                @endforeach
                @endif
                <div class="col-md-12 col-sm-12 my-3">
                    <p><strong>Institución de procedencia:</strong><br> {{ $uni->sending_institution }}</p>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-12 col-sm-12 my-2">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h3>Documentos</h3>
                </div>
                @foreach($files as $file)
                <div class="col-auto mb-3 text-center">
                    <!-- Button Chip -->
                    <a href="{{ route('proyectos.download', $file->id) }}" type="button" class="mdl-chip" style="background-color: #0178a0; color: white;">
                        <span class="mdl-chip__text">{{ $file->name }}</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2)
        <hr>
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 mx-5">
                    <h3>Calificación</h3>
                </div>
                <div class="table-responsive">
                    <form action="{{ route('evaluacion.update', $evaluacion-> id) }}" method="POST">
                        @csrf
                        @method('put')
                        <table class="table table-borderless">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Criterio</th>
                                    <th scope="col">Puntuación Evaluada</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="indicador" role="alert">
                                            <b>1.-</b> Título acorde al objetivo y resultados de la contribución *
                                        </div>
                                    </td>
                                    <td>
                                        <div class="calif indicador" role="alert">
                                            <select class="form-select" aria-label="Default select example" name="title">
                                                @for ($i = 1; $i <= 10; $i++) 
                                                    <option value="{{$i}}" {{ old('title', $i) == $evaluacion->title ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="indicador" role="alert">
                                            <b>2.-</b> Extensión y pertinencia del Resumen
                                        </div>
                                    </td>
                                    <td>
                                        <div class="calif indicador" role="alert">
                                            <select class="form-select" aria-label="Default select example" name="extension">
                                                @for ($i = 1; $i <= 10; $i++) 
                                                    <option value="{{$i}}" {{ old('extension', $i) == $evaluacion->extension ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="indicador" role="alert">
                                            <b>3.-</b> Palabras clave
                                        </div>
                                    </td>
                                    <td>
                                        <div class="calif indicador" role="alert">
                                            <select class="form-select" aria-label="Default select example" name="key_words">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{$i}}" {{ old('key_words', $i) == $evaluacion->key_words ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="indicador" role="alert">
                                            <b>4.-</b> Abstract y Keywords
                                        </div>
                                    </td>
                                    <td>
                                        <div class="calif indicador" role="alert">
                                            <select class="form-select" aria-label="Default select example" name="abstract_keywords">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{$i}}" {{ old('abstract_keywords', $i) == $evaluacion->abstract_keywords ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="indicador" role="alert">
                                            <b>5.-</b> Presenta la problemática y el objetivo
                                        </div>
                                    </td>
                                    <td>
                                        <div class="calif indicador" role="alert">
                                            <select class="form-select" aria-label="Default select example" name="problematic">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{$i}}" {{ old('problematic', $i) == $evaluacion->problematic ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="indicador" role="alert">
                                            <b>6.-</b> La Fundamentación Teórica es pertinente
                                        </div>
                                    </td>
                                    <td>
                                        <div class="calif indicador" role="alert">
                                            <select class="form-select" aria-label="Default select example" name="theoretical">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{$i}}" {{ old('theoretical', $i) == $evaluacion->theoretical ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="indicador" role="alert">
                                            <b>7.-</b> Describe la Metodología
                                        </div>
                                    </td>
                                    <td>
                                        <div class="calif indicador" role="alert">
                                            <select class="form-select" aria-label="Default select example" name="methodology">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{$i}}" {{ old('methodology', $i) == $evaluacion->methodology ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="indicador" role="alert">
                                            <b>8.-</b> Presenta una propuesta o aporte
                                        </div>
                                    </td>
                                    <td>
                                        <div class="calif indicador" role="alert">
                                            <select class="form-select" aria-label="Default select example" name="proposal">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{$i}}" {{ old('proposal', $i) == $evaluacion->proposal ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="indicador" role="alert">
                                            <b>9.-</b>Presenta Resultados y conclusiones
                                        </div>
                                    </td>
                                    <td>
                                        <div class="calif indicador" role="alert">
                                            <select class="form-select" aria-label="Default select example" name="results">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{$i}}" {{ old('results', $i) == $evaluacion->results ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="indicador" role="alert">
                                            <b>10.-</b>Estilo APA para las tablas, figuras e imágenes
                                        </div>
                                    </td>
                                    <td>
                                        <div class="calif indicador" role="alert">
                                            <select class="form-select" aria-label="Default select example" name="APA_table">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{$i}}" {{ old('APA_table', $i) == $evaluacion->APA_table ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="indicador" role="alert">
                                            <b>11.-</b>Estilo APA para Citas y Referencias
                                        </div>
                                    </td>
                                    <td>
                                        <div class="calif indicador" role="alert">
                                            <select class="form-select" aria-label="Default select example" name="APA_references">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{$i}}" {{ old('APA_references', $i) == $evaluacion->APA_references ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="indicador" role="alert">
                                            <b>12.-</b>Fuente y Márgenes y Extensión
                                        </div>
                                    </td>
                                    <td>
                                        <div class="calif indicador" role="alert">
                                            <select class="form-select" aria-label="Default select example" name="format">
                                                @for ($i = 1; $i <= 10; $i++) 
                                                    <option value="{{$i}}" {{ old('format', $i) == $evaluacion->format ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="align-middle table-group-divider">
                                    <th style="text-align: end;">Total:</th>
                                    <th class="text-center">
                                        <p id="totalCriterios">0</p>
                                    </th>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-borderless">
                            <tr class="align-middle table-group-divider">
                            <tr>
                                <td colspan="3">
                                    <div class="criterios" role="alert">
                                        Considerando los rangos anteriores, seleccione según su criterio; el producto propuesto debe ser: *
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="criterios2" role="alert">
                                        Aceptado
                                    </div>
                                </td>
                                <td style="width: 100px;">
                                    <div class="criterios2" style="align-items: center; justify-content: center; display:flex;" role="alert">
                                        <input class="form-check-input custom-radio" type="radio" name="status" value="A" {{ old('status',  $evaluacion->status) == 'A' ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <div class="criterios2" role="alert">
                                        El trabajo cumple con los estandares y formatos establecidos en la convocatoria del congreso
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="criterios2" role="alert">
                                        Aceptado con Condiciones
                                    </div>
                                </td>
                                <td style="width: 100px;">
                                    <div class="criterios2" style="align-items: center; justify-content: center; display:flex;" role="alert">
                                        <input class="form-check-input custom-radio" type="radio" name="status" value="AC" {{ old('status',  $evaluacion->status) == 'AC' ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <div class="criterios2" role="alert">
                                        El trabajo será aceptado siempre y cuando se realizen las modificaciones solicitadas
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="criterios2" role="alert">
                                        Rechazado
                                    </div>
                                </td>
                                <td style="width: 100px;">
                                    <div class="criterios2" style="align-items: center; justify-content: center; display:flex;" role="alert">
                                        <input class="form-check-input custom-radio" type="radio" name="status" value="R" {{ old('status',  $evaluacion->status) == 'R' ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <div class="criterios2" role="alert">
                                        El trabajo no cumple con los estandares y formatos establecidos en la convocatoria del congreso
                                    </div>
                                </td>
                            </tr>

                            <tr class="align-middle table-group-divider">
                            <tr>
                                <td colspan="3">
                                    <div class="criterios" role="alert">
                                        Considerando los rangos anteriores, seleccione según su criterio; el producto propuesto debe ser: *
                                    </div>
                                </td>
                            </tr>
                            <td colspan="3">
                                <textarea class="form-control" placeholder="Deje su comentario aqui" id="comentario" style="height: 100px" name="comment">{{ old('comment', $evaluacion->comment) }}</textarea>
                            </td>
                        </table>
                </div>
                <div class="col d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Calificar</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
        <script>
            var navbar = document.querySelector('#evaluaciones');
            navbar.className = "mdl-layout__tab is-active";
        </script>
        <div class="col-md-12 col-sm-12 my-2 text-center">
            <a href="{{ route('evaluacion.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</div>
@endsection