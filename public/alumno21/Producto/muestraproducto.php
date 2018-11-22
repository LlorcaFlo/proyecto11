<?php 
session_start ();
    if (! isset($_SESSION['user']['id'])) {
            header('location:../Pagina/perfilrestringido.php');
 } 
    spl_autoload_register ( function ( $class ) {
        include '../Clases/' . $class . '.php';
            });

    $rol=$_SESSION['user']['rol'];

if ($rol == "Jefe") {
?>
	<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modifica Producto Jefe</title>
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>
<body>

	<div><p>Buenas, 
    <spam style="color:red"><?php echo $_SESSION['user']['nickname'].'<br>'; ?>
    <?php echo $_SESSION['user']['rol']; ?></spam></p></div>
	<?php

    $pro = new Productos();
    $usu = new Usuario();
    $cat = new Categorias();
    
    ?> 
	<?php
        try {

        $productos = $pro->db->prepare("SELECT * FROM productos ORDER BY categoria ASC");
        $productos->execute();
        $registros = $productos->fetchAll(PDO::FETCH_OBJ);


    } catch (PDOException $e) {
       echo ('Error: ' . $e->getMessage () . ' // ' . $e->getLine () );
    }
    ?>
    <table class="table">
        <thead>
        <tr>
        	<th scope="col">Nombre</th>
        	<th scope="col">Descripcion</th>
			<th scope="col">Marca</th> 
			<th scope="col">Fecha Alta</th>
			<th scope="col">Categoria</th>
			<th scope="col">Usuario</th>
            <th scope="col">Borrar</th>
			<th scope="col">Editar</th>           
        </tr>
        </thead>
        <tbody>
        <?php foreach ($registros as $entrada) { 
          
                    $id_cat1=$entrada->categoria;
                    $id_user=$entrada->id_usuario;
        try{
                    $id_cat=$cat->busNomPorId($id_cat1);
                    $user=$usu->busNomUser($id_user);

                }catch (PDOException $e) {

       echo ('Error: ' . $e->getMessage () . ' // ' . $e->getLine () );
    }

        ?>
                <tr>
                    <td><div><?php echo $entrada->nombre ?></div></td>
                    <td><div><?php echo $entrada->descripcion ?></div></td>
                    <td><div><?php echo $entrada->marca ?></div></td>
                    <td><div><?php echo $entrada->fecha_alta ?></div></td>
                    <td><div style="color:blue"><?php echo $id_cat?></div></td>
                    <td><div style="color:red;"><?php echo $user?></div></td>
                    <td>
        <a href="borrarproducto.php?id=<?php echo $entrada->id ?>">
        <input type='button' class="btn" name='borrar' id='borrar' value='Borrar'></a>
                    </td>

                    <td>
        <a href="editaproducto.php?id=<?php echo $entrada->id?> & nombre=<?php 
        echo $entrada->nombre ?> & descripcion=<?php echo $entrada->descripcion ?> & marca=<?php echo $entrada->marca ?>">
        <input type='button' class="btn" name='editar' id='editar' value='Editar'></a>
                    </td>

                	</tr>
        <?php
          }
        ?>
                    <tr>
        <td class='bot'>
        <a href="borrarproducto.php?borra_todos=<?php echo $rol ?>">
        <input type='button' class="btn" name='borra_todo' id='borra_todo' value='Borrar todo'></a>            </td>
        <td class='bot'><a href="../Pagina/perfil.php">
        <input type='button' class="btn" name='borra_todo' id='borra_todo' value='Vuelve al Perfil'></a></td>
                    </tr>
        </tbody>
    </table>
</body>
</html>

<!-- ---------------------------------------------------------------------------------------------------
     EMPIEZA LA PAGINA DE EMPLEADO
--------------------------------------------------------------------------------------------------- -->

<?php
}else {
?>	
	<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modifica Producto Empleado</title>
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>
<body class="body2">
	<?php

    $id_usuario = $_SESSION['user']['id'];

    $pro = new Productos();

    ?> 
    <div><p>Buenas, 
    <spam style="color:green"><?php echo $_SESSION['user']['nickname'].'<br>'; ?></spam> Al ser usuario 
    <spam style="color:green"><?php echo $_SESSION['user']['rol']; ?></spam>
    , solo mostraremos los productos que usted haya registrado, disculpe las molestias.</p></div>
	
	<?php
        try {

        $productos = $pro->db->prepare("SELECT * FROM productos WHERE id_usuario = $id_usuario");

        $productos->execute();

        $registros = $productos->fetchAll(PDO::FETCH_OBJ);

   
    } catch (PDOException $e) {
       echo ('Error: ' . $e->getMessage () . ' // ' . $e->getLine () );
    }
    ?>
    <table class="table">
        <thead>
        <tr>
        	<th scope="col">Nombre</th>
        	<th scope="col">Descripcion</th>
			<th scope="col">Marca</th> 
			<th scope="col">Categoria</th>
			<th scope="col">Editar</th>           
        </tr>
        </thead>
        <tbody>
        <?php foreach ($registros as $entrada) { 
          
                    $id_cat1=$entrada->categoria;
        try{
                    
                    $id_cat=$cat->busNomPorId($id_cat1);

                }catch (PDOException $e) {

       echo ('Error: ' . $e->getMessage () . ' // ' . $e->getLine () );
    }
        ?>
                <tr>
                    <td><div><?php echo $entrada->nombre ?></div></td>
                    <td><div><?php echo $entrada->descripcion ?></div></td>
                    <td><div><?php echo $entrada->marca ?></div></td>
                    <td><div style="color:blue;"><?php echo $id_cat?> </div></td>

                <td>
        <a href="editarpost.php?id=<?php echo $entrada->id?> & nombre=<?php 
            echo $entrada->nombre ?> & desccripcion=<?php echo $entrada->descripcion ?> & categoria=<?php echo $entrada->categoria ?>">
        <input type='button' class="btn" name='editar' id='editar' value='Editar'></a>
            </td>
                	
                    </tr>
        <?php
          }
        ?>
    <tr>
            <td class='bot'><a href="../Pagina/perfil.php">
            <input type='button' class="btn" name='borra_todo' id='borra_todo' value='Vuelve al Perfil'></a></td>
        </tr>
        </tbody>
    </table>
</body>
</html>
<?php
}
?>	