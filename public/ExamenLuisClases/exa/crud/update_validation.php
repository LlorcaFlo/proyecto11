<?php

    spl_autoload_register ( function ( $class ) {

        include '../models/' . $class . '.php';
    } );

    Session::start ();

    if ( ! Session::validateSession () ) header ( 'location:../login/warning_zona_restringida.php' );

    include '../funciones.php';

    if ( isset( $_POST[ 'editar' ] ) ) {

        $id_usuario = Session::get ( 'id_usuario' );

        $v = new Validacion();


        $categoria = $_POST[ 'categoria' ];
        $id_post = $_POST[ 'id' ];
        $titulo = $v->validaIsset ( $_POST[ 'titulo' ] );
        $contenido = $v->validaIsset ( $_POST[ 'contenido' ] );

        if ( ! $titulo ) $v->errores[ 'titulo_editar' ] = 'No hemos recibido el titulo';
        if ( ! $contenido ) $v->errores[ 'contenido_editar' ] = 'No hemos recibido el contenido';

        if ( $v->errores ) {

            include 'update_form.php';

        } else {

            $datos_editar = [
                'titulo' => $titulo,
                'contenido' => $contenido
            ];

            $target_editar = [ 'id_post' => $id_post ];

            try {

                $entrada = new Entrada();

                // Devuelve el id_usuario de una entrada si ésta tiene el mismo titulo en la misma categoría
                $id_usu = $entrada->validaTitulo ( $titulo, $categoria );


                // Si el id_usuario es distinto del que está editando
                if ( $id_usu && $id_usu !== $id_usuario ) {

                    $v->errores [ 'titulo_editar' ] = 'El titulo ya existe';

                } else { // Es el mismo usuario que está editando y puede editar el titulo

                    $entrada->update ( $datos_editar, $target_editar );

                    header ( 'location:../web/zona_privada.php' );
                }


            } catch ( PDOException $e ) {

                echo ( 'Error ' . $e->getMessage () . ' // Linea-> ' . $e->getLine () );
            }
        }

        if ( $v->errores ) {

            include 'update_form.php';

        }

    }


