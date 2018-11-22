<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/estilo.css">

<?php 

session_start ();

   if (! isset($_SESSION['user']['id'])) {
        header('location:../Pagina/perfilrestringido.php');
    }
	include '../conexion.php';
