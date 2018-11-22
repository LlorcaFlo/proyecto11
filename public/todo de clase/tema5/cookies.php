<?php
					//Dos Años
$duracion=time()+(60*60*24*365*2);

setcookie('nombre', 'José');
setcookie('edad', '35', 60);


$datos=['web'=>'iescierva.net',
		'director'=>'José Antonio'];

setcookie('especial', serialize($datos), $duracion);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejemplos de cookies</title>
</head>
<body>
	<h1>Hola <?=$_COOKIE['nombre']?></h1>
	<h2>Tu edad es <strong><?=$_COOKIE['edad']?></strong> </h2>

	<h3>Los datos almacenados son: <br> 

		<?php

		$datos = unserialize($_COOKIE['especial']);
		var_dump($datos);

		?>

	</h3>

</body>
</html>