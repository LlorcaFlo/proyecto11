  
  
  function validar(){
    var enviar = true;
    var nombre = document.formulario.nombre.value;
    var apellidos = document.formulario.apellidos.value;
    var mensaje = "";


  if(!(/^[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]*(-[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]*){0,1}$/.test(nombre))){
    mensaje=mensaje+'Nombre invalido.';
    enviar=false;
  }

  if(!(/^[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]*(-[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]*){0,1}(\s+[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]*(-[A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]*){0,1}){1}$/.test(apellidos))){
    mensaje=mensaje+'\n'+'Apellidos invalido.';
    enviar=false;
  }
  if(!enviar){
    alert(mensaje);
    event.preventDefault();
  }
}

document.addEventListener('DOMContentLoaded',validar);
