<?php
$root='root'; // si mi usario fuese Jose...
$pass="";	 // pass de Usuario...


$datosbd = 'mysql:host=localhost; dbname=examen; charset=utf8';

// $opciones = [
// 	PDO::ATTR_PERSISTENT => true,
// 	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
// 			];
 try {

        $conexion = new PDO ($datosbd, $root, $pass /*,$opciones*/);
        
        $conexion->setAttribute(PDO::ATTR_PERSISTENT,true);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo ('Conexion erronea' . $e->getMessage() . ' // ' . $e->getLine());
    }

  ?>