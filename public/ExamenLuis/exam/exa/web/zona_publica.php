<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formularios Usables</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/buscador.css">


</head>
<body>

<h1>Zona pública</h1>

<br><br>


<form class="buscador" action="<?= $_SERVER[ 'PHP_SELF' ] ?>" method="post">
    <label for="post">Introduce un término de búsqueda</label>
    <input type="text" id="post" name="termino">
    <label for="seleccion"></label>
    <select id="seleccion" name="opcion">
        <option value="1" disabled selected>Elige una opción</option>
        <option value="titulo">Titulo</option>
        <option value="contenido">Contenido</option>
        <option value="categoria">Categoría</option>
    </select>
    &nbsp;<input type="submit" name="boton_busqueda" id="boton_busqueda" value="Busca">
</form>


<?php

    include '../conexion.php';
    include '../funciones.php';

    if ( isset( $_POST[ 'boton_busqueda' ] ) ) {

        $terminoBusqueda = filtrar ( $_POST[ 'termino' ] );

        $opcion = filtrar ( $_POST[ 'opcion' ] );

        try {

            $sql = "SELECT * FROM entradas WHERE $opcion LIKE :terminoBusqueda";

            $stmt = $dbh->prepare ( $sql );

            $stmt->bindValue ( ":terminoBusqueda", "%$terminoBusqueda%" );

            $stmt->execute ();

            while ( $fila = $stmt->fetch ( PDO::FETCH_OBJ ) ) {

                echo
                    '<br>Titulo: ' . $fila->titulo . '<br>' .
                    'Autor: ' . $fila->autor . '<br>' .
                    'Categoria: ' . $fila->categoria . '<br>' .
                    'Fecha: ' . $fila->fecha . '<br>' .
                    'Contenido: ' . $fila->contenido . '<br>' .
                    '------------------------------------------';
            }

        } catch ( PDOException $e ) {

            die( 'Error! ' . $e->getMessage () . ' // Linea->' . $e->getLine () );

        }


    } else {

        try {

            $sql = "SELECT * FROM entradas";

            $registros = $dbh->query ( $sql )->fetchAll ( PDO::FETCH_OBJ );

            foreach ( $registros as $entrada ) {

                $id = $entrada->id_post;

                echo
                    '<br>Titulo: ' . $entrada->titulo . '<br>' .
                    'Autor: ' . $entrada->autor . '<br>' .
                    'Fecha: ' . $entrada->fecha . '<br>' .
                    '<a href="ver_post_individual?id=' . $id . '">Ir al post</a><br>' .
                    '------------------------------------------';

            }

        } catch ( PDOException $e ) {

            die( 'Error! ' . $e->getMessage () . ' // Linea->' . $e->getLine () );

        }


    }


?>


<br><br>
<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Regresar a la web</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="zona_privada.php">Ir a mi zona privada</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir a la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../login/logout.php">Cierra sesión</a></p>

<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery-3.3.1.min.js"></script>

</body>
</html>

