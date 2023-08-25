<option data-search="true" data-silent-initial-value-set="true" value="">-- Seleccione un juez --</option>
@foreach ($evaluador as $eva)
@if($eva->deleted_at == null)
<option data-search="true" data-silent-initial-value-set="true" value="{{ $eva->id }}">{{ $eva->email .' | '. $eva->name }}</option>
@endif
@endforeach