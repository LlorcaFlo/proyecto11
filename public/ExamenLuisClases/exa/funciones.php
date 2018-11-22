<?php

    $errores = [];

    function mostrar_errores ( $errores )
    {
        echo '<ul class="listaerrores">';
        foreach ( $errores as $error ) {
            echo "<li>$error</li>";
        }
        echo '</ul>';
    }

    function mostrar_campo ( $campo )
    {
        if ( isset( $_POST[ $campo ] ) ) {
            echo ' value="' . $_POST[ $campo ] . '"';
        }
    }

    function mostrar_error_campo ( $campo, $errores )
    {
        if ( isset( $errores[ $campo ] ) ) {
            echo '<span class="errorf">' . $errores[ $campo ] . '</span>';
        }
    }

    function filtrar ( $datos )
    {
        $datos = trim ( $datos );
        $datos = stripslashes ( $datos );
        $datos = htmlspecialchars ( $datos );
        return $datos;
    }

    function nombreValido ( $nombre )
    {
        return preg_match ( '/^([A-ZÁÉÍÓÚ]{1}[A-Za-zñáéíóú]{2,}[\sdel]*[-]?)+$/', $nombre );
    }

    function apellidoValido ( $apellido )
    {
        return preg_match ( '/^([A-ZÁÉÍÓÚ]{1}[\']?[a-zñáéíóú]{2,}[\sdelasy]*[-]?)+$/', $apellido );
    }

    function nickValido ( $nick )
    {
        return preg_match ( '/([A-ZÁÉÍÓÚa-zñáéíóú@#&%,\.\-\*\d][\s]*){3,20}$/', $nick );
    }

    function sanitizeEmail ( $data )
    {
        return filter_var ( $data, FILTER_SANITIZE_EMAIL );
    }

    function validateEmail ( $data )
    {
        return filter_var ( $data, FILTER_VALIDATE_EMAIL );
    }

    function checkEmail ( $data )
    {
        return checkdnsrr ( explode ( '@', $data )[ 1 ], 'MX' );
    }

    function emailValido ( $email )
    {
        $email = sanitizeEmail ( $email );
        $email = validateEmail ( $email );

        return $email ? checkEmail ( $email ) : $email;
    }

    function passwordValido ( $password )
    {
        //return preg_match ( '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#&%,\.\-\*])[\w@#&%,\.\-\*]{6,}/', $password );
        return true;
    }

    function validaIsset ($data)
    {
        $data_filtrado = filtrar ($data);

        return ! isset( $data ) || empty( $data_filtrado) ? false : $data;

    }

