<?php

	function mostrar_errores($errores) {

		echo '<ul class="listaerrores">';
		foreach ($errores as $error) {
		echo "<li>$error</li>";
		}
		echo '</ul>';
	}

	function mostrar_campo($campo) {

		if (isset($_POST[$campo])) {
		echo ' value="' . $_POST[$campo] . '"';
		}
	}

	function mostrar_error_campo($campo, $errores) {
		if (isset($errores[$campo])) {
		echo '<span class="errorf">' . $errores[$campo] . '</span>';
		}
	}

	function va_nick($campo){

 		$campo = trim($campo);
		if (strlen($campo) < 5 )
		{
		return false;
		}else 
		{
 		return true;
 		}
	}

	function va_nombre($campo){

		$campo =  sanitiza($campo);

		if (strlen($campo) < 3 )
		{
			return false;
		}elseif(preg_match('/[^A-Za-z áéíóúàèìòù\-\'´âêîôûäëïöüÁÉÍÓÚÀÈÌÒÙÄËÏÖÜ]/', $campo))
		{
				return false;
		}else
		{
			return true;
		}
	}

function va_apellido($campo){

	$campo =  sanitiza($campo);

		if(preg_match('/[^A-Za-z áéíóúàèìòù\-\'´âêîôûäëïöüÁÉÍÓÚÀÈÌÒÙÄËÏÖÜ]/', $campo)){
			return false;
		}else{
			return true;
		}
	}


function va_email($campo){

		$campo = sanitiza($campo);

		if (strlen($campo) < 6){
			return false;
		}elseif(!preg_match('/^[a-zA-Z\d-_*\.]+@[a-zA-Z\d-_*\.]+\.[a-zA-Z\d]{2,}$/', $campo)){
			return false;
		}else{
			return true;
		}
	} 

function va_password($campo){

		$campo=sanitiza($campo);

			if(strlen($campo)<8){
				return false;
			}elseif(! preg_match('/[a-z]/', $campo)){
				return false;
			}elseif(! preg_match('/[A-Z]/', $campo)){
				return false;
			}elseif(! preg_match('/[0-9]/', $campo)){
				return false;
			}else {
				return true;
			}
		}

		function sanitiza($campo){
 	$campo= trim($campo);
  	$campo = strip_tags($campo);
  	$campo = preg_replace("/\"/",'', $campo);
  return $campo;
}














// 

// function va_nombre($campo){
// 	if (isset($_POST[$campo])){
// 	$_POST[$campo] = format_entra($campo);

// 	if (strlen($_POST[$campo]) < 3 ){
// 			return "Nombre demasiado corto.";
// 		}elseif(preg_match('/[^A-Za-z áéíóúàèìòù\-\'´âêîôûäëïöüÁÉÍÓÚÀÈÌÒÙÄËÏÖÜ]/', $_POST[$campo])){
// 				return "Nombre introducido no válido.";
// 		}else{
// 			return null;
// 			}
// 		}else{
// 			return "Nombre no recibido.";
// 		}
// }

// function va_apellido($campo){
// 	if (isset($_POST[$campo])){
// 		$_POST[$campo] = format_entra($campo);

// 		if(preg_match('/[^A-Za-z áéíóúàèìòù\-\'´âêîôûäëïöüÁÉÍÓÚÀÈÌÒÙÄËÏÖÜ]/', $_POST[$campo])){
// 			return "Apellido introducido no es válido.";
// 		}else{
// 			return null;
// 		}
// 	} else{
// 		return "Apellido no recibido.";
// 	}
// }

// function va_codiPostal($campo){

// 	if(isset ($_POST[$campo])){
// 	$_POST[$campo] = format_entra($campo);

// 	if ( strlen($_POST['codigopostal']) != 5) {
// 			return 'El código postal debe contener al menos "5" dígitos.';
// 		}
// 			elseif(! preg_match('/^[0-9]+$/', $_POST['codigopostal'] )) {
// 			return "El código postal no es válido, solo se permiten números.";
// 	    }
// 	   		elseif($_POST['codigopostal'] < 1001 OR $_POST['codigopostal'] > 52999){
// 	    		return "El código postal no está dentro del rango permitido.";
// 	    } else {
// 	    	return null;
// 	   }
// 	}else{
// 	   	return 'No se ha recibido el Código Postal.';
// 	   }
// }

// function va_telefono($campo){
// 	if(isset($_POST[$campo])){
// 		$_POST[$campo] = format_entra($campo);

// 		if ( strlen($_POST['telefono']) != 9) {
// 			return 'El teléfono debe contener al menos "9" dígitos.';
// 		}elseif (! preg_match('/^([0-9]{9})+$/',$_POST['telefono'])){
// 			$errores['telefono'] = "El teléfono no es válido, solo se permiten números.";
// 			}
// 			else {
// 	    	return null;
// 	   }
// 	}else{
// 		return 'No se ha recibido el Teléfono.';
// 	}
// }



// // function format_entra($campo){
// // 	if ( isset($_POST[$campo])){
// //   $_POST[$campo] = trim($_POST[$campo]);
// //   $_POST[$campo] = strip_tags($_POST[$campo]);
// //   $_POST[$campo] = preg_replace("/\"/",'', $_POST[$campo]);
// //   return $_POST[$campo];
// // }
// // }



//  ?>