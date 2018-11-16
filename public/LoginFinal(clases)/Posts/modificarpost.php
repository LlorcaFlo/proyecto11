<meta charset="utf-8"> 
<link rel="stylesheet" href="../Css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/estilo.css">
<?php
session_start ();

    if (! isset($_SESSION['user']['id'])) {
            header('location:../Pagina/perfilrestringido.php');
 }
    spl_autoload_register ( function ( $class ) {
        include '../Clases/' . $class . '.php';
            });

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modifica tus posts</title>
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">

</head>
<body>

<?php

    $id_usuario = $_SESSION['user']['id'];

    $ent = new Entradas();
    try {

        $consulta = "SELECT * FROM entradas WHERE id_usuario = :id_usuario";
        $consulta = $ent->db->prepare($consulta);
        $consulta->bindValue(':id_usuario', $id_usuario);  
        $consulta->execute();

        $registros = $consulta->fetchAll(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
       echo ('Error: ' . $e->getMessage () . ' // ' . $e->getLine () );
    }

    ?>

<p style="text-align: center;">Modifica tus Posts</p>
<?php echo "<div><h4 style=\"text-align: center; color:rgba(200,200,50,0.9);\">" . $_SESSION['user']['nick'] . "</h4></div>"; ?>
    <table class="table">
        <thead>
        <tr>
        	<th scope="col">Titulo</th>
        	<th scope="col">Categoria</th>
			<th scope="col">Contenido</th> 
			<th scope="col">Borrar</th>
			<th scope="col">Editar</th>           
        </tr>
        </thead>
        <tbody>
        <?php foreach ($registros as $entrada) { ?>
                <tr>
                    <td><div><?php echo $entrada->titulo ?></div></td>
                    <td><div><?php echo $entrada->categoria ?></div></td>
                    <td><div><?php echo $entrada->contenido ?></div></td>
                    <td>

                    <a href="borrarpost.php?id=<?php echo $entrada->id_entradas ?>">
                    <input type='button' class="btn" name='borrar' id='borrar' value='Borrar'></a>
                    </td>
                    <td>
                    <a href="editarpost.php?id=<?php echo $entrada->id_entradas?> & titulo=<?php 
                    echo $entrada->titulo ?> & contenido=<?php echo $entrada->contenido ?> & categoria=<?php echo $entrada->categoria ?>">
                    <input type='button' class="btn" name='editar' id='editar' value='Editar'></a>
                    </td>
                	</tr>
        <?php
          }
        ?>
        <tr>
            <td class='bot'><a href="borrarpost.php?borra_todos=<?php echo $id_usuario ?>">
            <input type='button' class="btn" name='borra_todo' id='borra_todo' value='Borrar todo'></a></td>
            <td class='bot'><a href="../Pagina/perfil.php">
            <input type='button' class="btn" name='borra_todo' id='borra_todo' value='Perfil'></a></td>
        </tr>
        </tbody>
    </table>
