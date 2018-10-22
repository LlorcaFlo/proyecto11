<?php

function val_codigopostal($codigo){
	$codigo = $_POST['codigopostal'];


if ( ! isset($codigo) ) {
			$errores[$codigo] = 'No he recibido el código postal';
		}
		if ( strlen($codigo) != 5) {
			$errores['codigopostal'] = "El código postal debe contener al menos 5 dígitos";
		} 
			elseif(! preg_match('/^([0-9])+$/', $codigo )) { 
			$errores['codigopostal'] = "El código postal no es válido, solo se permiten números";
	    }
	   		elseif($codigo < 01001 OR $codigo > 52999){
	    		$errores['codigopostal'] = "El código postal no está dentro del rango permitido";
	    }

}


?>