<?php

    session_start ();

    if ( ! isset( $_SESSION[ 'usr' ] [ 'nombre' ] ) ) {
        header ( 'location:../login/valida_sesion.php' );
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">


</head>
<body>

<?php

    $id_user = $_SESSION[ 'usr' ][ 'id_usuario' ];

    include '../conexion.php';

    try {

        $sql = "SELECT * FROM entradas WHERE id_usuario = $id_user";

        $registros = $dbh->query ( $sql )->fetchAll ( PDO::FETCH_OBJ );

    } catch ( PDOException $e ) {

        die( 'Error! ' . $e->getMessage () . ' // ' . $e->getLine () );

    }

?>

<h1>Editar Borrar Post</h1>
<form method="post" action="<?= $_SERVER[ 'PHP_SELF' ]; ?>">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Titulo</th>
        </tr>
        </thead>
        <tbody>

        <?php

            foreach ( $registros as $entrada ) : ?>
                <tr>
                    <td><?= $entrada->id_post ?></td>
                    <td><?= $entrada->titulo ?></td>

                    <td><a href="eliminar_entrada.php?id=<?= $entrada->id_post ?>">
                            <input type='button' class="btn btn-danger" name='del' id='del' value='Borrar'></a>
                    </td>
                    <td><a href="editar_entrada.php?id=<?= $entrada->id_post ?>& titulo=<?= $entrada->titulo ?>&
                    contenido=<?= $entrada->contenido ?>">
                            <input type='button' class="btn btn-warning" name='actualizar' id='actualizar' value='Editar'></a>
                    </td>
                </tr>

            <?php
            endforeach;
        ?>
        <tr>
            <td class='bot'><a href="eliminar_entrada.php?del_todos=<?= $id_user ?>">
                    <input type='button' class="btn btn-danger" name='del_all' id='del_all' value='Borrar todo'></a></td>
        </tr>
        </tbody>
    </table>
</form>

<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_privada.php">Regresar a mi zona privada</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Ir a la web</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir a la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../login/logout.php">Cierra sesión</a></p>

</body>
</html>