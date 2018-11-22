  <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
  <?php
  session_start();

  spl_autoload_register ( function ( $class ) {
          include '../Clases/' . $class . '.php';
              });

   if (isset($_POST['pulsar'])) {

    $val = new Validacion();
    $cat = new Categorias();
    $pro = new Productos();

    $nombre = $val->sanitiza($_POST['nombre']);
    $descripcion = $val->sanitiza($_POST['descripcion']);
    $marca= $val->sanitiza($_POST['marca']);

       if (! isset($_POST['nombre']) || empty($nombre)) {
            $val->errores ['nombre'] = 'Para ingresar un producto es necesario un nombre.<br>';
        } 
        else if (! isset($_POST['marca']) || empty($marca)) {
            $val->errores ['marca'] = 'Para ingresar un producto es necesario su marca.<br>';
        } 
          else if (! isset($_POST['descripcion']) ||  empty($descripcion)) {
            $val->errores ['marca'] = 'Para ingresar un producto estaría bien que llevase alguna descripcion.<br>';
        }
        else{

              $categoria=$_POST['categoria'];
              $categoria = explode('-', $categoria);
              $categoria=$categoria['0'];

        try{

          $consulta =$cat->buscaIdporNombre($categoria);

                  foreach ($consulta as $key) {
                      $id_cat=$key->id;
                  }
          

          if($pro->buscadesc($descripcion, $id_cat)){

              $val->errores['marca'] = "El producto con esa descricion ya existe en esta categoria.";

                   }

                   else{

                    $datos_producto = [
                    'nombre' => $nombre,
                    'descripcion' => $descripcion,
                    'marca'=> $marca,
                    'id_usuario'=> $_SESSION['user']['id'],
                    'categoria' => $id_cat
                  ];

                    $ins_entrada = $pro->insert($datos_producto);
    
                   }

        }catch(Exception $e) {
         echo ('Conexion erronea:' . $e->getMessage() . ' // ' . $e->getLine());

         }
        }
         if ($val->errores) {

                  include 'creaproducto.php';

          } else {  
            
                    $cat = new Categorias();
                    $nombre_cat = $cat->busNomPorId($id_cat);

                 echo 
                 '<br>
                 <div style="width:300px;"><p>Producto registrado en <br><spam style="color:red;">' . $nombre_cat . 
                 ' </spam></p><br>
                 <a class="btn" href="../Pagina/perfil.php">Vuelve a tu perfil</a><br><br>
                 <a class="btn" href="../Producto/muestraproducto.php">Edita tus productos</a><br><br>
                 <a class="btn" href="../Producto/creaproducto.php">Ingresa un nuevo producto</a><br><br></div>';
                }
  }
  ?>