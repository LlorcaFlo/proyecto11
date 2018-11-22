<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
  <meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<form action="index.php" method="post">
  
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="nombre" class="form-control" nombre="nombre"
      placeholder="Introduce tu nombre" 
      <?php mostrar_campo('nombre') ?> 
      >
      <?php mostrar_error_campo('nombre', $errores); ?>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" nombre="email"
      placeholder="Introduce tu email" 
      <?php mostrar_campo('email') ?>>
      <?php mostrar_error_campo('email', $errores); ?>
  </div>
  <div class="form-group">
    <label for="clave1">Contraseña</label>
    <input type="password" class="form-control" nombre="clave1" 
      placeholder="Contraseña"
      <?php mostrar_campo('clave1') ?>>
      <?php mostrar_error_campo('clave1', $errores);?>
  </div>
  <div class="form-group">
    <label for="clave2">Repita Contraseña</label>
    <input type="password" class="form-control" nombre="clave2" 
      placeholder="Repita Contraseña">
  </div>

  <button type="submit" class="btn btn-default">Enviar</button>
</form>



</body>
</html>