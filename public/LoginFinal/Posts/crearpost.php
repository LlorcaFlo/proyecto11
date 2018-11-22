<?php session_start (); ?>
<meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
<?php
    if (! isset($_SESSION['user']['id'])) {
            header('location:../Pagina/perfilrestringido.php');
 }?>

<form action="valida_post.php" method="POST">
    <div class="col-6">
    <div class="form-group">
        <h6>Crea tu propio post</h6>
        <?php echo "<div><h4 style=\"text-align: center; color:rgba(200,200,50,0.9);\">" . $_SESSION['user']['nombre'] . $_SESSION['user']['apellido'] . "</h4></div>"; ?>
        <br>
    
       <label for="titulo">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo"
          <?php if (isset ($_POST['pulsar'])) {
              mostrar_campo ( 'titulo' );
                    } ?>
                >
                <?php if (isset ($_POST['pulsar'])) {
                    $val->mostrar_error_campo ('titulo', $errores );
                } ?>
           
                <label for="categoria">Categorias</label>
                <select class="form-control" id="categoria" name="categoria">

                    <?php

                        include '../conexion.php';

                        try {

                        $consulta = "SELECT * FROM categorias ORDER BY nombre ASC";
                        $categorias = $conexion->query($consulta)->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($categorias as $categoria) {
                                $categoria = ucfirst($categoria['nombre']);
                                echo '<option>' . " $categoria " . '</option>';
                            }

                        } catch ( PDOException $e ) {
                            echo ( 'Error: ' . $e->getMessage () . ' // Line->' . $e->getLine () );
                        }
                    ?>

                </select>
                <label for="contenido">Contenido</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="3"
                ><?php if (isset($_POST['contenido'])) echo $_POST['contenido']; ?></textarea>

                <?php if (isset ($_POST['pulsar'])) {
                $val->mostrar_error_campo ('contenido', $val->errores);
                } ?><br>
                
        <button type="submit" class="btn" name="pulsar">Enviar</button>
        </div>

        <div class="form-group">
        <a class="btn" href="../Pagina/perfil.php">Perfil</a>
        </div>            

