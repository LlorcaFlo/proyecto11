<?php
session_start ();
    if(isset($_SESSION['user']['id']))
        {
            header ('location:../Login/estaslogeado.php');
        }
?>

<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
    <form action="valida_registro.php" method="POST">
    	

        <div class="col-3">
        <h5>Registrate</h5>
        <div class="form-group">
           <br>
           <label for="nick">Nick</label><br>
            <input type="text" name="nick" class="form-control"
            <?php 

            if(isset($_POST['pulsar'])){
                mostrar_campo('nick');
            }?>
            >
            <?php 
            if(isset($_POST['pulsar'])){
                mostrar_error_campo('nick', $errores); 
            }?><br>
           <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" class="form-control"
            <?php 

            if(isset($_POST['pulsar'])){
                mostrar_campo('nombre');
            }?>
            >
            <?php 
            if(isset($_POST['pulsar'])){
                mostrar_error_campo('nombre', $errores); 
            }?><br>
            <label for="apellido">Apellido</label><br>
            <input type="apellido" name="apellido" class="form-control"
            <?php 
            if(isset($_POST['pulsar'])){
                mostrar_campo('apellido');
            }?>
            >
            <?php 
            if(isset($_POST['pulsar'])){
                mostrar_error_campo('apellido', $errores); 
            }?><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" class="form-control"
            <?php 
            if(isset($_POST['pulsar'])){
                mostrar_campo('email');
            }?>
            >
            <?php 
            if(isset($_POST['pulsar'])){
                mostrar_error_campo('email', $errores); 
            }?><br>
            <label for="clave1">Clave</label><br>
            <input type="password" name="clave1" class="form-control"><br>
            <?php 
            if(isset($_POST['pulsar'])){
                mostrar_error_campo('clave1', $errores); 
            }?><br>
            <label for="clave2">Repetir Clave</label><br>
            <input type="password" name="clave2" class="form-control"><br>

            <button type="submit" class="btn" name="pulsar">Enviar</button>
        </div>
        <a class="btn" href="../paginaprincipal.php">Inicio</a>
    </div>
</form>