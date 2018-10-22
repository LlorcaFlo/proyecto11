<!DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

	<form action="index.php" method="POST">

	<label for="nick">Nick de usuario: </label><br>
	<input type="text" name="nick" id="nick" placeholder="Introduzca aquí su nick"
	class="field"
	<?php mostrarCampo('nick') ?>><br><br>

	<label for="contraseña">Contraseña: </label><br>
	<input type="password" name="contraseña" id="contraseña" placeholder="Escriba aquí su contraseña"class="field"
	<?php mostrarCampo('contraseña') ?>><br><br>

	 <input type="submit" class="btn btn-grey" value="Enviar"></input>

</form>
</body>
</html>