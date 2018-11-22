<?php

    spl_autoload_register ( function ( $class ) {

        include '../models/' . $class . '.php';
    } );

?>


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
    <div>
        <label for="post">Introduce un término de búsqueda</label>
        <input type="text" id="post" name="termino_busqueda" required>
        <label for="seleccion"></label>
        <select id="seleccion" name="opcion">
            <option value="1" disabled selected>Elige una opción</option>
            <option value="titulo">Titulo</option>
            <option value="contenido">Contenido</option>
            <option value="categoria">Categoría</option>
        </select>
        &nbsp;<input type="submit" name="boton_busqueda" id="boton_busqueda" value="Busca">
    </div>
</form>


<?php

    include '../funciones.php';

    $entrada = new Entrada ();

    if ( isset( $_POST[ 'boton_busqueda' ] ) ) {

        $terminoBusqueda = filtrar ( $_POST[ 'termino_busqueda' ] );

        if ( ! isset( $_POST[ 'termino_busqueda' ] ) || empty( $terminoBusqueda ) ) {

            echo '<h5 style="color:red">Introduce un término de búsqueda</h5>';

        } else if ( ! isset( $_POST[ 'opcion' ] ) ) {

            echo '<h5 style="color:red">Introduce una opción</h5>';

        } else {

            $opcion = $_POST[ 'opcion' ];

            try {

                $registros = $entrada->search ( $opcion, $terminoBusqueda );

                if ( ! $registros ) {

                    echo '<h5 style="color:red">No se encontraron coincidencias en la búsqueda</h5>';

                } else {

                    foreach ( $registros as $registro ) {

                        echo
                            '<br>Titulo: ' . $registro->titulo . '<br>' .
                            'Autor: ' . $registro->autor . '<br>' .
                            'Categoria: ' . $registro->categoria . '<br>' .
                            'Fecha: ' . $registro->fecha . '<br>' .
                            'Contenido: ' . $registro->contenido . '<br>' .
                            '------------------------------------------';
                    }
                }

            } catch ( PDOException $e ) {

                echo ( 'Error! ' . $e->getMessage () . ' // Linea->' . $e->getLine () );
            }
        }

    } else {

        try {

            $registros = $entrada->all ();

            $entrada->verAllEntradas ($registros);

        } catch ( PDOException $e ) {

            echo ( 'Error! ' . $e->getMessage () . ' // Linea->' . $e->getLine () );
        }
    }


?>

<br><br>
<p><a class="btn btn-outline-primary btn-sm" href="zona_privada.php">Ir a mi zona privada</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir a la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../login/logout.php">Cierra sesión</a></p>

<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery-3.3.1.min.js"></script>

</body>
</html>

