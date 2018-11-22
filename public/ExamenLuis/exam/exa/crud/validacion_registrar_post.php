<?php

    include '../funciones.php';
    include '../conexion.php';

    session_start ();

    if ( ! isset( $_SESSION[ 'usr' ] [ 'nombre' ] ) ) {
        header ( 'location:../login/valida_sesion.php' );
    }

    $titulo = filtrar ($_POST[ 'titulo' ]);
    $contenido = filtrar ( $_POST[ 'contenido' ] );

    if ( ! isset( $_POST[ 'titulo' ] ) || empty( $titulo ) ) {

        $errores [ 'titulo' ] = 'No hemos recibido un titulo';

    } else if ( ! isset( $_POST[ 'contenido' ] ) || empty( $contenido ) ) {

        $errores [ 'contenido' ] = 'No hemos recibido el contenido';

    } else {

        $autor = $_SESSION[ 'usr' ][ 'nombre' ];
        $id_usuario = $_SESSION[ 'usr' ][ 'id_usuario' ];

        $categoria = $_POST[ 'categoria' ];
        $slug = str_replace ( " ", "-", $titulo );

        // if ($categoria == 'Deportes') $id_cat = 1;

        // elseif ($categoria == 'Peliculas') $id_cat = 2;

        // else $id_cat = 3;

        try {

            $id_cat = "SELECT id FROM categoria WHERE nombre = $categoria";
            $id_cat = $conexion->query($id_cat);

            $sql = "INSERT INTO entradas (titulo, slug, autor, contenido, categoria, fecha, id_usuario, id_categoria) 
                                          VALUES (:titulo, :slug, :autor, :contenido, :categoria, now(), :id_usu, :id_cat)";

            $stmt = $conexion->prepare($sql);

            $stmt->execute ( array ( ":titulo" => $titulo,
                ":slug" => $slug,
                ":autor" => $autor,
                ":contenido" => $contenido,
                ":categoria" => $categoria,
                ":id_usu" => $id_usuario,
                ":id_cat" => $id_cat ) );

        } catch ( PDOException $e ) {

            if ( strpos ( $e->getMessage (), '23000' ) && strpos ( $e->getMessage (), 'indiceTitulo' ) ) {

                $errores[ 'titulo' ] = 'El título ya existe, introduce otro título';

            } else die ( 'Error! ' . $e->getMessage () . ' // ' . $e->getLine () );


        }
    }

    if ($errores) {

        include 'formulario_registrar_post.php';

    } else {

        echo '<h2>Post registrado</h2>';

        echo '
<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_privada.php">Regresar a mi zona privada</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Ir a la web</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir a la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../login/logout.php">Cierra sesión</a></p>';

    }
