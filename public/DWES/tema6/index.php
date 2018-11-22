<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formularios Usables</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<h1>Formularios usables</h1>

<?php

	include 'funciones.php';

	$errores = [];

	if ( ! $_POST ) {

		include('formulario.php');

	} else {

	include 'validacion.php';
		if ( $errores ) {
			//mostrar_errores($errores);
			include 'formulario.php';

		} else {
			echo "Todo correcto, usuario registrado";
		}

	}
?>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/popper.js"></script>
</body>
</html>
