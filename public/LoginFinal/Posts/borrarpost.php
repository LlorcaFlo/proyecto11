<?php
session_start ();
 if (! isset($_SESSION['user']['id'])) {
            header('location:../Pagina/perfilrestringido.php');
 }

  include '../conexion.php';

  if (isset($_GET['id'])) {

   $id=$_GET['id'];

   $conexion->query("DELETE FROM entradas WHERE id_entradas = $id");

  } else { 

  	$id = $_GET['borra_todos'];

  	$conexion->query("DELETE FROM entradas WHERE id_usuario = $id");

  }

   header ('location:modificarpost.php');
