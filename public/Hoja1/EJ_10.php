<?php

$edad=$_POST['nacimiento'];

$fechaactual=date("Y");

$Edadactual=$fechaactual-$edad;

if ($edad<=0) {
	echo "<b>No has introducido ningún año</b>";
} else {
	echo "<b>Su edad actual es: " . $Edadactual. " años</b>";

}
	?>
	<br><br><br>
<meta charset="utf-8">
<a href="../index.php">Volver al menú</a>
