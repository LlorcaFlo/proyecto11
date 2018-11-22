

<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">

<h1>Formulario de registro</h1>

<form action="validacion_registro.php" method="POST">

    <div class="col-3 col-offset-3">

        <!-- NOMBRE -->

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control"
                <?php if (isset ($_POST['submit_registro'])) {
                    mostrar_campo ( 'nombre' );
                    } ?>
            >
                <?php if (isset ($_POST['submit_registro'])) {
                    mostrar_error_campo ( 'nombre', $errores );
                     } ?>
        </div>
        
        <!-- APELLIDO -->

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control"
                <?php if (isset ($_POST['submit_registro'])) {
                    mostrar_campo ( 'apellido' );
                } ?>
            >
            <?php if (isset ($_POST['submit_registro'])) {
                mostrar_error_campo ( 'apellido', $errores );
            } ?>
        </div>

        <!-- NICK -->

        <div class="form-group">
            <label for="nick">Nick</label>
            <input type="text" name="nick" id="nick" class="form-control"
                <?php if (isset ($_POST['submit_registro'])) {
                    mostrar_campo ( 'nick' );
                } ?>
            >
            <?php if (isset ($_POST['submit_registro'])) {
                mostrar_error_campo ( 'nick', $errores );
            } ?>
        </div>

        <!-- EMAIL -->

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control"
                <?php if (isset ($_POST['submit_registro'])) {
                    mostrar_campo ( 'email' );
                } ?>
            >
            <?php if (isset ($_POST['submit_registro'])) {
                mostrar_error_campo ( 'email', $errores );
            } ?>
        </div>

        <!-- PASSWORD -->

        <div class="form-group">
            <label for="clave1">Clave</label>
            <input type="password" name="clave1" id="clave1" class="form-control">
            <?php if (isset ($_POST['submit_registro'])) {
                mostrar_error_campo ( 'clave1', $errores );
            } ?>
        </div>

        <!-- PASSWORD CONFIRM -->

        <div class="form-group">
            <label for="clave2">Repetir Clave</label>
            <input type="password" name="clave2" id="clave2" class="form-control">
        </div>

        <!-- SUBMIT -->

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit_registro">Registrar</button>
        </div>
    </div>
</form>

<br>
<p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Ir a la web</a></p>

<div style="position:relative; left:600px; bottom:600px">
    <p>¿Eres usuario registrado?</p>
    <p><a class="btn btn-outline-primary btn-sm" href="../login/formulario_login.php">Ir al login</a></p>
</div>

<div style="position:relative; left:600px; bottom:600px">
    <a class="btn btn-outline-primary btn-sm" href="../web/zona_privada.php">Ir a mi zona de usuario</a>
</div>

<div style="position:relative; left:600px; bottom:600px">

</div>
