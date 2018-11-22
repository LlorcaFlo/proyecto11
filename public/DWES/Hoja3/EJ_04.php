<!-- Escribir un programa que calcule el número combinatorio M/N que era M!/(N!*(M-N)!).
Para ello hará uso de la función factorial. -->
<?php
function factorial($numero) {
	$resultado = 1;
	for ($i=1; $i <= $numero; $i++) { 
		$resultado *= $i;
	}
	return $resultado;
}

$m = 6;
$n = 4;

$solucion = factorial($m) / (factorial($n) * factorial($m-$n));

echo "El resultado es " . $solucion;

?>

<br><br><br>
<a href="../index.php">Regresar al Menú</a>