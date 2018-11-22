<?php

    spl_autoload_register ( function ( $class ) {

        include '../models/' . $class . '.php';
    } );

    Session::start ();
    Session::destroy ();
?>

<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">

<h1>Acabas de salir de la sesión</h1>
<br>
<a class="btn btn-outline-primary btn-sm" href="../index.php">Regresar a la página principal</a>
<br><br>
<a class="btn btn-outline-primary btn-sm" href="login_form.php">Ir al login</a>