<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Css/estilo.css">
    <meta charset="utf-8">
	<title>Página Principal</title>
</head>
<body> 
<div class="col-3">
<br><h5 class="inicio">Página Principal</h5>
<?php
    session_start ();
    if(isset($_SESSION['user']['id']))
      {
      echo "<div><h4 style=\"text-align: center; color:rgba(200,200,50,0.9);\">" . $_SESSION['user']['nombre'] . "</h4></div>";
          }
       ?>
 <div class="form-group">
     <br>
     <p class="inicio">Si aún no eres usuario:</p><br>
    <a class="btn" href="Registro/formularioregistro.php">Registrate</a>
    <br><br>
    <p class="inicio">Si eres usuario:</p><br>
    <a class="btn" href="Login/formulariologin.php">Inicia sesión</a>
  <br><br>
    <p class="inicio">¿Estas logueado?, visita tu perfil.</p><br>
    <a class="btn" href="Pagina/perfil.php">Mi página</a>
<br><br>
    <p class="inicio">Mira los post publicados sin necesidad de estar logueado.</p><br>
    <a class="btn" href="Pagina/accesopublico.php">Acceso Publico</a>
<br><br>
</div>
</div>
</body>
</html>