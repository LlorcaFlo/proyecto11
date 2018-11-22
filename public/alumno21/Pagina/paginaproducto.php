<!DOCTYPE html>
<html>
    <head>
            <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
            <meta charset="utf-8">
	    <title>Producto Nº: <?php echo '' . $_GET['id']?></title>
    </head>
    <body>
	<?php
    spl_autoload_register(function($class){

        include '../Clases/' . $class . '.php';
    });

    $id = $_GET['id'];

    $pro = new Productos();

    if (! isset($_GET['id']) || empty($id)) {

    echo "<div><spam style=\"color:rgba(255,75,100,0.7);\">
    No has seleccionado ningún Post</spam></div><br>";
    }
    else{

    try {

        $sentencia = "SELECT * FROM productos WHERE  id = $id";

        $registros = $pro->db->query($sentencia)->fetchAll(PDO::FETCH_OBJ);

        foreach ($registros as $entrada) {

            $id = $entrada->id;
            echo
            '<div style="width:400px;">
            <p>Página del producto Nº: ' . $id .'</p></div><br>
            <div style="width:400px;"><br>
            <p><spam style="color:rgba(255,75,100,0.7);">Nombre: 
            </spam>'. $entrada->nombre . '</p>' . 
            '<p><spam style="color:rgba(255,75,100,0.7)">Descripción: </spam>'
            . $entrada->descripcion . '</p>' .
            '<p><spam style="color:rgba(255,75,100,0.7)">Fecha: </spam>' 
            . $entrada->fecha_alta . '</p>' .
            '<p><spam style="color:rgba(255,75,100,0.7)">Marca: </spam>' 
            . $entrada->marca . '<br><br></div></p>';

        }

    }catch (PDOException $e) {

        echo('Error: ' . $e->getMessage () . ' // Linea->' . $e->getLine ());

    }
      }
    ?>
    <br>
 
 <div style="width: 400px;">
    <br>
    <a class="btn" href="../index.php">Pagina Principal</a>
    <br><br>
    <a class="btn" href="accesopublico.php">Acceso Público</a>
    <br><br>
</div>
</body>
</html>