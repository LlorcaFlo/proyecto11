<?php
include('FuncionDesencriptar.php');

$cadenaEncriptada = 'LEGREXIRDRVJLEKVOKFHLVTFEKZVEVKFURJCRJCVKIRJUVCRSVTVURIZFLEVAVDGCFVJTRURMVQHLVKIRSRAFWVCZODVGRXRLENYZJBP';

$cadena = $cadenaEncriptada;

$clave=0;


while(! strpos($cadena, 'FELIX')) {
	$clave--;
	$cadena = desencriptar($cadenaEncriptada, $clave);
}

echo $cadena;

?>
<br><br><br>
<a href="../index.php">Regresar al ménu</a>
