<!-- Escribir un programa que calcule el número de billetes de 500, 200, 100, 50, 20, 10 y 5 así como de monedas de 2, 1, 0'5, 0'20, 0'10, 0'05, 0'02 y 0'01 para desglosar una cantidad C de forma que se necesite la menor cantidad de cada tipo. -->
<?php
$cantidad=2000;
echo "Cantidad a desglosar: " . $cantidad ."<br><br>";

while ($cantidad>0) {
if ($cantidad>=500){
		$cantidad=round($cantidad-500,2);
		$A++;
}
if ($cantidad>=200){
		$cantidad=round($cantidad-200,2);
		$B++;
}
if ($cantidad>=100){
		$cantidad=round($cantidad-100,2);
		$C++;
}
if ($cantidad>=50){
		$cantidad=round($cantidad-50,2);
		$D++;
}
if ($cantidad>=20){
		$cantidad=round($cantidad-20,2);
		$E++;
}
if ($cantidad>=10){
		$cantidad=round($cantidad-10,2);
		$F++;
}
if ($cantidad>=5){
		$cantidad=round($cantidad-5,2);
		$G++;
}
if ($cantidad>=2){
		$cantidad=round($cantidad-2,2);
		$H++;
}
if ($cantidad>=1){
		$cantidad=round($cantidad-1,2);
		$I++;
}
if ($cantidad>=0.50){
		$cantidad=round($cantidad-0.50,2);
		$J++;
}
if ($cantidad>=0.20){
		$cantidad=round($cantidad-0.20,2);
		$K++;
}
if ($cantidad>=0.10){
		$cantidad=round($cantidad-0.10,2);
		$L++;
}
if ($cantidad>=0.05){
		$cantidad=round($cantidad-0.05,2);
		$M++;
}
if ($cantidad>=0.02){
		$cantidad=round($cantidad-0.02,2);
		$N++;
}
if ($cantidad>=0.01){
		$cantidad=round($cantidad-0.01,2);
		$O++;
}
if($cantidad>0.00){
		$vul++;
		echo  'Cantidad restante: ' . $cantidad . ' en la vuelta ' .$vul  .'<br>';
	}
}
	echo
	"<br><br>" ." Recuento de billetes y monedas... " . "<br>" .
	"Billetes de 500 usados: " .$A  . "<br>" .
	"Billetes de 200 usados: " .$B . "<br>" .
	"Billetes de 100 usados: " .$C . "<br>" .
	"Billetes de 50 usados: " .$D . "<br>" .
	"Billetes de 20 usados: " .$E . "<br>" .
	"Billetes de 10 usados: " .$F . "<br>" .
	"Billetes de 5 usados: " .$G . "<br>" .
	"Monedas de 2 usados: " .$H . "<br>" .
	"Monedas de 1 usados: " .$I . "<br>" .
	"Monedas de 0.5 usados: " .$J . "<br>" .
	"Monedas de 0.2 usados: " .$K . "<br>" .
	"Monedas de 0.1 usados: " .$L . "<br>" .
	"Monedas de 0.05 usados: " .$M . "<br>" .
	"Monedas de 0.02 usados: " .$N . "<br>" .
	"Monedas de 0.01 usados: " .$O . "<br>" ;
?>
<br><br><br>
<meta charset="utf-8">
<a href="../index.php">Volver al menú</a>
