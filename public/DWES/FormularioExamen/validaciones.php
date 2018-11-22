<?php

	//Proceso del Email...
				if (!isset($_POST['email']) ) {
				$errores['email'] = "No he recibido el email";
			}else {
				$value = va_email('email');
				if($value){
					$errores['email'] = $value;
				}
			}