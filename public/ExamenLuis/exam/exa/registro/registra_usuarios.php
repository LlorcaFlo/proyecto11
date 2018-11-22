<?php


    /* $nombre = filtrar ( $_POST[ 'nombre' ] );
     $apellido = filtrar ( $_POST[ 'apellido' ] );
     $nick = filtrar ( $_POST[ 'nick' ] );
     $email = filtrar ( $_POST[ 'email' ] );
     $clave1 = filtrar ( $_POST[ 'clave1' ] );
     $clave2 = filtrar ( $_POST[ 'clave2' ] );*/

    //$pass_cifrado = password_hash ( $contrasenia, PASSWORD_DEFAULT, array ( 'cost' => 15 ) );
    //$pass_cifrado= password_hash($contrasenia, PASSWORD_DEFAULT, ['cost' => 13]);	También funciona así

    include '../conexion.php';
    //include '../funciones.php';

    $clave1 = md5 ( $clave1 );

    try {

        $sql = "INSERT INTO usuarios (nombre, apellidos, email, nickname, clave ) 
                VALUES (:usu, :ape, :mail, :nick, :pass)";

        $stmt = $dbh->prepare ( $sql );

        $stmt->execute ( array (

            ":usu" => $nombre,
            ":ape" => $apellido,
            ":mail" => $email,
            ":nick" => $nick,
            ":pass" => $clave1 ) );

    } catch ( Exception $e ) {

        if ( strpos ( $e->getMessage (), '23000' ) && strpos ( $e->getMessage (), 'nickname' ) ) {

            $errores[ 'nick' ] = 'Nick ya existe, introduce otro nick';

        } else if ( strpos ( $e->getMessage (), '23000' ) && strpos ( $e->getMessage (), 'email' ) ) {

            $errores[ 'email' ] = 'Email ya existe, introduce otra dirección';

        } else die ( "Error! " . $e->getCode () . " // " . $e->getMessage () . ' // ' . $e->getLine () );


    } finally {

        $dbh = null;

    }

    if ($errores) {

        include 'formulario_registro.php';

    } else {

        echo '<h1>Todo correcto, usuario registrado</h1><br>
              <p><a class="btn btn-outline-primary btn-sm" href="../login/formulario_login.php?logueo">Ir al login</a></p>
              <p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Ir a la web</a></p>
              <p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir la página principal</a></p>';
    }