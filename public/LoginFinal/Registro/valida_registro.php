<link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../Css/estilo.css">

<?php

    spl_autoload_register (function ($class)) {

        include '../Clases/' . $class . '.php';
    } );


include '../funciones.php';

$val = new Validacion();

if ($_POST['nick'] == false OR empty($_POST['nick'])) {
            $errores['nick'] = 'Hay que introducir un nick';

    } elseif ($val->va_nick($_POST['nick']) == false) {
            $errores['nick'] = 'El nick debe ser al menos de 6 letras.';
    }

if ($_POST['nombre'] == false OR empty($_POST['nombre'])) {
            $errores['nombre'] = 'Hay que introducir un nombre';

    } elseif ($val->va_nombre($_POST['nombre']) == false) {
            $errores['nombre'] = 'El nombre no puede contener números y tiene que ser real.';
    }

if ($_POST['apellido'] == false  OR empty( $_POST['apellido'] )) {
            $errores['apellido'] = 'Hay que introducir un apellido';

    } elseif ($val->va_apellido($_POST['apellido']) == false) {
            $errores['apellido'] = 'El apellido no puede contener números y tiene que ser real.';
    }
    
// Si $_POST no está definido o está vacio = array erroes con error en en email;
if ($_POST['email'] == false  OR empty($_POST['email'])) {
            $errores['email'] = 'No has introducido el email';

//Si la funcion valida email devuelve falso...
    } elseif ($val->va_email($_POST['email']) == false) {
            $errores['email'] = 'El formato no es valido.';
    }
// Si $_POST no está definido o está vacio = array erroes con error en en clave1;
if ($_POST['clave1'] == false OR empty($_POST['clave1'])) {
            $errores['clave1'] = 'No has introducido la clave';

}else{
	if($val->va_password($_POST['clave1']) == false) {
            $errores['clave1'] = 'La contaseña debe contener al menos "8" caracteres, una minuscula, una mayuscula, y un número.';

	}elseif($_POST['clave1'] != $_POST['clave2']) {
		$errores['clave1'] = "Las claves tienen que ser iguales.";

	}
}

//Convertimos la clave a MD5
$_POST['clave1']=md5($_POST['clave1']);


if($errores){
	include 'formularioregistro.php';
    
}else{
	include 'registrar_usuario.php';
}




