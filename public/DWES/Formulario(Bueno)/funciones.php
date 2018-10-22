<?php

function mostrar_value($campo){
	if (isset($_POST[$campo])){
		echo ' value="' . $_POST[$campo] . '"';
	}
}
//Funcion recibe un campo
function valida_nick($campo){
// Se valida el campo en cuanto a longitud
	if (strlen($_POST['nick']) < 3){
		// Retorna el echo si es corto
					return 'Nick demasiado corto';
				}else{
					// Retorna el campo
					return $_POST[$campo];
}
?>