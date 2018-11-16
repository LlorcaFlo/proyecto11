<?php
  session_start ();
        if (! isset($_SESSION['user']['id'])) {
            header('location:../Pagina/perfilrestringido.php');
        }
    spl_autoload_register(function($class){

        include '../Clases/' . $class . '.php';
    });

    $ent = new Entradas();

  if (isset($_GET['id'])) {

   $id=$_GET['id'];

      $ent->borrarentradas($id);

  } else { 

  	$id = $_GET['borra_todos'];

  	$ent->borrartodo($id);
  }

   header ('location:modificarpost.php');
