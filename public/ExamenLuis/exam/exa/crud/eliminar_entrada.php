<?php


    session_start ();

    if ( ! isset( $_SESSION[ 'usr' ] [ 'nombre' ] ) ) {

        header ( 'location:../login/valida_sesion.php' );
    }

    include '../conexion.php';

    if ( isset( $_GET[ 'del_todos' ] ) ) {

        $id_user = $_GET['del_todos'];

        $dbh->query ( "DELETE FROM entradas WHERE id_usuario = $id_user" );

    } else {

        $id = $_GET[ 'id' ];

        $sql = "DELETE FROM entradas WHERE id_post = $id";

        $dbh->query ( $sql );

    }

    header ( 'location:editar_borrar_post.php' );



   /* <!--<form class="buscador" action="<?= $_SERVER[ 'PHP_SELF' ] ?>" method="post">
    <label for="post">Introduce un término de búsqueda</label>
    <input type="text" id="post" name="termino">
    <label for="seleccion"></label>
    <select id="seleccion" name="opcion">
        <option value="1" disabled selected>Elige una opción</option>
        <option value="titulo">Titulo</option>
        <option value="contenido">Contenido</option>
        <option value="categoria">Categoría</option>
    </select>
    &nbsp;<input type="submit" name="boton_busqueda" id="boton_busqueda" value="Busca">
</form>-->*/
