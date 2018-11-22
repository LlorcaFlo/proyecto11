<!-- Programa que calcule los números primos del 1 al 100 y los saque por pantalla. -->
<?php
     
function primo($val){

	$primo=0;
	for($i = 2;$i < 100; $i++){
            if($val % $i == 0){
                $primo++;
            }
        }
        if($primo < 2 ){
            return $val;
        }
}

for($i=2;$i<100;$i++){
	primo($i);

	if(isset($i)){
	echo "Numero " . primo($i) . "<br>";
	}
}



        
        
    ?>

<br><br><br>
<meta charset="utf-8">
<a href="../index.php">Regresar al ménu</a>