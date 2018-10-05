<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario Usables</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
<body>
	<h1>Formularios usables</h1>

	<!-- // Aqui irá el fomulario  -->	

<?php
	function mostrar_errores($errores){

				echo '<ul class="listaerrores">';

				foreach ($errores as $error) {
					echo "<li>$error</li>";
				}

				echo '</ul>';

			}
	 if ( ! $_POST ) { 
						//Mostramos el formulario
			include('formulario.php');

		} else {

			$errores = [];

		// Procesamos el formulario


			if( ! isset($_POST['nombre']) ) 
			{
				$errores[] = 'No he recibido el nombre';
		
			} elseif ( strlen($_POST['nombre']) < 3 )
			{
				$errores[] = 'Campo nombre demasiado corto';

			} 
			if ( ! isset($_POST['email']) )
			{
				$errores[] = 'No hemos recibido el email';
				
			} elseif (strlen($_POST['email']) < 6 ){
				$errores[] = 'El email no es válido';
				
			}
			if ( ! isset($_POST['clave1']) || ! isset($_POST['clave2']) ){
				$errores[] = 'No he recibido ambas claves';
				
			} else {
				if ( strlen($_POST['clave1']) <6 ){
				$errores[] = 'La clave ha de tener al menos seis caracteres';
				
			} 
			if ( $_POST['clave1'] != $_POST['clave2'] ){
				$errores[] =  'Las claves tienen que ser iguales';
				
			} 
			}
			
			if ( $errores ) {

				mostrar_errores($errores);

				
?>
	<form action= "<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		
		<p>
			<label for=nombre>Nombre</label>
			<input type="text" name="nombre" value="<?= $_POST['nombre'] ?>">
		</p>
		<p>
			<label for=email>Email</label>
			<input type="email" name="email" value="<?= $_POST['email'] ?>">

		</p>
		<p>
			<label for=clave1>Clave</label>
			<input type="password" name="clave1">

		</p>
		<p>
			<label for=clave2>Repetir Clave</label>
			<input type="password" name="clave2">

		</p>


			<input type="submit" name="Enviar">
		</form>



<?php				

			}
			else{
				echo 'Todo correcto, usuario registrado';

			}
			
}
?>

</body>
</html>