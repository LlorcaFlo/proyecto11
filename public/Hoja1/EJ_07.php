<!-- Crear un programa que pida un número real y muestre la tabla de multiplicar correspondiente a dicho número perfectamente formateada y con una precisión de dos dígitos. -->
<?php
$num=5;
for ($i=0; $i <= 10 ; $i++) {
	echo $num . " x " . $i . " = " . $num*$i;
	echo "<br>";
}
?>
