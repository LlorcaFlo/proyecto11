<?php

$numero = 10;
$resultado = 1;

//Bucle for con variable en 0(Por lo cual hau que sumar uno a la variable en la multimplicación);
for ($i=0; $i < $numero; $i++) { 
	$resultado *= ($i + 1);
}

	echo 'El resultado de ' . $numero . '! es ' . $resultado . '<br>';
	$resultado = 1;
//Bucle For con varibale en 1;
for ($i=1; $i <= $numero; $i++) { 
	$resultado *= $i;
}

	echo 'El resultado de ' . $numero . '! es ' . $resultado . '<br>';
	$resultado = 1;
	$i = 1;
// Bucle While;
while ($i <= $numero) {
	$resultado *= $i;
	$i++;
}


echo 'El resultado de ' . $numero . '! es ' . $resultado . '<br>';

?>

<br><br><br>
<a href="../index.php">Regresar al Menú</a>