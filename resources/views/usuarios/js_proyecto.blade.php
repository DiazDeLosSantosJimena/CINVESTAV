<option data-search="true" data-silent-initial-value-set="true" value="0">-- Seleccione un juez --</option>
@foreach ($evaluador as $eva)
<option data-search="true" data-silent-initial-value-set="true" value="{{ $eva->id }}">{{ $eva->email .' | '. $eva->name }}</option>
@endforeach