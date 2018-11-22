<?php

    spl_autoload_register ( function ( $class ) {

        include '../models/' . $class . '.php';
    } );

    Session::start ();

    if ( Session::validateSession () === false) header ( 'location:../login/warning_zona_restringida.php' );

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

    echo "<h1>Bienvenid@ " . Session::get ( 'nombre' ) . "</h1><br>";

    $id_user = Session::get ('id_usuario');


    try {

        $entrada = new Entrada();

        $registros = $entrada->getEntradasUsuario ($id_user);

    } catch ( PDOException $e ) {

        echo ( 'Error! ' . $e->getMessage () . ' // ' . $e->getLine () );

    }

?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Titulo</th>
        <th scope="col">Categoria</th>
        <th scope="col">Contenido</th>
    </tr>
    </thead>
    <tbody>

    <?php

        foreach ( $registros as $registro ) : ?>
            <tr>
                <td><?= $registro->titulo ?></td>
                <td><?= $registro->categoria ?></td>
                <td><?= $registro->contenido ?></td>

                <td><a href="../crud/delete.php?id=<?= $registro->id_post ?>">
                        <input type='button' class="btn btn-danger" name='del' id='del' value='Borrar'></a>
                </td>
                <td><a href="../crud/update_form.php?id=<?= $registro->id_post ?>& titulo=<?= $registro->titulo ?>&
                    contenido=<?= $registro->contenido ?>& categoria=<?= $registro->categoria ?>">
                        <input type='button' class="btn btn-warning" name='actualizar' id='actualizar' value='Editar'></a>
                </td>
            </tr>

        <?php
        endforeach;
    ?>

    </tbody>
</table>

<a href="../crud/create_form.php">
    &nbsp;<input type='button' class="btn btn-primary" name='crear' id='crear' value='Crear Post'></a>

<a href="../crud/delete.php?del_todos=<?= $id_user ?>">
    <input type='button' class="btn btn-danger" name='del_all' id='del_all' value='Borrar todo'></a><br><br>

<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_privada.php">Regresar a mi zona privada</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Ir a la web</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir a la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../login/logout.php">Cierra sesión</a></p>

</body>
</html>