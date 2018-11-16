<?php

spl_autoload_register ( function ( $class ) {
        include '../Clases/' . $class . '.php';
            });

 session_start();
  
  if (! isset($_SESSION['user']['id'])) {
        header('location:../Pagina/perfilrestringido.php');
 }

 if (isset($_POST['pulsar'])) {

  $val = new Validacion();

  $titulo = $val->sanitiza($_POST['titulo']);
  $contenido = $val->sanitiza($_POST['contenido']);

     if (! isset($_POST['titulo']) || empty($titulo)) {
          $val->errores ['titulo'] = 'Para crear un post es necesario un título.<br>';
      } 
        else if (! isset($_POST['contenido']) ||  empty($contenido)) {
          $val->errores ['titulo'] = 'Para crear un posts estaría bien que llevase algo de contenido.<br>';
      }
      else{

        $slug=str_replace(" ", "-", $titulo);
        $categoria=$_POST['categoria'];

        $ent = new Entradas();

      try{

        if($ent->buscatitulo($titulo, $categoria)){
                    $val->errores['titulo'] = "El titulo ya existe en esta categoria.";
                 }else{

                  $id_categoria = "SELECT * FROM categorias WHERE nombre = :categoria";
                  $id_categoria = $ent->db->prepare($id_categoria);
                  $id_categoria->bindValue(":categoria", $categoria);
                  $id_categoria->execute();

                  $id=$id_categoria->fetch(PDO::FETCH_ASSOC);
                  $id_cat=$id['id'];

                  $datos_entrada = [
                  'titulo' => $titulo,
                  'slug' => $slug,
                  'autor' => $_SESSION['user']['nombre'],
                  'contenido' => $contenido,
                  'categoria' => $categoria,
                  'id_usuario'=> $_SESSION['user']['id'],
                  'id_categoria' => $id_cat
                ];
                  $ins_entrada = $ent->insert($datos_entrada);
                  
                 }

      }catch(Exception $e) {
       echo ('Conexion erronea:' . $e->getMessage() . ' // ' . $e->getLine());

       }
      }
       if ($val->errores) {
                include 'crearpost.php';
        } else {   
                include 'registradopost.php';
        }
      }
?>