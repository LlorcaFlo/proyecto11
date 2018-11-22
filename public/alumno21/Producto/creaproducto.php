<?php
if(! isset($_POST['pulsar'])){
   session_start(); 
}
if(! isset($_SESSION['user']['id'])){
            header('location:../Pagina/perfilrestringido.php');
            }
spl_autoload_register (function ($class) {
                include '../Clases/' . $class . '.php';
            });
 ?>
<meta charset="utf-8">
<title>Ingresa producto</title>
 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">

<form action="valida_producto.php" method="POST">
    <div class="col-4"><br>
        <div class="form-group"><br>
            <p>Ingresa producto<br>
            <spam style="color: white; background-color:rgba(46,154,254);">
            <?php echo $_SESSION['user']['nickname'] . ' ' . $_SESSION['user']['rol'];?>
            </p><br>
        
    <label for="nombre">Nombre del Producto</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
            <?php if (isset ($_POST['pulsar'])) {
                $val->mostrar_campo('nombre');
            }?>>

            <?php if (isset ($_POST['pulsar'])) {
                $val->mostrar_error_campo('nombre', $val->errores );
            }?>
    <label for="marca">Marca del producto</label>
    <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca"
            <?php if (isset ($_POST['pulsar'])) {
                $val->mostrar_campo('marca');
            }?>>

            <?php if (isset ($_POST['pulsar'])) {
                $val->mostrar_error_campo('marca', $val->errores );
            }?>  
    <label for="categoria">Categorias</label>
    <select class="form-control" id="categoria" name="categoria">

            <?php
               
                $val = new Validacion();
                    try {
                                    
        $categorias = $val->db->query("SELECT * FROM categorias ORDER BY nombre ASC")->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($categorias as $categoria) {
                        $descripcion= $categoria['descripcion'];
                        $categoria = ucfirst($categoria['nombre']);
                        $categoria = $categoria . ' - ' . $descripcion;
                        echo '<option>' . " $categoria " . '</option>';
                            }

                        } catch ( PDOException $e ) {
                            echo ('Error: ' . $e->getMessage () . ' // Line->' . $e->getLine ());
                        }
                    ?>

                </select>
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="1"
                ><?php if (isset($_POST['descripcion'])) echo $_POST['descripcion']; ?></textarea>

                <?php if (isset ($_POST['pulsar'])) {
                    $val->mostrar_error_campo('descripcion', $val->errores);
                } ?>
                <br>
            <button type="submit" class="btn" name="pulsar">Enviar</button>
            <br><br>
        </div>
             <a class="btn" href="../Pagina/perfil.php">Perfil</a> 
            <br><br>
        </div>           