<!-- 1. Realizar un programa que escriba todos los números enteros menores que cierto entero N
y que a su vez sean múltiplos de dos números A y B conocidos.
Utilizar para ello una función que admita dos parámetros I y J e indique si I es múltiplo de J. -->
<?php

function para($I, $J){
  if ($I % $J == 0){
    echo "Son multiplos";
  } else {
    echo "No son multiplos";
  }



}


para(4, 4);


?>
