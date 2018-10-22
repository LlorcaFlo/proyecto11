<!-- Crear un programa que pida un número real y muestre la tabla de multiplicar correspondiente a dicho número perfectamente formateada y con una precisión de dos dígitos. -->
<?php

$campo = $_POST['campo'];

for ($i=0; $i <= 10 ; $i++) { 
	 	echo $campo . ' * ' . $i . ' = ' . ($campo*$i);
	 	echo "<br>";

	 }

?>
<br><br><br>
<a href="../../index.php">Volver al menú</a>
</html>