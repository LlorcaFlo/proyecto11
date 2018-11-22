<?php
 include '../funciones.php';
 include '../conexion.php';
 session_start();

        $id_post = $_POST['id'];
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $categoria = $_POST['categoria'];
        $id_user = $_SESSION['user']['id'];

        $titulo = sanitiza ($titulo);
        $contenido = sanitiza ($contenido);

            try {

            $busid = "SELECT id_usuario FROM entradas WHERE titulo = :titulo AND categoria = :categoria";
  		        
            $busid = $conexion->prepare($busid);
  		    $busid->bindValue(":titulo", $titulo);
  		    $busid->bindValue(":categoria", $categoria);
		    $busid->execute();

            $i = $busid->fetch(PDO::FETCH_OBJ);
            $a = $i->id_usuario;

    if ($busid->rowCount()==1){

            if($id_user==$a){
            
             }else{
                $errores['titulo'] = 'Titulo existente...pruebe con otro...';
             }
}
        } catch (Exception $e){

           echo ('Error: ' . $e->getMessage () . ' // Linea-> ' . $e->getLine ());
        }
    
    if ($errores){
        	include 'editarpost.php';
}else{

    $update = "UPDATE entradas SET titulo = :titulo, contenido = :contenido WHERE id_entradas=:id_post";

                    $update = $conexion->prepare ($update);
                    $update->bindValue (":titulo", $titulo);
                    $update->bindValue (":contenido", $contenido);
                    $update->bindValue (":id_post", $id_post);
                    $update->execute ();

                    header ('location:modificarpost.php');
}       
?>