
<?php
//Proceso del NOmbre...
// Si no existe S_POST email creará un array de errores y almacenará el error.
// De lo contrario el valor será la variable post si pasa la función de validación de nombre.
if (!isset($_POST['nombre']) ) {
	$errores['nombre'] = "No he recibido el nombre";
	}else {
		$value = va_nombre('nombre');
		if($value){
		$errores['nombre'] = $value;
			}
	}
//Proceso del Email...
// Si no existe S_POST email creará un array de errores y almacenará el error.
// De lo contrario el valor será la variable post si pasa la función de validación de email.
	if (!isset($_POST['email']) ) {
	$errores['email'] = "No he recibido el email";
	}else {
		$value = va_email('email');
		if($value){
		$errores['email'] = $value;
			}
	}

	if ( ! isset($_POST['clave1']) || ! isset($_POST['clave2'])) {
	$errores['clave1'] = "No he recibido ambas claves.";
		} else {
		$value = va_password('clave1','clave2');
		if($value){
		$errores['clave1'] = $value;
			}
		}
