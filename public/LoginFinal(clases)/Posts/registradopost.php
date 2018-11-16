<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/estilo.css">

<?php

if(!$_SESSION){

session_start();
    if (! isset($_SESSION['user']['id'])) {
        header('location:../Pagina/perfilrestringido.php');
 }
}
	 spl_autoload_register ( function ( $class ) {

              include '../Clases/' . $class . '.php';
              }); 
    $ent = new Entradas();

	echo '<div><h2>Post registrado en ' . $categoria . ' </h2></div>';

		$titulo=$_POST['titulo'];
	

	try {

        $sentencia = "SELECT * FROM entradas WHERE titulo = '$titulo' AND categoria = '$categoria'";
   
			$registros = $ent->db->query($sentencia)->fetchAll(PDO::FETCH_OBJ);

            foreach ($registros as $entrada ) {
                echo
                    '<br>
                    <div><spam style="color:rgba(255,75,100,0.7);">Titulo: </spam>' 
                    . $entrada->titulo . '<br>' . 
                    '<spam style="color:rgba(255,75,100,0.7)">Autor: </spam>' 
                    . $entrada->autor . '<br>' .
                    '<spam style="color:rgba(255,75,100,0.7)">Fecha: </spam>' 
                    . $entrada->fecha . '<br>' .
                    '<spam style="color:rgba(255,75,100,0.7)">Categoria: </spam>' 
                    . $entrada->categoria . '<br></div>';
                    '<spam style="color:rgba(255,75,100,0.7)">Contenido: </spam>' 
                    . $entrada->contenido . '<br></div>';
            }

        } catch ( PDOException $e ) {

            echo( 'Error! ' . $e->getMessage () . ' // Linea->' . $e->getLine () );
        }

   	echo '<br><div><a class="btn" href="../Pagina/perfil.php">Perfil</a></div>';
