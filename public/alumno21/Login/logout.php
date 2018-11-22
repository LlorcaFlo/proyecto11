 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
<meta charset="utf-8">
<title>Cierre Sesión</title>

<?php

    session_start (); // Indicamos a esta página (al navegador) qué sesión tiene que cerrar
    session_destroy ();//Destruimos la sesión...

?>

<div class="col-3">
<br><br>
<div class="form-group">
<p><br>Has cerrado la sesión</p>
<br><br>
<p>Vuelva al inicio</p>
<br><a class="btn" href="../index.php">Inicio</a>
<br><br>
<p>Vaya al acceso público</p>
<br><a class="btn" href="../Pagina/accesopublico.php">Acceso Publico</a>
<br><br>
</div>
<br><br>
</div>
