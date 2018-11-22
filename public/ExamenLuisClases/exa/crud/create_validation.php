
<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">

<?php

    spl_autoload_register ( function ( $class ) {

        include '../models/' . $class . '.php';
    } );

    Session::start ();

    if ( ! Session::validateSession () ) header ( 'location:../web/warning_zona_restringida.php' );

    $v = new Validacion();

    $autor = Session::get ( 'nombre' );
    $id_usuario = Session::get ( 'id_usuario' );
    $fecha = date ( 'Y-m-d H:i:s' );

    $titulo = $v->validaIsset ( $_POST[ 'titulo' ] );
    $contenido = $v->validaIsset ( $_POST[ 'contenido' ] );

    if ( ! $titulo ) $v->errores [ 'titulo' ] = 'No hemos recibido el titulo';
    if ( ! $contenido ) $v->errores [ 'contenido' ] = 'No hemos recibido el contenido';
    if ( ! isset( $_POST[ 'categoria' ] ) ) $v->errores [ 'categoria' ] = 'No has elegido una categoria';
    else $categoria = $_POST[ 'categoria' ];


    if ( $v->errores ) include 'create_form.php';

    else {

        $slug = str_replace ( " ", "-", $titulo );

        try {

            $entrada = new Entrada();

            $id_cat_entrada = $entrada->getIdCategoria ( $categoria );
            $id_cat_titulo = $entrada->getIdCatTitulo ( $titulo );

            if ( $id_cat_entrada === $id_cat_titulo ) $v->errores [ 'titulo' ] = 'El titulo ya existe, introduce otro título';

            else {

                $datos_entrada = [

                    'titulo' => $titulo,
                    'slug' => $slug,
                    'autor' => $autor,
                    'contenido' => $contenido,
                    'categoria' => $categoria,
                    'fecha' => $fecha,
                    'id_usuario' => $id_usuario,
                    'id_categoria' => $id_cat_entrada
                ];

                $entrada->insert ( $datos_entrada );


            }

        } catch ( PDOException $e ) {

            echo ( 'Error! ' . $e->getMessage () . ' // Lineasss->' . $e->getLine () );
        }

        if ( $v->errores ) {

            include 'create_form.php';

        } else { ?>

<h2>Post registrado</h2>;

<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_privada.php">Regresar a mi zona privada</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Ir a la web</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir a la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../login/logout.php">Cierra sesión</a></p>



       <?php }

    }

