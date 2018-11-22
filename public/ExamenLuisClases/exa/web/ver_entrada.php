<?php

    spl_autoload_register ( function ( $class ) {

        include '../models/' . $class . '.php';
    } );

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">


</head>
<body>

<table>

<?php

    $id = $_GET[ 'id' ];

    echo '<h3 style="color:green">Post nº ' . $id . '</h3>';

    try {

        $entrada = new Entrada();

        $registros = $entrada->getPostIndividual ($id);

        foreach ( $registros as $registro ) {

            echo
                '<h3 style="color:cornflowerblue">' . $registro->titulo. '</h3>' .
                '<span>por </span><span style="color:orange">' . $registro->autor . '</span>' . ' >> ' .  $registro->fecha .
                '<p>Categoria: ' . $registro->categoria . '</p>' .
                'Contenido: ' . $registro->contenido . '<br>' .
                '------------------------------------------';

        }

    } catch ( PDOException $e ) {

        die( 'Error! ' . $e->getMessage () . ' // Linea->' . $e->getLine () );

    }
?>

</table>

<p>&nbsp;<a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Regresar a la web</a></p>
<p>&nbsp;<a class="btn btn-outline-primary btn-sm" href="zona_privada.php">Ir a mi zona privada</a></p>
<p>&nbsp;<a class="btn btn-outline-primary btn-sm" href="../index.php">Ir a la página principal</a></p>
<p>&nbsp;<a class="btn btn-outline-primary btn-sm" href="../login/logout.php">Cierra sesión</a></p>

</body>
</html>