 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
 <meta charset="utf-8">

<?php $fecha = date('jS \of F Y h:i:s A');?>
<div>
	<?php echo "Fecha: " . $fecha;?>
	<br>
</div>

<?php
include '../conexion.php';
include '../funciones.php';
try {
         $sentencia = "SELECT * FROM productos";

            $registros = $conexion->query($sentencia)->fetchAll(PDO::FETCH_OBJ);

            foreach ($registros as $entrada ) {

                $id = $entrada->id_entradas;

                echo
                    '<br>
                    <div style="width:300px;""><spam style="color:rgba(255,75,100,0.7);">Titulo: </spam>' 
                    . $entrada->titulo . '<br>' . 
                    '<spam style="color:rgba(255,75,100,0.7)">Autor: </spam>' 
                    .'<spam style="color:green;">' . $entrada->autor . '</spam><br>' .
                    '<spam style="color:rgba(255,75,100,0.7)">Fecha: </spam>' 
                    . $entrada->fecha . '<br>' . 
                    '<spam style="color:rgba(255,75,100,0.7)">Categoria: </spam>' 
                    . $entrada->categoria . '<br>' .
                    '<a class="btn" href="paginapost.php?id=' . $id . '">Ir al post</a></div>';
            }

        } catch ( PDOException $e ) {

            echo( 'Error! ' . $e->getMessage () . ' // Linea->' . $e->getLine () );

        }

  ?>
<br>
 <div class="form-group">
    <br>
    <a class="btn" href="../Registro/formularioregistro.php">Registrate</a>
    <br><br>
    <a class="btn" href="../Login/formulariologin.php">Inicia sesión</a>
    <br><br>
    <a class="btn" href="../Pagina/perfil.php">Mi página</a>
<br><br>
</div>