<!-- Escribir una función que tome el tiempo introducido por el usuario en el formato HH:MM:SS y lo convierta a segundos. El programa utilizará esta función para calcular la diferencia entre dos tiempos dados. -->
<?php
$HoraIn = "24:60:39";

function HoraSeg($HoraIn){
	$Hor = substr($HoraIn, 0, -6);
	$Min = substr($HoraIn, 3, -3);
	$Seg = substr($HoraIn, 6);

			if($Hor>24 || $Hor<0) {
					echo 'No existe ese formato de hora.<br>';	
			}elseif ($Min>59 || $Min<0) {

					echo 'No existe ese formato de minutos. <br>';
			}elseif ($Seg>59 || $Seg<0){

					echo 'No existe ese formato de segundos. <br>';
			}else{

				echo 'La hora introducida es: ' .$Hor .'<br>';
				echo 'Los minutos introducidos son: ' .$Min .'<br>';
				echo 'Los segundos introducidos son: ' .$Seg .'<br>';

			$Horase=($Hor*59*59);
			$Minse=($Min*59);
			
				echo 'La Hora Total introducida en segundos son: ' . ($Horase + $Minse + $Seg) . '<br>';

}

}

	$HoraFinal = HoraSeg($HoraIn);
	echo $HoraFinal;
	echo $p;
?>
<br><br><br>
<meta charset="utf-8">
<a href="../index.php">Regresar al ménu</a>