
<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">

    <h1>Introduce tus datos</h1>

    <form action="login_validation.php" method="post">

        <div class="col-3 col-offset-3">

            <!-- EMAIL -->

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email_login" id="email" class="form-control"
                    <?php if (isset ($_POST['submit_login'])) {
                        $v->mostrar_campo ( 'email_login' );
                    } ?>
                >
                <?php if (isset ($_POST['submit_login'])) {
                    $v->mostrar_error_campo ( 'email_login', $v->errores );
                } ?>
            </div>

            <!-- PASSWORD -->

            <div class="form-group">
                <label for="clave_login">Clave</label>
                <input type="password" name="clave_login" id="clave_login" class="form-control">
                <?php if (isset ($_POST['submit_login'])) {
                    $v->mostrar_error_campo ( 'clave_login', $v->errores );
                } ?>
            </div>

            <!-- SUBMIT -->

            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg" name="submit_login">Login</button>
            </div>
        </div>


    </form>

<br><p><a class="btn btn-outline-primary btn-sm" href="../index.php">Ir a la página principal</a></p>
<p><a class="btn btn-outline-primary btn-sm" href="../web/zona_publica.php">Ir a la web</a></p>