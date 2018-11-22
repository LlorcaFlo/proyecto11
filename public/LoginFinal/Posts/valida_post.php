<?php

    include '../funciones.php';
    include '../conexion.php';

session_start ();

    if (! isset($_SESSION['user']['id'])) {
            header('location:../Pagina/perfilrestringido.php');
}

$titulo= sanitiza($_POST['titulo']);
$contenido= sanitiza($_POST['contenido']);

if (! isset($titulo) || empty($titulo)) {

        $errores ['titulo'] = 'Para crear un post es necesario un título.';

    } else if (! isset($contenido) || empty($contenido) ) {

    $errores ['contenido'] = 'Para crear un posts estaría bien que llevase algo de contenido.';

    }else{

     	$slug=str_replace(" ", "-", $titulo);
     	$categoria=$_POST['categoria'];
   
     	try {

    	$bustitulo = "SELECT * FROM entradas WHERE titulo = :titulo AND categoria = :categoria";
  		$bustitulo = $conexion->prepare($bustitulo);
  		$bustitulo->bindValue(":titulo", $titulo);
  		$bustitulo->bindValue(":categoria", $categoria);
		  $bustitulo->execute();

  		if (! $bustitulo->rowCount() == 1){

  		$id_categoria = "SELECT * FROM categorias WHERE nombre = :categoria";
  		$id_categoria = $conexion->prepare($id_categoria);
  		$id_categoria->bindValue(":categoria", $categoria);
		  $id_categoria->execute();

		while($fila=$id_categoria->fetch(PDO::FETCH_ASSOC))
		{
			$id_cat=$fila['id'];
		}

		$consulta = "INSERT INTO entradas (titulo, slug, autor, contenido, categoria, fecha,
     	id_usuario, id_categoria) VALUES (:titulo, :slug, :autor, :contenido, :categoria,
    	now(), :id_usuario, :id_categoria)";

 			$ejecutar=$conexion->prepare($consulta);

 			$ejecutar->execute(array(
 			":titulo"=>$titulo,
 			":slug"=>$slug,
 			":autor"=>$_SESSION['user']['nombre'],
 			":contenido"=>$contenido,
 			":categoria"=>$categoria,
 			":id_usuario"=>$_SESSION['user']['id'],
 			":id_categoria"=>$id_cat));
			}else{
   					$errores['titulo'] = 'Titulo existente...pruebe con otro...';
    		}

    }catch ( Exception $e ) {
		echo ('Conexion erronea:' . $e->getMessage() . ' // ' . $e->getLine());
}
}
  if ($errores) {
      include 'crearpost.php';

  }else{
    include 'registradopost.php';

    }
