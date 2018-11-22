<?php
session_start ();

if (! isset($_SESSION['user']['id'])) {
header('location:../Pagina/perfilrestringido.php');
}
?>

<meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
 <title>Perfil</title>
 <body>
<div class="col-3"><br>
        <div class="form-group">

        <p>Esta es tu página de perfil<br>
        <spam style="color: white; background-color:rgba(46,154,254);">
            <?php echo $_SESSION['user']['nickname'] . ' ' . $_SESSION['user']['rol'];?>
            </p>
        </div> 

        <div class="form-group">
        <p>Productos</p><br>
        <a class="btn" href="../Producto/creaproducto.php">Ingresa Productos</a>
        <br><br>  
        <a class="btn" href="../Producto/muestraproducto.php">Modifica Productos</a>
        <br><br>  
        </div>

        <?php  if($_SESSION['user']['rol']=="Jefe"){?>
        <div class="form-group">
        <p>Empleados</p><br>
        <a class="btn" href="../Registro/registro.php">Registra Empleado</a>
        <br><br>
        <a class="btn" href="../Empleados/muestraempleados.php">Muestra Empleados</a>
        <br><br> 
        </div>       
        <?php } ?>
       
        <div class="form-group">
        <p>Opciones</p><br>
        <a class="btn" href="../index.php">Vuelve al inicio</a>
        <br><br>
        <a class="btn" href="../Login/logout.php">Cierra sesión</a></p>
        <br>
    </div>
   <br>
    </div>
 </body>
