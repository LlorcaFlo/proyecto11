<?php
session_start();
    if(isset($_SESSION['user']['id']))
        {
    header ('location:estaslogeado.php');
        	}
    ?>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/estilo.css">
    <form action="valida_login.php" method="POST">
        <title>Inicio Sesión</title>
        <div class="col-3">
            <br><p>Inicia Sesión</p><br>
            <p>Inicia sesión con <spam style="color:red";>Email</spam></p>
            <br>
        <div class="form-group">
            
            <label for="email">Email</label><br>
            <input type="email" name="email" class="form-control" id="email"
            
            <?php if(isset($_POST['pulsar'])){
                $val->mostrar_campo('email');
            }?>
            >
            <?php if(isset($_POST['pulsar'])){
                $val->mostrar_error_campo('email', $val->errores); 
            }?>
            <label for="clavelog">Contraseña</label><br>
            <input type="password" name="clavelog" class="form-control" id="clavelog"><br>
            <?php if(isset($_POST['pulsar'])){
                $val->mostrar_error_campo('clavelog', $val->errores); 
            }?><br>
            <button type="submit" class="btn" name="pulsar">Enviar</button>
            <br><br>
        </div>
        <div class="form-group"><br>
        <a class="btn" href="../index.php">Inicio</a><br><br>
        <a class="btn" href="../Pagina/accesopublico.php">Acceso Público</a><br><br>
       </div>
       <br><br>
  </div>

</form>