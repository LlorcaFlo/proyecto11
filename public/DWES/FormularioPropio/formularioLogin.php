<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<h3>Formulario Login</h3>
<div>
    
    <form action="index.php" method="POST">
    <label for="nick">Nick</label><br>
    <input type="text" id="nick" name="nick" placeholder="Nick Usuario"
    <?php mostrar_campo('nick') ?>>
    <?php mostrar_error_campo('nick', $errores) ?><br>

    <label for="email">Email</label><br>
    <input type="text" id="email" name="email" placeholder="Ejemplo1@ejemplo.com"
    <?php mostrar_campo('email') ?>>
	<?php mostrar_error_campo('email', $errores); ?><br>

    <label for="clave1">Contraseña</label><br>
    <input type="password" id="clave1" name="clave1" placeholder="Contraseña1">
	   <?php mostrar_error_campo('clave1', $errores); ?><br>

	  <label for="clave2">Repita Contraseña</label><br>
    <input type="password" id="clave2" name="clave2" placeholder="Contraseña2"><br>

    <input type="submit" value="Enviar">
</form>
</div>
<br><br><br>
<div id="uno">
<form>
<a href="paginapropia.php">Editar perfil</a>
<br>
<a href="index.php">Regresar al login</a>
  </form>

</div>
</body>
</html>
