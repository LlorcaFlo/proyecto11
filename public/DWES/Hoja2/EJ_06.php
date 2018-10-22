<!-- 6. Escribir un programa que escriba los números del 1 al 100 en líneas de 10 números. 
Después del 100 el programa debe escribir "Fin de Programa" en una línea nueva. -->
<?php
	for($i=1;$i<=100;$i++){
			echo "Número " .$i . " ";
		if($i % 10==0) {
			echo "<br>";
		}
	
		}
	echo "Fin de programa.";
?>
<br><br><br>
<meta charset="utf-8">
<a href="../index.php">Regresar al ménu</a>