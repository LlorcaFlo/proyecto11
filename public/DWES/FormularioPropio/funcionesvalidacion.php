<?php
function va_nombre($campo){

	if (isset($_POST[$campo])){
	$_POST[$campo] = format_entra($campo);

	if (strlen($_POST[$campo]) < 3 ){
			return "Nombre demasiado corto.";
		}elseif(!preg_match('/^[A-Z]{1}/', $_POST[$campo])){
		 		return "El nombre debe comenzar en mayúscula.";
		}elseif(preg_match('/[^A-Za-z áéíóúàèìòù\-\'´âêîôûäëïöüÁÉÍÓÚÀÈÌÒÙÄËÏÖÜ]/', $_POST[$campo])){
				return "Nombre introducido no válido.";
		}else{
			return null;
			}
		}else{
			return "Nombre no recibido.";
		}
}
function va_apellido($campo){
	if (isset($_POST[$campo])){
		$_POST[$campo] = format_entra($campo);

		if(preg_match('/[^A-Za-z áéíóúàèìòù\-\'´âêîôûäëïöüÁÉÍÓÚÀÈÌÒÙÄËÏÖÜ]/', $_POST[$campo])){
			return "Apellido introducido no es válido.";
		}else{
			return null;
		}
	} else{
		return "Apellido no recibido.";
	}
}
function va_email($campo){

	if(isset($_POST[$campo])){
		$_POST[$campo] = format_entra($campo);

		if (strlen($_POST[$campo]) < 6){
			return "El email es demasiado corto.";
		}elseif(!preg_match('/^[a-zA-Z\d-_*\.]+@[a-zA-Z\d-_*\.]+\.[a-zA-Z\d]{2,}$/', $_POST[$campo])){
			return "El email no es correcto.";
		}
		/*elseif(comp_Email($campo, 'users.txt')){
			return "No es posible registrarse con ese email, ya está en uso.";
		}*/
		else{
			return null;
		}
	} else {
		return "No se ha recibido el Email,";
	}
}
function va_password($campo, $campo1){

	if (isset($_POST[$campo]) ||  isset($_POST[$campo1])) {
			$_POST[$campo]=format_entra($campo);

			if(strlen($_POST[$campo])<8){
				return 'La contaseña debe contener al menos "8" caracteres.';

			}elseif(! preg_match('/[a-z]/', $_POST['clave1'])){
				return "La clave ha de tener al menos una miníscula.";

			}elseif(! preg_match('/[A-Z]/', $_POST['clave1'])){
				return "La clave ha de tener al menos una mayúscula.";

			}elseif(! preg_match('/[0-9]/', $_POST['clave1'])){
				return "La clave ha de tener al menos un número.";
			}elseif ($_POST[$campo] != $_POST[$campo1]) {
				return "Las claves tienen que ser iguales.";
			}else {
				return null;
			}
			}else {
			return "No se recibieron contraseñas.";
			}
}
function va_codiPostal($campo){

	if(isset ($_POST[$campo])){
	$_POST[$campo] = format_entra($campo);
	if ( strlen($_POST['codigopostal']) != 5) {
			return 'El código postal debe contener al menos "5" dígitos.';
		}
			elseif(! preg_match('/^[0-9]+$/', $_POST['codigopostal'] )) {
			return "El código postal no es válido, solo se permiten números.";
	    }
	   		elseif($_POST['codigopostal'] < 1001 OR $_POST['codigopostal'] > 52999){
	    		return "El código postal no está dentro del rango permitido.";
	    } else {
	    	return null;
	   }
	}else{
	   	return 'No se ha recibido el Código Postal.';
	   }
}



function format_entra($campo){

	if ( isset($_POST[$campo])){
  $_POST[$campo] = trim($_POST[$campo]);
  $_POST[$campo] = strip_tags($_POST[$campo]);
  $_POST[$campo] = preg_replace("/\"/",'', $_POST[$campo]);
  return $_POST[$campo];
}
}
?>
