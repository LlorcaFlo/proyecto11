 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
 <meta charset="utf-8">
 <title>Acceso Público</title>

<?php $fecha = date('jS \of F Y h:i:s A');?>
<div style="width:450px;" >
	<?php echo "<br><p><spam style=\"color:red;\">Fecha: </spam>" . $fecha . "</p>"?> 
	<br>
</div>
<?php

spl_autoload_register(function($class){

        include '../Clases/' . $class . '.php';
    });
        $con = new Conexion();
        $pro = new Productos();
        $cat = new Categorias();

            try {
                    //Llamada para mostrar todos los productos//

                    $productos=$pro->muestraProductos();

                    

                }catch (PDOException $e) {

                echo('Error! ' . $e->getMessage () . ' // Linea->' . $e->getLine ());

            }
                ?>
        <table class="table">
        <thead>
        <tr>
            <th scope="col">Descripcion</th>
            <th scope="col">Marca</th> 
            <th scope="col">Fecha Alta</th>
            <th scope="col">Categoria</th>
            <th scope="col">Visita</th>       
        </tr>
        </thead>
        <tbody>
<?php
            foreach ($productos as $entrada) {

                $id_cat=$entrada->categoria;
                $categoria=$cat->busNomPorId($id_cat);

 ?>
                <tr>
                    <td><div><?php echo $entrada->descripcion ?></div></td>
                    <td><div style="color:gold; text-shadow: 1px 1px 1px black"><?php echo $entrada->marca ?></div></td>
                    <td><div><?php echo $entrada->fecha_alta ?></div></td>
                    <td><div style="color:blue;"><?php echo $categoria?></div></td>
                    <td>

        <a href="../Pagina/paginaproducto.php?id=<?php echo $entrada->id ?>">
        <input type='button' class="btn" name='Ir a producto' id='producto' value='Visita'></a>
                    </td>

                    </tr>
        <?php
          }
        ?>
        </tbody>
    </table>

           
        <br>
            <div class="form-group" style="width:300px;">
        <br>
            <a class="btn" href="../index.php">Inicio</a>
        <br><br>
           
            </div>
