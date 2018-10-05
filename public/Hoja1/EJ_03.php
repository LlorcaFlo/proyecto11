<!-- Dado el radio de una circunferencia, calcular su longitud así como su área -->
<?php

$radio=2.5;

$longitud=2*pi()*$radio;
$area = pi()*pi()*$radio;
//$area = pow(pi()*2) * $radio;

echo "Dada una circunferencia de radio: " . $radio . " su longitud es: " . round($longitud,2) ." y su área es: " . round($area,2);

?>
<br><br><br>
<meta charset="utf-8">
<a href="../index.php">Volver al menú</a>