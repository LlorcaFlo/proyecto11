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
        return preg_match ( '/^([A-ZÁÉÍÓÚ]{1}[\']?[A-Za-zñáéíóú]{2,}[\s]*[-]?)+$/', $nombre );
    }

    function apellidoValido ( $apellido )
    {
        return preg_match ( '/^([A-ZÁÉÍÓÚ]{1}[\']?[a-zñáéíóú]{2,}[\s]*[-]?)+$/', $apellido );
    }

    function nickValido ( $nick )
    {
        return preg_match ( '/([A-ZÁÉÍÓÚa-zñáéíóú@#&%,\.\-\*\d][\s]*){3,20}$/', $nick );
    }


    function emailValido ( $email )
    {
        $mail = filter_var ( $email, FILTER_SANITIZE_EMAIL );

        $resultado = ( false !== filter_var ( $mail, FILTER_VALIDATE_EMAIL ) );

        if ( $resultado ) return checkdnsrr ( explode ( '@', $email )[ 1 ], 'MX' );

        return $resultado;
    }


    function passwordValido ( $password )
    {
        return preg_match ( '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#&%,\.\-\*])[\w@#&%,\.\-\*]{6,}/', $password );
    }

