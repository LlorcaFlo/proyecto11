 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
<meta charset="utf-8">

<?php
    session_start (); // Indicamos a esta página (al navegador) qué sesión tiene que cerrar
    session_destroy ();
?>

<div class="col-6">
<div class="form-group">
<h5><br>Has cerrado la sesión</h5>
<br>
<br><a class="btn" href="../paginaprincipal.php">Inicio</a>
<br><br>
<br><a class="btn" href="../Pagina/accesopublico.php">Acceso Publico</a>
<br><br>
</div>
</div>
