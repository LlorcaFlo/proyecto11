<!-- Dado un valor en pesetas, convertirlo a euros. La solución deberá tener dos decimales. -->
<?php


function EUROS($pesetas){
	$euros = $pesetas/166.386;

	echo $pesetas . " pesetas son " . round($euros,2) . " € ";

}
	EUROS(1000);

?>

<br><br><br>
<meta charset="utf-8">
<a href="../index.php">Volver al menú</a>