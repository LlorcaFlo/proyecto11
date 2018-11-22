<?php
if(! isset($_POST['editar'])){

$id=$_GET['id'];
$nombre = $_GET['nombre'];
$marca = $_GET['marca'];
$descripcion = $_GET['descripcion'];
}

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
<title>Modifica producto</title>
 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">

<form action="valida_producto.php" method="POST">
    <div class="col-4"><br>
        <div class="form-group"><br>
            <p>Modifica Producto<br>
            <?php echo "<spam style=\"color: rgba(15,195,255,0.8);\">" . $_SESSION['user']['nickname'] . "</spam>"; ?>
            </p><br>
        
    <label for="nombre">Nombre del Producto</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>"
            <?php if (isset ($_POST['pulsar'])) {
                $val->mostrar_campo('nombre');
            }?>>

            <?php if (isset ($_POST['pulsar'])) {
                $val->mostrar_error_campo('nombre', $val->errores );
            }?>
    <label for="marca">Marca del producto</label>
    <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $marca;?>"
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
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="1"><?php echo $descripcion;?>
                <?php if (isset($_POST['descripcion'])) echo $_POST['descripcion']; ?></textarea>

                <?php if (isset ($_POST['pulsar'])) {
                    $val->mostrar_error_campo('descripcion', $val->errores);
                } ?>
                <br>
            <button type="submit" class="btn" name="pulsar">Modificar</button>
            <br><br>
        </div>
             <a class="btn" href="../Pagina/perfil.php">Perfil</a> 
            <br><br>
        </div>           