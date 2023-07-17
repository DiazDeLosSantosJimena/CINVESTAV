<option data-search="true" data-silent-initial-value-set="true" value="0">-- Seleccione un proyecto --</option>
@foreach ($projects as $project)
<option data-search="true" data-silent-initial-value-set="true" value="{{ $project->id }}">{{ $project->title }}</option>
@endforeach