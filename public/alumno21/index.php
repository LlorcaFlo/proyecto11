<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Css/estilo.css">
    <meta charset="utf-8">
	<title>Página Principal</title>
</head>
<body> 
<div class="col-4">
<br><div><p>Página Principal</p>
<?php
    session_start ();
    if(isset($_SESSION['user']['id']))
      {
      echo "<p>" . $_SESSION['user']['nickname'] . "<br></p>";
          }
       ?>
       </div><br>
     </div><br>
 <div class="col-4"><br>
  <div>
    <br>
    <p class="inicio">Inicia Sesion</p><br>
    <a class="btn" href="Login/formulariologin.php">Inicia sesión</a>
  <br><br>
    <p class="inicio">¿Estas logueado?, visita tu perfil.</p><br>
    <a class="btn" href="Pagina/perfil.php">Mi página</a>
<br><br>
    <p class="inicio">Visita los productos que tenemos en nuestra página.</p><br>
    <a class="btn" href="Pagina/accesopublico.php">Acceso Publico</a><br><br>
<br>
</div><br>
</div>
</body>
</html>