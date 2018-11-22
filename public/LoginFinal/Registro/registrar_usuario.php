<link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/estilo.css">
<meta charset="utf-8">
<?php  
include '../conexion.php';
$nick=$_POST['nick'];
$email=$_POST['email'];
//Intenta...
try {
//Consultamos base de datos...
	//AÑADIR CAMPO NICK
	$cons_email = "SELECT * FROM usuarios WHERE email = '$email'";
//Ejectamos consulta con la conexión
	$ejecutar=$conexion->prepare($cons_email);
	$ejecutar->bindValue (":email", $email);
	$ejecutar->execute();

	if($ejecutar->rowCount()==false){
		}
		else
		{
		$errores['email'] = 'Email ya existe, introduce otra dirección';
	}

	$cons_nick = "SELECT * FROM usuarios WHERE nick = '$nick'";
	$ejecutar=$conexion->prepare($cons_nick);
	$ejecutar->bindValue (":nick", $nick);
	$ejecutar->execute();

	if($ejecutar->rowCount()==false){


	}else{
		$errores['nick'] = 'Nick ya existe, introduce otro Nick';
		}
	

} catch ( Exception $e ) {
 echo ('Conexion con la base de datos erronea:' . $e->getMessage() . ' -- ' . $e->getLine());
}

if ($errores) {

        include 'formularioregistro.php';

    } else {

		$introduce= "INSERT INTO usuarios (nick, nombre, apellido, email, clave) VALUES (:nick, :nombre, :apellido, :email, :clave)";

		$ejecutar=$conexion->prepare($introduce);
		$ejecutar->execute(array (
		":nick"=> $nick,
		":nombre"=> $_POST['nombre'],
		":apellido"=> $_POST['apellido'],
		":email" => $email,
		":clave" =>	$_POST['clave1'])
	);

    echo '<div><h3>Todo correcto, usuario registrado con nick: ' . $nick . ' y email: ' .$email .'</h3></div><br>'; 
	echo '<div><a class="btn" href="../Login/formulariologin.php">Inicia Sesión</a></div>';
       
    }



?>