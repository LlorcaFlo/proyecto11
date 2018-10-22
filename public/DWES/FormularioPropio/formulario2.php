<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Formulario Registro</h3>

<div>
<!-- <img style="float:right;" src="../Imagenes/DarthVaderFormulario.jpg"></img> -->
  <form action="index.php" method="POST">


    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre"
    <?php mostrar_campo('nombre') ?>>
    <?php mostrar_error_campo('nombre', $errores) ?><br>

    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="apellido" placeholder="Apellido"
    <?php mostrar_campo('apellido') ?>>
	<?php mostrar_error_campo('apellido', $errores) ?><br>

    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Ejemplo1@ejemplo.com"
    <?php mostrar_campo('email') ?>>
	<?php mostrar_error_campo('email', $errores); ?><br>

    <label for="clave1">Contraseña</label>
    <input type="password" id="clave1" name="clave1" placeholder="Contraseña1">
	<?php mostrar_error_campo('clave1', $errores); ?><br>

	<label for="clave2">Repita Contraseña</label>
    <input type="password" id="clave2" name="clave2" placeholder="Contraseña2"><br>

    <label for="codigopostal">Código Postal</label>
	<input type="text" name="codigopostal" placeholder="00000" id="codigopostal"
	<?php mostrar_campo('codigopostal') ?>>
	<?php mostrar_error_campo('codigopostal', $errores); ?><br>

	<label for="telefono">Teléfono</label>
	<input type="text" name="telefono" placeholder="000000000" size="7" id="telefono"
	<?php mostrar_campo('telefono') ?>>
	<?php mostrar_error_campo('telefono', $errores); ?><br>

    <label for="pais">Pais</label>
    <select id="pais" name="Pais">
    	<option value=" "></option>
      <option value="Alemania">Alemania</option>
      <option value="España">España</option>
      <option value="Francia">Francia</option>
      <option value="Italia">Italia</option>
    </select><br>

    <input type="submit" value="Enviar">
</div>

</body>
</html>
