<!-- 1. Escribir un programa que dados tres números, si el primero es negativo, calcule el producto de los tres y, en caso contrario, calcular la suma. -->
<?php
$num1=-6;
$num2=3;
$num3=5;

if($num1 <= 0 ){
	echo 'El Producto de ' . $num1 .' x ' . $num2 .' x '  . $num3 .'  ' . ' es igual a : ' . ($num1*$num2*$num3);

}else{
	echo 'La suma de ' . $num1 .' + ' . $num2 .' + '  . $num3 .' ' . ' es igual a : ' . 
		($num1+$num2+$num3);	
}

?>
<br><br><br>
<meta charset="utf-8">
<a href="../index.php">Regresar al ménu</a>