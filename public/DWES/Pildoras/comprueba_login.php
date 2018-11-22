<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

try{
	$base=new PDO("mysql:host=localhost; dbname=pruebas", "root", "");
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql="SELECT * FROM USUARIOS WHERE NICK= :nick AND CONTRASEÑA= password";

	$resultado=$base->prepare($sql);

	$nick=htmlentities(addslashes($_POST["nick"]));
	$password=htmlentities(addslashes($_POST["password"]));

	$resultado->bindValue(":nick", $nick);
	$resultado->bindValue(":password", $password);
	
	$resultado->execute();

	$numero_registro=$resultado->rowCount();

	if($numero_registro!=0){
		echo "<h2>Adelante<h2>";
	}else{
		header("location:login.php");
		echo "Usuario no registrado";
	}


}catch(Exception $e){
	die("Error: " . $e->getMessage());
}









?>

</body>
</html>