<!-- 7. Escribir un programa que use una función que indique si un texto pasado como parámetro es un palíndromo o no. -->

<?php 
$cadena = "Hola Mundo123 321odnuM aloH";
//La pasamos a minusculas
$cadena1 = strtolower($cadena);

//Expresión regular para eliminar los caracteres como acentos, podriamos meter mas expresiones
//pero para el ejemplo no es necesario, tambien elimina los espacios.

$cadena1 = preg_replace("/[^a-zA-Z0-9\-]+/", "", $cadena1);
//Remplazamos espacios de las cadenas, pero en la expresion regular ya estan quitados.
//$cadena = str_replace(" ","", $cadena);
//Invertimos la cadena en una nueva variable.

$cadenainv = strrev($cadena1);

echo "<h2>" . comparaCadenas($cadena1,$cadenainv,$cadena) . "</h2>";

function comparaCadenas($s1,$s2,$s3){

	//Compara Dos cadenas!!
if (strcmp($s1, $s2)==0){

        return "<p>La cadena <strong><em>$s3</em></strong> es un palíndromo.</p>";
    } 
    else{
        return "<h3>La cadena $s3 no es un palíndromo.</h3>";
    }
}
 ?>
 <br>
<meta charset="utf-8">