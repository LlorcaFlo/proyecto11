<?php
session_start();

if (! isset($_SESSION['user']['id'])) {
            header('location:../Pagina/perfilrestringido.php');
 }
 ?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>Modificar Post</title>
 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>
<body>

	<?php 

	if (! isset($_POST['editar'])) {
       $id = $_GET['id'];
       $titulo = $_GET['titulo'];
       $contenido = $_GET['contenido'];
       $categoria =$_GET['categoria'];

    }?>
    
<!-- OJO!! los values van entrecomillados -->

<meta charset="utf-8">
<form method="post" action="valida_editapost.php">
    <div class="col-6">
        <h4>Editar</h4>
        <?php echo "<div><h4 style=\"text-align: center; color:rgba(200,200,50,0.9);\">" . $_SESSION['user']['nick'] . "</h4></div>"; ?>
        <div class="form-group">

            <label for="id"></label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $id ?>">
            
        
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $titulo ?>">
            	<?php if (isset ($_POST['editar'])) {
                    $val->mostrar_error_campo('titulo', $val->errores);
                } ?><br>
       
            <label for="categoria"></label>
            <input type="hidden" class="form-control" id="categoria" name="categoria" 
            value="<?php echo $categoria ?>">
       
            <label for="contenido">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" rows="3"
            ><?php echo $contenido ?></textarea>
       
            <button type="submit" class="btn btn-primary" name="editar">Guardar</button>

        </div>
        <p><a class="btn" href="../Pagina/perfil.php">Perfil</a></p>
        <p><a class="btn" href="modificarpost.php">Modificar Post</a></p>
        </div>

</form>
</body>
</html>


