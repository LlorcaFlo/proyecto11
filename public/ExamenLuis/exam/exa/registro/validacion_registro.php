

<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">

<?php

    include '../funciones.php';

    // $errores = [];

    if ( isset( $_POST[ 'submit_registro' ] ) ) {

        $nombre = filtrar ( $_POST[ 'nombre' ] );
        $apellido = filtrar ( $_POST[ 'apellido' ] );
        $nick = filtrar ( $_POST[ 'nick' ] );
        $email = filtrar ( $_POST[ 'email' ] );
        $clave1 = filtrar ( $_POST[ 'clave1' ] );

        // Procesamos el formulario de registro

        // NOMBRE
        if ( ! isset( $_POST[ 'nombre' ] ) || empty( $nombre ) ) {
            $errores[ 'nombre' ] = 'No hemos recibido el nombre';

        } elseif ( ! nombreValido ( $nombre ) ) {
            $errores[ 'nombre' ] = 'El nombre debe tener al menos tres letras y empezar en mayúsculas';
        }

        //APELLIDOS
        if ( ! isset( $_POST[ 'apellido' ] ) || empty( $apellido ) ) {
            $errores[ 'apellido' ] = 'No hemos recibido el apellido';

        } elseif ( ! apellidoValido ( $apellido ) ) {
            $errores[ 'apellido' ] = 'El apellido debe tener al menos tres letras y empezar en mayúsculas';
        }

        //NICK
        if ( ! isset( $_POST[ 'nick' ] ) || empty( $nick ) ) {
            $errores[ 'nick' ] = 'No hemos recibido el nickname';

        } elseif ( ! nickValido ( $nick ) ) {
            $errores[ 'nick' ] = 'El nick puede tener letras, números y caracteres no alfanuméricos';
        }

        // CORREO ELECTRÓNICO
        if ( ! isset( $_POST[ 'email' ] ) || empty( $email ) ) {
            $errores[ 'email' ] = 'No hemos recibido el email';

        } elseif ( ! emailValido ( $email ) ) {
            $errores[ 'email' ] = 'El email no es válido';
        }

        // PASSWORD
        if ( ! isset( $_POST[ 'clave1' ] ) || ! isset( $_POST[ 'clave2' ] ) || empty( $clave1 ) ) {
            $errores[ 'clave1' ] = 'No hemos recibido ambas claves';

        } else {

            if ( ! passwordValido ( $clave1 ) ) {
                $errores[ 'clave1' ] = 'La clave de seis caracteres mínimo, debe tener al menos una letra 
                                    mayúscula, una minúscula, un número y un carácter no alfanumérico';

            } elseif ( $_POST[ 'clave1' ] != $_POST[ 'clave2' ] ) {
                $errores[ 'clave1' ] = 'Las claves tienen que ser iguales';
            }
        }

        if ( $errores ) {

            // echo ('hola');

            include 'formulario_registro.php';

        } else {

            include 'registra_usuarios.php';
        }


    }










