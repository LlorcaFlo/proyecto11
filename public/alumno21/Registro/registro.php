 <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
        <form action="valida_registro.php" method="POST">
            <title>Registra Empleado</title>
            <div class="col-3">
            <br><p>Registrate</p><br>
            <div class="form-group">


                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" class="form-control"

                    <?php 
                        if(isset($_POST['pulsar'])){
                            $val->mostrar_campo('nombre');
                                }?>>
                    <?php 
                        if(isset($_POST['pulsar'])){
                            $val->mostrar_error_campo('nombre', $val->errores); 
                                }?>
                
                <label for="Rol">Rol</label><br>
                <select name="rol" class="form-control">
                <option >Empleado</option>
                <option >Jefe</option>
                </select>


                <label for="apellido">Apellido</label><br>
                <input type="text" name="apellido" class="form-control"
                    <?php 
                        if(isset($_POST['pulsar'])){
                            $val->mostrar_campo('apellido');
                                }?>>
                    <?php 
                        if(isset($_POST['pulsar'])){
                            $val->mostrar_error_campo('apellido', $val->errores); 
                                }?>

                <label for="email">Email</label><br>
                <input type="email" name="email" class="form-control"
                    <?php 
                         if(isset($_POST['pulsar'])){
                            $val->mostrar_campo('email');
                                }?>>
                    <?php 
                        if(isset($_POST['pulsar'])){
                            $val->mostrar_error_campo('email', $val->errores); 
                                }?>
            
                <label for="nickname">Nick</label>
                <input type="text" name="nickname" class="form-control"
                    <?php 
                        if(isset($_POST['pulsar'])){
                            $val->mostrar_campo('nickname');
                                }?>>
                    <?php 
                        if(isset($_POST['pulsar'])){
                            $val->mostrar_error_campo('nickname', $val->errores); 
                                }?>
        
                <label for="clave1">Clave</label><br>
                <input type="password" name="clave1" class="form-control">
                    <?php 
                        if(isset($_POST['pulsar'])){
                            $val->mostrar_error_campo('clave1', $val->errores); 
                                }?>
                <label for="clave2">Repetir Clave</label><br>
                <input type="password" name="clave2" class="form-control"><br>
            
                <button type="submit" class="btn" name="pulsar">Enviar</button>

            <br><br>
            </div>
                <a class="btn" href="../Pagina/perfil.php">Vuelve al Perfil</a>
            <br><br>
        </div>
    </form>