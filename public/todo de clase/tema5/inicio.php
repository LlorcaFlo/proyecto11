<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
	><meta charset="utf-8">
	<title></title>
</head>
<body>
<?php

if(isset($_SESSION['user']['name'])){
	echo 'Eres ' . $_SESSION['user']['name'];
}else{
	echo 'No estás logeado';
}
?>
<br>

<a href="loguearme.php">Iniciar Sesión</a>
<a href="loguearme.php">Cerrar Sesión</a>



</body>
</html>