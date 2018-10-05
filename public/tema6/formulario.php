	<form action= "<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		
		<p>
			<label for=nombre>Nombre</label>
			<input type="text" name="nombre" value="">
		</p>
		<p>
			<label for=email>Email</label>
			<input type="email" name="email">

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