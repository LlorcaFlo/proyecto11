<?php

    session_start (); // Indicamos a esta página (al navegador) qué sesión tiene que cerrar
    session_destroy ();

?>

<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">

<h1>Acabas de salir de la sesión</h1>
<br>
<a class="btn btn-outline-primary btn-sm" href="../index.php">Regresar a la página principal</a>
<br><br>
<a class="btn btn-outline-primary btn-sm" href="formulario_login.php">Ir al login</a>