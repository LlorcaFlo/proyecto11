<?php


include 'models/Usuario.php';


echo "test de conexión: <br>";

$db = new Dbpdo();


echo "<pre>";

$usuario = new Usuario;

print_r($usuario->all());


//print_r($db->getConnection());

 ?>
