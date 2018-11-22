<?php

spl_autoload_register ( function ( $class ) {

    include '../Clases/' . $class . '.php';
    } );

    if (isset($_POST['pulsar'])) {

        $val = new Validacion();

        $email = $val->sanitiza($_POST['email']);
        $clavelog = $val->sanitiza($_POST['clavelog']);

        echo $email;
        echo $clavelog;

}
        if( ! isset($_POST['email']) OR empty($email)){

            $val->errores['email']='No has introducido el email.<br>';
            }

        elseif (! isset ($_POST['clavelog']) || empty($clavelog)) {
                    $val->errores['clavelog'] = 'No has introducido la contraseña.<br>';
        }

else{

        try{
                $consulta="SELECT * FROM usuarios WHERE email = :email AND clave = :clave";

                $prepare = $val->db->prepare($consulta);

                    $prepare->bindValue (":email", $email);
                    $prepare->bindValue (":clave", md5($clavelog));

                    $prepare->execute();

        if ($prepare->rowCount() == 0) {
                $val->errores['email']="No existe el usuario con ese email, intentelo de nuevo.";
        }

            }catch(DOException $e) {
                echo ("Error: Mensaje-> " . $e->getMessage () . ' // Linea->' . $e->getLine ());
            }
}

    if($val->errores){
             include 'formulariologin.php';
          }else{

            session_start();

            while ($i = $prepare->fetch(PDO::FETCH_OBJ)) {

                    $_SESSION['user']['id'] = $i->id;
                    $_SESSION['user']['nickname'] = $i->nickname;
                    $_SESSION['user']['nombre'] = $i->nombre;
                    $_SESSION['user']['email'] = $i->email;
                    $_SESSION['user']['rol'] = $i->rol;
                
            $prepare->closeCursor();

            header('location:../Pagina/perfil.php');
            }

}
