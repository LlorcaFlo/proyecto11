<?php

    session_start ();

    if ( ! isset( $_SESSION[ 'usr' ] [ 'nombre' ] ) ) {
       header ( 'location:../login/valida_sesion.php' );
    }

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Documento sin título</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>

<body>


<?php

    echo "<h1>Bienvenid@ " . $_SESSION[ 'usr' ][ 'nombre' ] . "</h1><br>";

?>

<p>&nbsp;</p>
<table class="table">
    <tbody>

        <tr>
            <td colspan="3" align="center">Zona Usuarios Registrados</td>
        </tr>

        <tr>
        <td><a href="../crud/formulario_registrar_post.php">
        <input type='button' class="btn btn-primary" name='crear' id='crear' value='Crear Post'></a></td>

        <td><a href="../crud/editar_borrar_post.php">
        <input type='button' class="btn btn-primary" name='editar_borrar'
                           id='editar_borrar' value='Editar o borrar Post'></a></td>
        </tr>

    </tbody>
</table>
<p>&nbsp;</p>


<p><a class="btn btn-outline-primary btn-sm" href="zona_publica.php">Ir a la web</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../login/logout.php">Cierra sesión</a></p>
</body>
</html>