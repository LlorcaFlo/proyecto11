<?php

//Deja el valor del nombre ya dentro de la caja de texto en el formulario...
	function mostrarCampo($campo){
		if(isset($_POST[$campo])){
				return ' value="' . $_POST[$campo] . '"';
		}
	}	
/*Muestra el error en cada campo...
	recibe el campo y el error...
  rellena un array con cada uno de los errores*/


	function mostrar_error_campo($campo, $errores) {
	if (isset($errores[$campo])) {
		echo '<span class="errorf">' . $errores[$campo] . '</span>';
	}
}



?>