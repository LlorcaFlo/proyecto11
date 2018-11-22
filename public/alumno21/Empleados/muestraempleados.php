<?php 
session_start ();
    if (! isset($_SESSION['user']['id'])) {
            header('location:../Pagina/perfilrestringido.php');
 } 
    spl_autoload_register ( function ( $class ) {
        include '../Clases/' . $class . '.php';
            });

    $rol=$_SESSION['user']['rol'];
?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Muestra Empleados</title>
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
</head>
<body>

    <div style="width: 300px;"><p>Empleados<br> 
    <spam style="color:white; background-color:rgba(46,154,254)">
        <?php echo $_SESSION['user']['nickname'] . ' ' . $_SESSION['user']['rol'];?>
            
        </spam></p></div>
    <?php

    $pro = new Productos();

    ?> 
    <?php
        try {

        $empleados = $pro->db->prepare("SELECT * FROM usuarios WHERE rol != '$rol'");
        $empleados->execute();
        $empleados = $empleados->fetchAll(PDO::FETCH_OBJ);


    } catch (PDOException $e) {
       echo ('Error: ' . $e->getMessage () . ' // ' . $e->getLine () );
    }
    ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Email</th> 
            <th scope="col">Nick</th>
            <th scope="col">Rol</th>
            <th scope="col">Id</th>
            <th scope="col">Borrar</th>          
        </tr>
        </thead>
        <tbody>
        <?php foreach ($empleados as $entrada) { ?>
                <tr>
                    <td><div><?php echo $entrada->nombre ?></div></td>
                    <td><div><?php echo $entrada->apellido ?></div></td>
                    <td><div><?php echo $entrada->email ?></div></td>
                    <td><div><?php echo $entrada->nickname ?></div></td>
                    <td><div><?php echo $entrada->rol?></div></td>
                    <td><div><?php echo $entrada->id?></div></td>
                    <td>
        <a href="borrarempleado.php?id=<?php echo $entrada->id ?>">
        <input type='button' class="btn" name='borrar' id='borrar' value='Borrar'></a>
                    </td>
                    </tr>
        <?php
          }
        ?>
       <!--  <td>
        <a href="borrarempleados.php?borra_todos=<?php echo $rol ?>">
        <input type='button' class="btn" name='borra_todo' id='borra_todo' value='Borrar todo'></a>            </td> -->
        <td>
        <a href="../Pagina/perfil.php">
        <input type='button' class="btn" name='borra_todo' id='borra_todo' value='Vuelve al Perfil'></a></td>
                    </tr>
        </tbody>
    </table>
</body>
</html>