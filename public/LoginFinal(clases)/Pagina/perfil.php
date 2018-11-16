<?php
session_start ();
if (! isset($_SESSION['user']['id'])) {
header('location:../Pagina/perfilrestringido.php');
}
?>
<meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
 <body>
<div class="col-6"><br>
        <div class="form-group">
        <p>Esta es tu página de perfil
   
        <?php echo "<spam style=\"color: rgba(15,195,255,0.8);\">" . $_SESSION['user']['nick'] . "</spam>"; ?>
        </p>
        </div> 
        <div class="form-group"><br>
        <p>Crea un Post y compartelo.</p><br>
        <a class="btn" href="../Posts/crearpost.php">Crear Post</a>
        <br><br>         
        <p>Edita un post que ya hayas creado.</p><br>
        <a class="btn" href="../Posts/modificarpost.php">Modificar Post</a>
        <br><br>    
        </div>
        <div class="form-group">
        <br>
        <p>Vuelve a la página de inicio.</p><br>
        <a class="btn" href="../paginaprincipal.php">Inicio</a>
        <br>
        <p>Cierra la sesión.</p><br>
        <a class="btn" href="../Login/logout.php">Cierra sesión</a></p>
        <br><br>
    </div>
     <br>
 </body>
