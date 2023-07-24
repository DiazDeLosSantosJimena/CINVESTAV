@extends('layout.navbar')
@section('title','Actividades')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mx-5 my-4">
            <h3>Actividades</h4>
        </div>
        <div class="col-12 text-center">
            <p class="display-1">Proximamente...</p>
        </div>
    </div>
</div>

<script>
    var navbar = document.querySelector('#attendance');
    navbar.className = "mdl-layout__tab is-active";
    var btnGuardar = document.querySelector("#guardarTaller");
    var swi = 0;
    check = (valor) => {
        var checkBox = document.querySelector('#taller' + valor);
        if (checkBox.checked) {
            swi++;
        } else {
            swi--;
        }

        if (swi > 0) {
            btnGuardar.className = "btn btn-primary";
        } else {
            btnGuardar.className = "btn btn-primary disabled";
        }
    }
</script>
@endsection