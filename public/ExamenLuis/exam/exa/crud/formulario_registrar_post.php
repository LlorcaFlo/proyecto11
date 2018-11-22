<?php

    if (! $_POST) {

        session_start ();

        if ( ! isset( $_SESSION[ 'usr' ] [ 'nombre' ] ) ) {
            header ( 'location:../login/valida_sesion.php' );
        }
    }

?>

<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">


<form action="validacion_registrar_post.php" method="POST" enctype="multipart/form-data">

    <div class="col-3 col-offset-3">

            <!-- TITULO -->

            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="titulo"
                    <?php if (isset ($_POST['submit_registro_post'])) {
                        mostrar_campo ( 'titulo' );
                    } ?>
                >
                <?php if (isset ($_POST['submit_registro_post'])) {
                    mostrar_error_campo ( 'titulo', $errores );
                } ?>
            </div>

            <!-- CATEGORIAS -->

            <div class="form-group">
                <label for="categoria">Categorias</label>
                <select class="form-control" id="categoria" name="categoria">

                    <?php

                        include '../conexion.php';

                        try {

                            $sql = "SELECT * FROM categorias";
                            $categorias = $dbh->query ( $sql )->fetchAll ( PDO::FETCH_OBJ );

                            foreach ( $categorias as $categoria ) {

                                $cat = ucfirst ( $categoria->nombre );
                                echo '<option>' . " $cat " . '</option>';
                            }


                        } catch ( PDOException $e ) {

                            die ( 'Error! ' . $e->getMessage () . ' // Line->' . $e->getLine () );
                        }
                    ?>

                </select>
            </div>

            <!-- CONTENIDO -->

            <div class="form-group">
                <label for="contenido">Contenido</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="3"
                ><?php if ( isset( $_POST[ 'contenido' ] ) ) echo $_POST[ 'contenido' ]; ?></textarea>

                <?php if (isset ($_POST['pulsar'])) {
                    mostrar_error_campo ( 'contenido', $errores );
                } ?>
            </div>

        <!-- SUBMIT -->

        <div class="form-group">
            <button type="submit" class="btn" name="pulsar">Enviar</button>
        </div>

    </div>
</form>

<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_privada.php">Regresar a mi zona privada</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Ir a la web</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir a la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../login/logout.php">Cierra sesión</a></p>