<?php
session_start();

spl_autoload_register ( function ( $class ) {
        include '../Clases/' . $class . '.php';
            });

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

        }
      }
?>