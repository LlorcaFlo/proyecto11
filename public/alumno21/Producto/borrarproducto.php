  <?php
    session_start ();
          if (! isset($_SESSION['user']['id'])) {
              header('location:../Pagina/perfilrestringido.php');
          }

    spl_autoload_register(function($class){

          include '../Clases/' . $class . '.php';
      });

      $pro = new Productos();

    // echo $rol;

    if (isset($_GET['id'])) {

          $id=$_GET['id'];

     $pro->borrarprod($id);

   } else { 

    $rol=$_GET['borra_todos'];
        
        if($rol=="Jefe"){

        $pro->eliminatodo();

   } else{

      $id=$_GET['borra_todos'];

        $pro->borrartodo($id);
   }
  }
    	 header ('location:muestraproducto.php');
