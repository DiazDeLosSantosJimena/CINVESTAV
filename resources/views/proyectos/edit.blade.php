@extends('layout.navbar')
@section('title', 'Editar mi proyecto')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mx-5">
            <h3>Editar mi proyecto</h3>
        </div>
        <div class="mb-3">
            <p>A continuación describa las características del proyecto.</p>
        </div>
        <form method="post" action="{{ route('proposals.update', $proposal->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="col mb-3">
                <div class="mb-3">
                    <input type="text" style="height: 60px;" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nombre del Proyecto" value="{{ old('name', $proposal->project->name) }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-floating">
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" style="height: 100px">{{ old('description', $proposal->project->description) }}</textarea>
                    <label for="floatingTextarea2">Descripción</label>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12 my-3">
                <div class="form-floating">
                    <select class="form-select @error('rama_id') is-invalid @enderror" name="rama_id" id="rama_id" aria-label="Floating label select example">
                        <option selected>Rama o Categoría:</option>
                        @foreach($ramas as $rama)
                        <option value="{{ $rama->id }}" {{ old('rama_id', $proposal->rama_id) == $rama->id ? 'selected' : '' }}>{{ $rama->name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Tipo de Proyecto</label>
                    @error('rama_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <hr>
            <div class="col-12 mx-5">
                <h3>Documentación</h3>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Documento X:</label>
                    <input class="form-control @error('archive') is-invalid @enderror" type="file" name="archive" id="archive">
                </div>
                @error('archive')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Archivo subído:</label><br>
                    <a href="{{ Storage::url($proposal->archive) }}" target="_blank" class="btn" style="background-color: #0178a0; color: white;">
                        <i class="mdi mdi-file-pdf btn-icon-prepend"></i>
                        Visualizar archivo
                    </a>
                </div>
            </div>
            <div class="mdl-cell--hide-phone row">
                <div class="col-6 my-5 text-center">
                    <a href="{{ route('project.index') }}" type="button" class="btn btn-secondary">Cancelar</a>
                </div>
                <div class="col-6 my-5 text-center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
            <div class="mdl-cell--hide-desktop row">
                <div class="col-auto my-5 text-center">
                    <a href="{{ route('project.index') }}" type="button" class="btn btn-secondary">Cancelar</a>
                </div>
                <div class="col-auto my-5 text-center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    var navbar = document.querySelector('#proyectos');
    navbar.className = "mdl-layout__tab is-active";
</script>
@endsection