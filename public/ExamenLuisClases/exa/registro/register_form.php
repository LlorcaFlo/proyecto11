<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">


<h1>Formulario de registro</h1>

<form action="register_validation.php" method="POST">

    <div class="col-3 col-offset-3">

        <!-- NOMBRE -->

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control"
                <?php if ( isset ( $_POST[ 'submit_registro' ] ) ) {
                    $v->mostrar_campo ( 'nombre' );
                } ?>
            >
            <?php if ( isset ( $_POST[ 'submit_registro' ] ) ) {
                $v->mostrar_error_campo ( 'nombre', $v->errores );
            } if ( isset ( $usu->errores )) {
                $v->mostrar_error_campo ( 'nombre', $v->errores );
            }?>
        </div>


        <!-- APELLIDO -->

        <div class="form-group">
            <label for="apellidos">Apellido</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control"
                <?php if ( isset ( $_POST[ 'submit_registro' ] ) ) {
                    $v->mostrar_campo ( 'apellidos' );
                } ?>
            >
            <?php if ( isset ( $_POST[ 'submit_registro' ] ) ) {
                $v->mostrar_error_campo ( 'apellidos', $v->errores );
            } if ( isset ( $usu->errores )) {
                $v->mostrar_error_campo ( 'apellidos', $v->errores );
            }?>
        </div>

        <!-- NICK -->

        <div class="form-group">
            <label for="nickname">Nick</label>
            <input type="text" name="nickname" id="nickname" class="form-control"
                <?php if ( isset ( $_POST[ 'submit_registro' ] ) ) {
                    $v->mostrar_campo ( 'nickname' );
                } ?>
            >
            <?php if ( isset ( $_POST[ 'submit_registro' ] ) ) {
                $v->mostrar_error_campo ( 'nickname', $v->errores );
            } ?>
        </div>

        <!-- EMAIL -->

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control"
                <?php if ( isset ( $_POST[ 'submit_registro' ] ) ) {
                    $v->mostrar_campo ( 'email' );
                } ?>
            >
            <?php if ( isset ( $_POST[ 'submit_registro' ] ) ) {
                $v->mostrar_error_campo ( 'email', $v->errores );
            } ?>
        </div>

        <!-- PASSWORD -->

        <div class="form-group">
            <label for="clave1">Clave</label>
            <input type="password" name="clave1" id="clave1" class="form-control">
            <?php if ( isset ( $_POST[ 'submit_registro' ] ) ) {
                $v->mostrar_error_campo ( 'clave1', $v->errores );
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
    <p><a class="btn btn-outline-primary btn-sm" href="../login/login_form.php">Ir al login</a></p>
</div>

<div style="position:relative; left:600px; bottom:600px">
    <a class="btn btn-outline-primary btn-sm" href="../web/zona_privada.php">Ir a mi zona de usuario</a>
</div>

<div style="position:relative; left:600px; bottom:600px">

</div>
