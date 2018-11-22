<?php

    session_start ();

    if ( ! isset( $_SESSION[ 'usr' ] [ 'nombre' ] ) ) {
        header ( 'location:../login/valida_sesion.php' );
    }

?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">


</head>
<body>

<?php

    if (! isset( $_POST['editar'])) {

        $id = $_GET['id'];
        $titulo = $_GET['titulo'];
        $contenido = $_GET['contenido'];

    } else {

        include '../conexion.php';
        include '../funciones.php';

        $id = $_POST['id'];
        $titulo = $_POST[ 'titulo' ];
        $contenido = $_POST[ 'contenido' ];

        $titulo = filtrar ($titulo);
        $contenido = filtrar ($contenido);

        try {

            $sql = "UPDATE entradas SET titulo = :titulo, contenido = :contenido WHERE id_post = $id";

            $stmt = $dbh->prepare ($sql);

            $stmt->bindValue (":titulo", $titulo);
            $stmt->bindValue (":contenido", $contenido);

            $stmt->execute ();

            header ('location:editar_borrar_post.php');

        } catch (PDOException $e){

            die ('Error ' . $e->getMessage () . ' // Linea-> ' . $e->getLine ());
        }
    }
?>

<!-- OJO!! los values van entrecomillados -->

<h1>Editar</h1>
<form method="post" action="<?php echo $_SERVER[ 'PHP_SELF' ]; ?>">

    <div class="col-5 col-offset-5">

        <div class="form-group">
            <label for="id"></label>
            <input type="hidden" class="form-control" id="id" name="id" value="<?= $id ?>">
        </div>

        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $titulo ?>">
        </div>

        <div class="form-group">
            <label for="contenido">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" rows="3"
            ><?= $contenido ?></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="editar">Editar</button>
        </div>

    </div>

</form>


<p><a class="btn btn-outline-primary btn-sm" href="editar_borrar_post.php">Regresar a borrar o editar post</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_privada.php">Regresar a mi zona privada</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Ir a la web</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir a la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../login/logout.php">Cierra sesión</a></p>
</body>
</html>

