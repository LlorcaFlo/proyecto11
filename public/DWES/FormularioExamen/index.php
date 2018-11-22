<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include 'funciones.php';
	include 'funcionesvalidacion.php';

if (! $_POST) {
		include 'formulario.php';
	}
	else{
		include 'validacion.php';
		
		if($errores){
			include 'formulario.php';
	}
	
	else {
			echo "Todo correcto, usuario registrado";
		}
}
?>
</body>
</html>
