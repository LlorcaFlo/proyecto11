<?php

    spl_autoload_register ( function ( $class ) {

        include '../models/' . $class . '.php';
    } );

    Session::start ();

    if ( ! Session::validateSession () ) header ( 'location:../login/warning_zona_restringida.php' );

    if ( ! isset( $_POST[ 'editar' ] ) ) {

        $id_post = $_GET[ 'id' ];
        $titulo = $_GET[ 'titulo' ];
        $contenido = $_GET[ 'contenido' ];
        $categoria = $_GET[ 'categoria' ];
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


<!-- OJO!! los values van entrecomillados -->

<h1>Editar</h1>
<form method="post" action="update_validation.php">

    <div class="col-5 col-offset-5">

        <div class="form-group">
            <label for="id"></label>
            <input type="hidden" class="form-control" id="id" name="id" value="<?= $id_post ?>">
        </div>

        <div class="form-group">
            <label for="categoria"></label>
            <input type="hidden" class="form-control" id="categoria" name="categoria" value="<?= $categoria ?>">
        </div>

        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $titulo ?>"
                <?php if ( isset ( $_POST[ 'editar' ] ) ) {
                    $v->mostrar_campo ( 'titulo_editar' );
                } ?>
            >
            <?php if ( isset ( $_POST[ 'editar' ] ) ) {
                $v->mostrar_error_campo ( 'titulo_editar', $v->errores );
            } ?>
        </div>

        <div class="form-group">
            <label for="contenido">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" rows="3"
            ><?= $contenido ?></textarea>

            <?php if ( isset ( $_POST[ 'editar' ] ) ) {
                $v->mostrar_error_campo ( 'contenido_editar', $v->errores );
            } ?>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="editar">Editar</button>
        </div>
    </div>

</form>

<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_privada.php">Regresar a mi zona privada</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Ir a la web</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir a la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../login/logout.php">Cierra sesión</a></p>
</body>
</html>

