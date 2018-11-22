<?php
include '../funciones.php';
include '../conexion.php';

$_POST['nick']=sanitiza($_POST['nick']);
$_POST['email']=sanitiza($_POST['email']);
$_POST['clavelog']=sanitiza($_POST['clavelog']);


if (! isset($_POST['email'] ) || empty($_POST['email'])) {
            $errores['email'] = 'No has introducido el email.';
        }
else if (!isset ($_POST['clavelog']) || empty($_POST['clavelog'])) {
            $errores['clavelog'] = 'No has introducido la contraseña.';  
        }
           try{

            $consulta="SELECT * FROM USUARIOS WHERE email = :email AND clave = :clave";
            $ejecutar=$conexion->prepare($consulta);
            $ejecutar->bindValue (":email", $_POST['email']);
            $ejecutar->bindValue (":clave", md5 ($_POST['clavelog']));

            $ejecutar->execute();

            if ($ejecutar->rowCount() == 0) {

                $errores['email']="No existe el usuario, intentelo de nuevo.";

            }
            	}catch ( PDOException $e ) {

                echo ( "Error: Mensaje-> " . $e->getMessage () . ' // Linea->' . $e->getLine () );
            }
            if($errores){
            	include 'formulariologin.php';
            }else{

            session_start();

            while ($i = $ejecutar->fetch(PDO::FETCH_OBJ)) {

                $_SESSION['user']['id']= $i->id;
                $_SESSION['user']['nick']= $i->nick;
                $_SESSION['user']['nombre']= $i->nombre;
                $_SESSION['user']['email'] = $i->email;
                
            }

            $ejecutar->closeCursor();

            header('location:../Pagina/perfil.php');
            
            echo $_SESSION['user']['id'] . $_SESSION['user']['nick']
            . $_SESSION['user']['nombre'] . $_SESSION['user']['email'];
        }


