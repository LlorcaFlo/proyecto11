<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>USO DE POST</title>
</head>
<body>
	<?php
		if(! $_POST) {
			include('formulario.php');
		} else {
			 if (isset($_POST['registrarse']) && $_POST['registrarse'] = 'Enviar'){
			 	echo 'Muchas gracias por registrarte en mi sistema.' + "\n";

			 }elseif{
			 	 if (isset($_POST['registrarse']) && $_POST['registrarse'] = 'Cancelar'){
			 	echo 'Tonto, más que tonto...chao!!' + "\n";

			 }else{
			 	echo'Operación no permitida.' + "\n";

			 }
			 if (isset($_POST['nombre']) ){
			 	echo ' Tu nombre es ' . $_POST['nombre'] + "\n";
			 }
			 if (isset($_POST['email']) ){
			 	echo '<br>Tu email es ' . $_POST['email'] + "\n";
			 }
			 if ($_POST['clave']['original']==$_POST['clave']['original']){
			 	echo 'Tu clave parece correcta' + "\n";
			 }else {
			 	echo '<br>Las claves no son correctas' + "\n";
			 }
		}

	?>

</body>
</html>