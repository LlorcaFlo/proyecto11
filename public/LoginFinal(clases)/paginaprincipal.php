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
<br><p>Página Principal</p><br>
<?php
    session_start ();
    
    if(isset($_SESSION['user']['id']))
      {
      echo "<div><p>" . $_SESSION['user']['nick'] . "</p></div>";
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
<br>
</div>
</body>
</html>