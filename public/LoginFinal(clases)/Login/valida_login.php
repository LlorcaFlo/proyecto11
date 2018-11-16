<?php

spl_autoload_register ( function ( $class ) {

    include '../Clases/' . $class . '.php';
    } );

    if (isset($_POST['pulsar'])) {

        $val = new Validacion();

            $nick = $val->sanitiza($_POST['nick']);
            $email = $val->sanitiza($_POST['email']);
            $clavelog = $val->sanitiza($_POST['clavelog']);

        if($nick != "" && $email != ""){
            $val->errores['nick'] = 'Debes intrducir solo una de las dos opciones.<br>';
        }

        if(!isset($_POST['nick']) OR empty($nick)){

            if ($email){
                }else{
                    $val->errores['email'] = 'No has introducido el email.<br>';
                }
        }

        if(!isset($_POST['email']) OR empty($email)){

            if ($nick){
                }else{
                    $val->errores['nick']='No has introducido el nick.<br>';
                }
        }

        if (!isset ($_POST['clavelog']) || empty($clavelog)) {
                    $val->errores['clavelog'] = 'No has introducido la contraseña.<br>';
        }

        if ($nick == ""){

            try{
                    $consulta="SELECT * FROM USUARIOS WHERE email = :email AND clave = :clave";

                    $prepare = $val->db->prepare($consulta);

                    $prepare->bindValue (":email", $email);
                    $prepare->bindValue (":clave", md5($clavelog));

                    $prepare->execute();

        if ($prepare->rowCount() == 0) {
                $val->errores['email']="No existe el usuario con ese email, intentelo de nuevo.";
        }

            }catch(DOException $e) {
                echo ( "Error: Mensaje-> " . $e->getMessage () . ' // Linea->' . $e->getLine () );
            }
        }
        if ($email == ""){

            try{

                    $consulta="SELECT * FROM USUARIOS WHERE nick = :nick AND clave = :clave";

                    $prepare = $val->db->prepare($consulta);

                    $prepare->bindValue (":nick", $nick);
                    $prepare->bindValue (":clave", md5($clavelog));

                    $prepare->execute();

    if ($prepare->rowCount() == 0) {
                $val->errores['nick']="No existe el usuario con ese nick, intentelo de nuevo.";
        }

            }catch(DOException $e) {
                echo ( "Error: Mensaje-> " . $e->getMessage () . ' // Linea->' . $e->getLine () );
            }
        }
    }

    if($val->errores){
             include 'formulariologin.php';
          }
            else{

            session_start();

            while ($i = $prepare->fetch(PDO::FETCH_OBJ)) {

                    $_SESSION['user']['id'] = $i->id;
                    $_SESSION['user']['nick'] = $i->nick;
                    $_SESSION['user']['nombre'] = $i->nombre;
                    $_SESSION['user']['email'] = $i->email;

            $prepare->closeCursor();

            header('location:../Pagina/perfil.php');
             }
}
