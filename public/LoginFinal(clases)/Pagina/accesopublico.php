 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
 <meta charset="utf-8">

<?php $fecha = date('jS \of F Y h:i:s A');?>
<div style="width:450px;" >
	<?php echo "Fecha: " . $fecha;?>
	<br>
</div>
<?php

spl_autoload_register(function($class){

        include '../Clases/' . $class . '.php';
    });

        $con = new Conexion();

            try {
    
                $productos = $con->db->query("SELECT * FROM productos")->fetchAll(PDO::FETCH_OBJ);

            foreach ($registros as $entrada ) {

                        // $id = $entrada->id_entradas;
                echo
                    '<br>
                    <div style="width:300px;"><br><p>Nombre: ' 
                    . $entrada->nombre . '</p>' . 
                    '<p>Descripcion:' . $entrada->descripcion . '</p>' . 
                    '<p>Fecha:' . $entrada->fecha . '</p>' . 
                    '<p>Marca:' . $entrada->marca . '</p><br>' .
                    '<a class="btn" href="paginapost.php?id=' . $id . '">Ir al post</a><br><br></div>';
                }

            }catch (PDOException $e) {

                echo('Error! ' . $e->getMessage () . ' // Linea->' . $e->getLine ());

            }?>
        <br>
            <div class="form-group" style="width:300px;">
        <br>
                    <a class="btn" href="../Registro/formularioregistro.php">Registrate</a>
        <br><br>
                    <a class="btn" href="../Login/formulariologin.php">Inicia sesión</a>
        <br><br>
                    <a class="btn" href="../Pagina/perfil.php">Mi página</a>
        <br><br>
            </div>