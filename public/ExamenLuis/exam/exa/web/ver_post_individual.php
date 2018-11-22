<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formularios Usables</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">


</head>
<body>


<?php

    include '../conexion.php';

    $id = $_GET[ 'id' ];

    try {

        $sql = "SELECT * FROM entradas WHERE  id_post = $id";

        $registros = $dbh->query ( $sql )->fetchAll ( PDO::FETCH_OBJ );


        foreach ( $registros as $entrada ) {

            $id = $entrada->id_post;

            echo
                '<br>Titulo: ' . $entrada->titulo . '<br>' .
                'Autor: ' . $entrada->autor . '<br>' .
                'Categoria: ' . $entrada->categoria . '<br>' .
                'Fecha: ' . $entrada->fecha . '<br>' .
                'Contenido: ' . $entrada->contenido . '<br>' .
                '------------------------------------------';

        }

    } catch ( PDOException $e ) {

        die( 'Error! ' . $e->getMessage () . ' // Linea->' . $e->getLine () );

    }
?>

<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Regresar a la web</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="zona_privada.php">Ir a mi zona privada</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir a la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../login/logout.php">Cierra sesión</a></p>

</body>
</html>