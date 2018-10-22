<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
		include 'funciones.php';


	if (! $_POST) {

		include 'Formulario.php';
	}
	else {

		include 'validacion.php';
		if ( $errores ) {
			//mostrar_errores($errores);
			include 'formulario2.php';

		} else {
			echo "Todo correcto, usuario registrado";
		}

	}
		
	}




?>
</body>
</html>