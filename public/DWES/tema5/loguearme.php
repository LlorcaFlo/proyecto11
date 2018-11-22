<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Página de autenticación.</title>
</head>
<body>


	<h1>
		Ya estás logueado
	</h1>

	<?php $_SESSION['user']['name'] = 'José' ?>

	<h2>Con el nombre: <?php $_SESSION ?> </h2>


	<a href="inicio.php"></a>Regresar a la ṕágina principal<br>
	<a href="logout.php"></a>Cerrar sesión<br>



</body>
</html>