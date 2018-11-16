<?php

session_start ();

spl_autoload_register ( function ( $class ) {

    include '../Clases/' . $class . '.php';
              });

if (isset($_POST['editar'])) {
    

        $ent = new Entradas();
        $val = new Validacion();


            $id_post = $_POST['id'];
            $contenido = $_POST['contenido'];
            $id_user = $_SESSION['user']['id'];
            $titulo = $val->sanitiza($_POST['titulo']);
            $categoria = $_POST['categoria'];

        var_dump($id_post);


        try {
            $i = $ent->busID($titulo, $categoria);
            if($id_user==$i){
            }
            else{
                $val->errores['titulo'] = 'Titulo existente...pruebe con otro...';
            }
        }catch (Exception $e){
                echo ('Error: ' . $e->getMessage () . ' // Linea-> ' . $e->getLine ());
            }
    }
    if ($val->errores){
         	include 'editarpost.php';
    }else{
            echo 'Titulo ' .$titulo . 'Contenido '. $contenido . 'Id post '. $id_post;
            $i=$ent->updateentrada($titulo,$contenido,$id_post);

}
 ?>