<!DOCTYPE html>
<html>
    <head>
            <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
            <meta charset="utf-8">
	    <title>Post Nº: <?php echo '' . $_GET['id']?></title>
    </head>
    <body>
	       <?php
    spl_autoload_register(function($class){

        include '../Clases/' . $class . '.php';
    });

    $id = $_GET['id'];
    $con = new Conexion();
    if (!isset($id) || empty($id)) {

    echo "<div><spam style=\"color:rgba(255,75,100,0.7);\">
    No has seleccionado ningún Post</spam></div><br>";
    }
    else{

    try {

        $sentencia = "SELECT * FROM entradas WHERE  id_entradas = $id";

        $registros = $con->db->query($sentencia)->fetchAll(PDO::FETCH_OBJ);

        foreach ($registros as $entrada) {

            $id = $entrada->id_entradas;

            echo
                '<br>
                    <div><spam style="color:rgba(255,75,100,0.7);">Titulo: </spam>' 
                    . $entrada->titulo . '<br>' . 
                    '<spam style="color:rgba(255,75,100,0.7)">Autor: </spam>' 
                    .'<spam style="color:green;">' . $entrada->autor . '</spam><br>' .
                    '<spam style="color:rgba(255,75,100,0.7)">Fecha: </spam>' 
                    . $entrada->fecha . '<br>' .
                    '<spam style="color:rgba(255,75,100,0.7)">Categoria: </spam>' 
                    . $entrada->categoria . '<br>' .
                    '<spam style="color:rgba(255,75,100,0.7)">Contenido: </spam>
                    <h4 style="color:white">'
                    .$entrada->contenido . '</h4></a></div>';

        }

    }catch (PDOException $e) {

        echo('Error: ' . $e->getMessage () . ' // Linea->' . $e->getLine ());

    }
      }
    ?>
    <br>
 
 <div class="form-group">
    <br>
    <a class="btn" href="../Registro/formularioregistro.php">Registrate</a>
    <br><br>
    <a class="btn" href="../Login/formulariologin.php">Inicia sesión</a>
    <br><br>
    <a class="btn" href="../paginaprincipal.php">Mi página</a>
    <br><br>
    <a class="btn" href="accesopublico.php">Acceso Público</a>
</div>
</body>
</html>