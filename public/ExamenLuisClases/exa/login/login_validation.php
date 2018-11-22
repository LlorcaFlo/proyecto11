<?php

    spl_autoload_register ( function ( $class ) {

        include '../models/' . $class . '.php';
    } );

    if (isset($_POST['submit_login'])) {

        $v = new Validacion();

        $email = $v->validaIsset ($_POST['email_login']);
        $clave = $v->validaIsset ($_POST['clave_login']);

        if ( ! $email ) $v->errores [ 'email_login' ] = 'No hemos recibido el email';
        if ( ! $clave ) $v->errores [ 'clave_login' ] = '¿Has olvidado la clave?';

        if ($v->errores) include 'login_form.php';

        else {

            $user = new Usuario();

            try {

                $user_bd = $user->sigIn ( $email, $clave );

                if ( ! $user_bd ) $v->errores [ 'email_login' ] = 'Email o clave son incorrectos';

            } catch ( PDOException $e ) {

                echo ( 'Error! ' . $e->getMessage () . ' // Linea-> ' . $e->getLine () );
            }
        }

        if ($v->errores) include 'login_form.php';

        else {

            Session::start ();

            foreach ( $user_bd as $value ) {

                Session::set ( 'id_usuario', $value->id_usuario );
                Session::set ( 'nombre', $value->nombre );
            }

            header ( 'location:../web/zona_privada.php' );
        }

    }

