    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
    <?php
    //Hacemos carga de la clase Validacion---
    spl_autoload_register(function($class)
     {
        include '../Clases/' . $class . '.php';
        });

    //Si existe entrada por formulario...
    if (isset($_POST['pulsar'])) {

    //Creamos objeto clase Validacion...  
        $val = new Validacion();

        //Y comprobamos todos las variables de $_POST...
        //Si $_POST['nombre'] no existe o extá vacia cargará el array de clase Validacion con errores...
    if (! isset ($_POST['nick']) OR empty($_POST['nick'])) {
                $val->errores['nick'] = 'Hay que introducir un nick.<br>';

        //Si $_POST['nombre'] no es validado por el objeto de la clase Validacion...
        } elseif (! $val->va_nick($_POST['nick'])) {
               $val->errores['nick'] = 'El nick debe ser al menos de 6 caracteres.<br>';
        } elseif (! $val->nickUnico($_POST['nick'])) {
               $val->errores['nick'] = 'El nick ya está en uso, introduzca otro.<br>';
        }

        //Si $_POST['nombre'] no existe o está vacia cargará el array de errores...
    if (! isset ($_POST['nombre']) OR empty($_POST['nombre'])) {
               $val->errores['nombre'] = 'Hay que introducir un nombre.<br>';

        //Si $_POST['nombre'] no es validado por el objeto de la clase Validacion...
        } elseif (! $val->va_nombre($_POST['nombre'])) {
               $val->errores['nombre'] = 'El nombre no puede contener números y tiene que ser real.<br>';
        }

        //Si $_POST['apellido'] no existe o está vacia cargará el array de errores...
    if (! isset ($_POST['apellido']) OR empty( $_POST['apellido'])) {
               $val->errores['apellido'] = 'Hay que introducir un apellido.<br>';

        } elseif (! $val->va_apellido($_POST['apellido'])) {
                $val->errores['apellido'] = 'El apellido no puede contener números y tiene que ser real.<br>';
        }
        
        // Si $_POST no está definido o está vacio = array erroes con error en en email;
    if (! isset ($_POST['email'])  OR empty($_POST['email'])) {
               $val->errores['email'] = 'No has introducido el email.<br>';
        //Si la funcion valida email devuelve falso...
        } elseif (! $val->va_email($_POST['email'])) {
                $val->errores['email'] = 'El formato no es valido.<br>';
        } elseif (! $val->emailUnico($_POST['email'])) {
               $val->errores['email'] = 'El email ya está en uso, introduzca otro.<br>';
        }

        // Si $_POST no está definido o está vacio = array erroes con error en en clave1;
    if (! isset ($_POST['clave1']) OR empty($_POST['clave1'])) {
                $val->errores['clave1'] = 'No has introducido la clave.<br>';
        }else{

    if(! $val->va_password($_POST['clave1'])) {
                $val->errores['clave1'] = 'La contaseña debe contener al menos "8" caracteres, una minuscula, una mayuscula, y un número.<br>';

    	}elseif($_POST['clave1'] != $_POST['clave2']) {
    		    $val->errores['clave1'] = "Las claves tienen que ser iguales.<br>";

    	   }
        }
    }
    if($val->errores)
    {
    	include 'formularioregistro.php';
    }

     else{
        include 'registrar_usuario.php';
     }



