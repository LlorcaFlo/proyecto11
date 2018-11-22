<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<?php

    spl_autoload_register (function ($class)) {
        include '../models/' . $class . '.php';
    } );

    if (isset($_POST['submit_registro'])) {

        $v = new Validacion();

        $nombre = $v->validaIsset ($_POST[ 'nombre' ]);
        $apellidos = $v->validaIsset ($_POST['apellidos']);
        $nick = $v->validaIsset ($_POST['nickname']);
        $email = $v->validaIsset ($_POST['email']);
        $clave1 = $v->validaIsset ($_POST['clave1']);
        $clave2 = $v->validaIsset ($_POST['clave2']);

        if ( ! $nombre ) $v->errores['nombre'] = 'No hemos recibido el nombre';
        elseif ( ! $v->nombreValido ( $nombre ) ) $v->errores[ 'nombre' ] = 'El nombre debe tener al menos tres letras y empezar en mayúsculas';

        if ( ! $apellidos ) $v->errores[ 'apellidos' ] = 'No hemos recibido el apellido';
        elseif ( ! $v->apellidoValido ( $apellidos ) ) $v->errores[ 'apellidos' ] = 'El apellido debe tener al menos tres letras y empezar en mayúsculas';

        if ( ! $nick ) $v->errores[ 'nickname' ] = 'No hemos recibido el nickname';
        elseif ( ! $v->nickValido ( $nick ) ) $v->errores[ 'nickname' ] = 'Mínimo 3 caracteres, puede tener letras, números y caracteres no alfanuméricos';
        elseif ( $v->duplicateNick ( $nick ) ) $v->errores[ 'nickname' ] = 'Nick ya existe, introduce otro nick o dirígete al
                     <a href="../login/login_form.php">login</a>';

        if ( ! $email ) $v->errores[ 'email' ] = 'No hemos recibido el email';
        elseif ( ! $v->emailValido ( $email ) ) $v->errores[ 'email' ] = 'El email no es válido';
        elseif ( $v->duplicateEmail ( $email ) ) $v->errores[ 'email' ] = 'Email ya existe, introduce otro email o dirígete al
                     <a href="../login/login_form.php">login</a>';

        if ( ! $clave1 || ! $clave2 ) $v->errores[ 'clave1' ] = 'No hemos recibido ambas claves';
        elseif ( ! $v->passwordValido ( $clave1 ) ) $v->errores[ 'clave1' ] = 'La clave de seis caracteres mínimo, debe tener al menos una letra 
                                    mayúscula, una minúscula, un número y un carácter no alfanumérico';
        elseif ( $clave1 !== $clave2 ) $v->errores[ 'clave1' ] = 'Las claves tienen que ser iguales';

        if ($v->errores) include 'register_form.php';

        else {

            $datos_registro = [

                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'nickname' => $nick,
                'email' => $email,
                'clave' => $clave1
            ];

            $user = new Usuario();

            try {

                $registro_ok = $user->insert ( $datos_registro );

                if ( ! $registro_ok ) include 'register_form.php';

                else { ?>

                    <h1>Todo correcto, usuario registrado</h1><br>
                    <p><a class="btn btn-outline-primary btn-sm" href="../login/login_form.php?logueo">Ir al
                            login</a></p>
                    <p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Ir a la web</a></p>
                    <p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir la página principal</a></p>

                <?php }

            } catch ( PDOException $e ) {
                 echo 'Error! ' . $e->getMessage () . ' // Linea-> ' . $e->getLine ();

            }

            if ( $v->errores ) include 'register_form.php';


        }

    }










