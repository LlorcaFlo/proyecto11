<?php

    spl_autoload_register ( function ( $class ) {

        include '../models/' . $class . '.php';
    } );

    Session::start ();

    if ( ! Session::validateSession () ) header ( 'location:../login/warning_zona_restringida.php' );

    if ( isset( $_GET[ 'del_todos' ] ) ) {

        $id = Session::get ('id_usuario');

        try {

            $entrada = new Entrada();

            $datos_id = ['id_usuario' => $id];

            $entrada->delete ($datos_id);

        } catch (PDOException $e){

            echo 'Error! ' . $e->getMessage () . ' // Linea-> ' . $e->getLine ();
        }

    } else {

        $id_post = $_GET[ 'id' ];

        try {

            $entrada = new Entrada();

            $entrada->deleteEntrada ($id_post);

        } catch (PDOException $e){

            echo 'Error! ' . $e->getMessage () . ' // Linea-> ' . $e->getLine ();
        }

    }

    header ( 'location:../web/zona_privada.php' );


