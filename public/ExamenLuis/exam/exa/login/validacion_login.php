<?php
    include '../funciones.php';
    include '../conexion.php';

    $errores_login = [];

    if ( isset( $_POST[ 'submit_login' ] ) ) {

        $email = filtrar ( $_POST[ 'email_login' ] );
        $clave = filtrar ( $_POST[ 'clave_login' ] );

        if ( ! isset( $_POST[ 'email_login' ] ) || empty( $email ) ) {

            $errores_login [ 'email_login' ] = 'No hemos recibido el email';

        } else if ( ! isset( $_POST[ 'clave_login' ] ) || empty( $email ) ) {

            $errores_login [ 'clave_login' ] = '¿Has olvidado la clave?';

        } else {

            try {

                $sql = "SELECT * FROM usuarios WHERE email = :email AND clave = :clave";

                $stmt = $dbh->prepare ( $sql );

                $stmt->bindValue ( ":email", $email );
                $stmt->bindValue ( ":clave", md5 ( $clave ) );

                $stmt->execute ();

                if ( ! $stmt->rowCount () == 1 ) {

                    $sql = "SELECT * FROM usuarios WHERE email = :email";

                    $stmt = $dbh->prepare ($sql);

                    $stmt->bindValue ( ":email", $email );

                    $stmt->execute ();

                    $stmt->rowCount () == 1 ? $errores_login [ 'clave_login' ] = '¿Has olvidado la clave?' :
                        $errores_login [ 'email_login' ] = 'Email no existe';

                }

            } catch ( PDOException $e ) {

                die ( "Error: " . $e->getMessage () . ' // Linea: ' . $e->getLine () );
            }

        }

        if ($errores_login) {

            include 'formulario_login.php';

        } else {

            session_start();

            while ($fila = $stmt->fetch(PDO::FETCH_OBJ)) {
                $_SESSION[ 'usr' ][ 'id_usuario' ] = $fila->id_usuario;
                $_SESSION[ 'usr' ][ 'nombre' ] = $fila->nombre;
            }

            $stmt->closeCursor ();

            header('location:../web/zona_privada.php');
        }

    }

