<form>
	<?php
include 'opciones.php';

// Si NO EXISTE $_POST reenviara el fromulario
if (! $_POST) {

		include 'formularioLogin.php';
}
//Si EXISTE entonces tendrá que validar los datos
else{
		include 'validaciones.php';
		}

?>











<br><br><br>
<a href="formulario_usu.html">Editar perfil</a>
<br>
<a href="formularioLogin.php">Regresar al login</a>
</form>