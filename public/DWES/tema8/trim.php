<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Html</title>
  </head>
  <body>

    <?php
      if ($_POST) {
          if( ! empty($_POST['nombre'])){
            $_POST['nombre'] = trim($_POST['nombre']);
          if(strlen($_POST['nombre']) < 3 ) {
            echo "No es válido el nombre.";
          } else{
            echo "El nombre es válido.";
          }
        } else{
          echo "No he recibido el nombre.";
        }
    }
    ?>

      <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
      Nombre <input type="text" name="nombre">
      <br>
              <input type="submit" name="enviar" value="Enviar">
      </form>
  </body>
</html>
