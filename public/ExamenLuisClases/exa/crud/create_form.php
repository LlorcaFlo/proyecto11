<?php

    if ( ! $_POST ) {

        spl_autoload_register ( function ( $class ) {

            include '../models/' . $class . '.php';
        } );

        Session::start ();

        if ( ! Session::validateSession () ) header ( 'location:../web/warning_zona_restringida.php' );
    }


?>

<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">

<h1>Publica una nueva entrada</h1>

<form action="create_validation.php" method="POST" enctype="multipart/form-data">

    <div class="col-3 col-offset-3">

        <!-- TITULO -->

        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="titulo"
                <?php if ( isset ( $_POST[ 'submit_registro_post' ] ) ) {
                    $v->mostrar_campo ( 'titulo' );
                } ?>
            >
            <?php if ( isset ( $_POST[ 'submit_registro_post' ] ) ) {
                $v->mostrar_error_campo ( 'titulo', $v->errores );
            } ?>
        </div>

        <!-- CATEGORIAS -->

        <div class="form-group">
            <label for="categoria">Categorias</label>
            <select class="form-control" id="categoria" name="categoria">
                <option value="1" disabled selected>Elige una opción</option>
                <?php

                    try {

                        $entrada = new Entrada();

                        $categorias = $entrada->getCategorias ();

                        foreach ( $categorias as $categoria ) {

                            $cat = ucfirst ( $categoria->nombre );
                            echo '<option>' . " $cat " . '</option>';
                        }


                    } catch ( PDOException $e ) {

                        die ( 'Error! ' . $e->getMessage () . ' // Line->' . $e->getLine () );
                    }
                ?>

            </select>
            <?php if ( isset ( $_POST[ 'submit_registro_post' ] ) ) {
                $v->mostrar_error_campo ( 'categoria', $v->errores );
            } ?>
        </div>

        <!-- CONTENIDO -->

        <div class="form-group">
            <label for="contenido">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" rows="3"
            ><?php if ( isset( $_POST[ 'contenido' ] ) ) echo $_POST[ 'contenido' ]; ?></textarea>

            <?php if ( isset ( $_POST[ 'submit_registro_post' ] ) ) {
                $v->mostrar_error_campo ( 'contenido', $v->errores );
            } ?>
        </div>

        <!-- SUBMIT -->

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit_registro_post">Enviar</button>
        </div>

    </div>
</form>

<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_privada.php">Regresar a mi zona privada</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Ir a la web</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir a la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../login/logout.php">Cierra sesión</a></p>