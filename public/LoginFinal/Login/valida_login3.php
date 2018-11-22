<?php
include '../funciones.php';
include '../conexion.php';

$_POST['nick']=sanitiza($_POST['nick']);
$_POST['email']=sanitiza($_POST['email']);
$_POST['clavelog']=sanitiza($_POST['clavelog']);
    
if(!isset($_POST['nick']) OR empty($_POST['nick']))
{
if ($_POST['email'])
{
}else{
    $errores['email']='No has introducido el email.';
}
}
if(!isset($_POST['email']) OR empty($_POST['email']))
{
if ($_POST['nick'])
{
}else{
    $errores['nick']='No has introducido el nick.';
}
}
if (!isset ($_POST['clavelog']) || empty($_POST['clavelog'])) {
           $errores['clavelog'] = 'No has introducido la contraseña.';  
        }

        if ($_POST['nick']==""){
try{
    $consulta="SELECT * FROM USUARIOS WHERE email = :email AND clave = :clave";
    $ejecutar=$conexion->prepare($consulta);
    $ejecutar->bindValue (":email", $_POST['email']);
    $ejecutar->bindValue (":clave", md5($_POST['clavelog']));
    $ejecutar->execute();

if ($ejecutar->rowCount() == 0) {
    $errores['email']="No existe el usuario con ese email, intentelo de nuevo.";
         }

}catch(DOException $e) {
    echo ( "Error: Mensaje-> " . $e->getMessage () . ' // Linea->' . $e->getLine () );
        }
 }
if ($_POST['email']==""){
try{
    $consulta="SELECT * FROM USUARIOS WHERE nick = :nick AND clave = :clave";
    $ejecutar=$conexion->prepare($consulta);
    $ejecutar->bindValue (":nick", $_POST['nick']);

    $ejecutar->bindValue (":clave", md5($_POST['clavelog']));
    $ejecutar->execute();

if ($ejecutar->rowCount() == 0) {
    $errores['email']="No existe el usuario con ese nick, intentelo de nuevo.";
         }

}catch(DOException $e) {
    echo ( "Error: Mensaje-> " . $e->getMessage () . ' // Linea->' . $e->getLine () );
        }
 }


if($errores){
             include 'formulariologin.php';
          }
else{
     session_start();
 
     while ($i = $ejecutar->fetch(PDO::FETCH_OBJ)) {

            $_SESSION['user']['id']= $i->id;
            $_SESSION['user']['nick']= $i->nick;
            $_SESSION['user']['nombre']= $i->nombre;
            $_SESSION['user']['email'] = $i->email;
                
            $ejecutar->closeCursor();
            
            header('location:../Pagina/perfil.php');
             }
}