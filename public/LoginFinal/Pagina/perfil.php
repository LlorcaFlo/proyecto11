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
<div class="col-6">
<div class="form-group">
        <div class="form-group">
        <p>Esta es tu página de perfil
         <?php
            if($_SESSION['user']['nick']==false)
             {
                $A=$_SESSION['user']['email'];
             }else{
                $A=$_SESSION['user']['nick'];}
              ?>
        <?php echo "<div><h4 style=\"text-align: center; color:rgba(200,200,50,0.9);\">" . $A . "</h4></div>"; ?>
        </p>
        </div> 
        <div class="form-group">
        <p>Crea un Post y compartelo.</p>
        <a class="btn" href="../Posts/crearpost.php">Crear Post</a>
        <br><br>
         <p>Edita un post que ya hayas creado.</p>
        <a class="btn" href="../Posts/modificarpost.php">Modificar Post</a>
        <br>    
        </div>
        <div class="form-group">
        <br>
        <p>Vuelve a la página de inicio.</p>
        <a class="btn" href="../paginaprincipal.php">Inicio</a>
        <br>
        <p>Cierra la sesión.</p>
        <a class="btn" href="../Login/logout.php">Cierra sesión</a></p>
        <br>
        </div>
 </body>
