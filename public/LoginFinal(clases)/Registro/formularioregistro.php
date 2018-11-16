<?php
    session_start();
        if(isset($_SESSION['user']['id']))
            {
                header ('location:../Login/estaslogeado.php');
            }
?>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
        <form action="valida_registro.php" method="POST">
            <title>Registrarse</title>
    
            <div class="col-2">
            <br><p>Registrate</p><br>
            <div class="form-group">
            
                <label for="nick">Nick</label>
                <input type="text" name="nick" class="form-control"
                    <?php 
                        if(isset($_POST['pulsar'])){
                            $val->mostrar_campo('nick');
                                }?>>
                    <?php 
                        if(isset($_POST['pulsar'])){
                            $val->mostrar_error_campo('nick', $val->errores); 
                                }?>
        
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
            
                <label for="apellido">Apellido</label><br>
                <input type="apellido" name="apellido" class="form-control"
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
                <a class="btn" href="../paginaprincipal.php">Inicio</a>
            <br><br>
        </div>
    </form>