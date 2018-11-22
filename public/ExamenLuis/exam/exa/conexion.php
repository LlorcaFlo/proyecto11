<?php

    $dsn = 'mysql:host=localhost; dbname=pruebas; charset=utf8';

    $options = [PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try {

        $dbh = new PDO ($dsn, 'root', '', $options);
        //$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (Exception $e) {
        die ('Error de conexion' . $e->getMessage() . ' // ' . $e->getLine());
    }
