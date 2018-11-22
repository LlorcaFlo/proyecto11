<link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/estilo.css">
<meta charset="utf-8">
<?php  

 spl_autoload_register(function($class)
    {
        include '../Clases/' . $class . '.php';
    });

	$usu = new Usuario();

	$nick=$_POST['nick'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$email=$_POST['email'];
	$clave=$_POST['clave1'];

	$datos_usuario = [
		'nick' => $nick,
		'nombre' => $nombre,
        'apellido' => $apellido,
       	'email' => $email,
        'clave' => $clave 
    ];

		try{

			$ins_usuario = $usu->insert($datos_usuario);

			if(! $ins_usuario ){
				include 'formularioregistro.php';
			}
			
			else{

				echo '<div><h3>
				Todo correcto, usuario registrado con nick: <spam style="color:red">' 
				. $nick . 
				'</spam> y email: <spam style="color:red">' 
				. $email . 
				'</spam></h3></div><br>'; 

				echo '<div><a class="btn" href="../Login/formulariologin.php">Inicia Sesión</a></div>';

			}
		} catch ( PDOException $e ) {
                 echo 'Error! ' . $e->getMessage () . ' // Linea-> ' . $e->getLine ();

            }
             ?>