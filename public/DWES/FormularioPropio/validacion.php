<?php 			
	//include 'funcionesvalidacion.php';
				// Procesamos el formulario

				//Proceso del Nombre...
				if (! isset($_POST['nombre'])) {
					$errores['nombre'] = 'No he recibido el nombre';

			} else {
				$return = va_nombre('nombre');
				if($return){
					$errores['nombre'] = $return;
				}
			}

				//Proceso del Apellido...
				if (!isset($_POST['apellido']) ) {
					$errores['apellido'] = 'No he recibido los apellidos';
				} else {
					$value = va_apellido('apellido');
					if($value){
						$errores['apellido'] = $value;
					}
			}
				//Proceso del Email...
				if (!isset($_POST['email']) ) {
				$errores['email'] = "No he recibido el email";
			}else {
				$value = va_email('email');
				if($value){
					$errores['email'] = $value;
				}
			}

				//Proceso Claves
				if ( ! isset($_POST['clave1']) || ! isset($_POST['clave2'])) {
				$errores['clave1'] = "No he recibido ambas claves.";
			} else {
				$value = va_password('clave1','clave2');
					if($value){
					$errores['clave1'] = $value;
				}
			}

					//Validación Código Postal...
			if ( ! isset($_POST['codigopostal']) ) {
			$errores['codigopostal'] = 'No he recibido el código postal.';
		}
		
	    	if ( ! isset($_POST['telefono']) ) {
			$errores['telefono'] = "No he recibido el teléfono.";
		}

			if (! preg_match('/^([0-9]{9})+$/',$_POST['telefono'])){
				$errores['telefono'] = "El teléfono no es válido, solo se permiten números.";
			}


		?>
