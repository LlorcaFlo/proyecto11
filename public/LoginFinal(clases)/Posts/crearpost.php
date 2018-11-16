<meta charset="utf-8">
<title>Crea Post</title>
 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
<?php

  spl_autoload_register (function ($class) {

                include '../Clases/' . $class . '.php';
            });

if ( ! isset ($_POST['pulsar'])){
    session_start();
}

if (! isset($_SESSION['user']['id'])) {
    header('location:../Pagina/perfilrestringido.php');
}

 ?>

<form action="valida_post.php" method="POST">
    <div class="col-4">
        <div class="form-group">
            <p>Crea tu propio post
            <?php echo "<spam style=\"color: rgba(15,195,255,0.8);\">" . $_SESSION['user']['nick'] . "</spam>"; ?>
            </p>
        <br>
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo"
            <?php if (isset ($_POST['pulsar'])) {
                $val->mostrar_campo('titulo');
            }?>>

            <?php if (isset ($_POST['pulsar'])) {
                $val->mostrar_error_campo('titulo', $val->errores );
            }?>
           
    <label for="categoria">Categorias</label>
    <select class="form-control" id="categoria" name="categoria">

            <?php
               
                $val = new Validacion();
                    try {
                    $consulta = "SELECT * FROM categorias ORDER BY nombre ASC";
                    $categorias = $val->db->query($consulta)->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($categorias as $categoria) {
                        $categoria = ucfirst($categoria['nombre']);
                        echo '<option>' . " $categoria " . '</option>';
                            }

                        } catch ( PDOException $e ) {
                            echo ('Error: ' . $e->getMessage () . ' // Line->' . $e->getLine ());
                        }
                    ?>

                </select>
                <label for="contenido">Contenido</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="4"
                ><?php if (isset($_POST['contenido'])) echo $_POST['contenido']; ?></textarea>

                <?php if (isset ($_POST['pulsar'])) {
                    $val->mostrar_error_campo('titulo', $val->errores);
                } ?>
                <br>
            <button type="submit" class="btn" name="pulsar">Enviar</button>
            <br><br>
        </div>
             <a class="btn" href="../Pagina/perfil.php">Perfil</a> 
            <br><br>
        </div>           


