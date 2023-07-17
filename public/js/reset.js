//MOSTRAR CAMPOS DE PASSWORD
function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }

  function mostrarContrasena2(){
    var tipo = document.getElementById("password2");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}

//VALIDAR CAMPOS IGUALES
document.addEventListener('DOMContentLoaded', function() {
var c1 = document.getElementById("password");
var c2 = document.getElementById("password2");
var boton = document.getElementById("sub");

c1.addEventListener('input', compararInputs);
c2.addEventListener('input', compararInputs);

function compararInputs() {
  if (c1.value === c2.value) {
    boton.disabled = false;
  } else {
    boton.disabled = true;
  }
}
});
