<link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/estilo.css">
<meta charset="utf-8">
<?php  

 spl_autoload_register(function($class)
    {
        include '../Clases/' . $class . '.php';
    });

	$usu = new Usuario();

	$nick=$_POST['nickname'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$email=$_POST['email'];
	$rol=$_POST['rol'];
	$clave=$_POST['clave1'];

	$datos_usuario = [
		
		'nombre' => $nombre,
        'apellido' => $apellido,
       	'email' => $email,
       	'nickname' => $nick,
        'clave' => $clave,
        'rol' => $rol
    ];

		try{

			$ins_usuario = $usu->insert($datos_usuario);
			
			if(! $ins_usuario){
				include 'registro.php';
			}
			
			else{
				echo '<div style="width:400px;"><br>
				<p>
				Todo correcto, usuario registrado con Nick: <spam style="color:red">' 
				. $nick . 
				'<br></spam> Email : <spam style="color:red">' 
				. $email .
				'<br></spam> Como : <spam style="color:red">'
				. $rol . 
				'</spam></p><br></div><br>'; 

			echo '<div style="width:400px;"><br><a class="btn" href="registro.php">Nuevo Usuario</a><br><br>
				<a class="btn" href="../Pagina/perfil.php">Vuelve al perfil</a><br><br>
				</div>';

			}
		} catch ( PDOException $e ) {
                 echo 'Error! ' . $e->getMessage () . ' // Linea-> ' . $e->getLine ();

            }
             ?>