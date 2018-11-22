<!-- Escribir una función (y el programa que la use) que tome un valor entero y devuelva el número con sus dígitos en reversa. Por ejemplo, dado el número 7631 la función deberá devolver el 1367 -->
 <?php
$Numbers=1234;
echo strrev($Numbers)  . '<br>';

$Numbers1 = '[1,2,3,4]';

function desorden($Numbers1){
	for($i=4;$i>=$Numbers1;$i--){
		if($i==0){
		break;
	}
	echo ($i);	
}
}

$a = desorden($Numbers1);
echo $a;
?>

ss<br><br><br>
<meta charset="utf-8">
<a href="../index.php">Regresar al ménu</a>