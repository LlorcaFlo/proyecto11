<meta charset="utf-8">
<?php
class Matematicas{

	public static function suma($num1,$num2){

		$resultado=$num1+$num2;
		return $resultado;
	}

	public static function resta($num1,$num2){
	
		if($num2>$num1){
		$resultado=$num2-$num1;
		}else{
		$resultado=$num1-$num2;
		}
		return $resultado;
	}

	public static function multiplicacion($num1,$num2){

		$resultado=$num1*$num2;
		return $resultado;
	}

	public static function division($num1,$num2){
		$resultado=$num1/$num2;
		return round($resultado,2);
		}
	}

$resultados = new Matematicas();

$uno=7;
$dos=6;
echo '<br>';
echo '<h1 style="text-align:center;">-->Resultados<--</h1>';
echo '<h1 style="text-align:center;">----------------------</h1>';
echo '<h3 style="text-align:center;">La suma es: ' . $resultados->suma($uno,$dos) ."</h3>";
echo '<h3 style="text-align:center;">La resta es: ' . $resultados->resta($uno,$dos) ."</h3>";
echo '<h3 style="text-align:center;">La multiplicación es: ' . $resultados->multiplicacion($uno,$dos) ."</h3>";
echo '<h3 style="text-align:center;">La división es: ' . $resultados->division($uno,$dos) ."</h3>";
echo '<h1 style="text-align:center;">----------------------</h1>';
