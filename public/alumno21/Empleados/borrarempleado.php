<?php
  session_start ();
        if (! isset($_SESSION['user']['id'])) {
            header('location:../Pagina/perfilrestringido.php');
        }

  spl_autoload_register(function($class){

        include '../Clases/' . $class . '.php';
    });

    $usu = new Usuario();

$rol = $_SESSION['user']['rol'];
$id_jefe = $_SESSION['user']['id'];


if($rol == "Jefe"){
$id=$_GET['id'];

$usu->pasarproductos($id_jefe, $id);

$usu->borrarusuario($id);
} else {
  echo ' No tienes derechos para realizar esta accion';
 }
  	header ('location:muestraempleados.php');
