<!-- Escribir un programa que cuente de un texto dado:
•	Nº de caracteres en blanco.
•	Nº de dígitos
•	Nº de letras
•	Nº de líneas
•	Nº de otros caracteres
Se deben crear funciones para comprobar si un carácter es numérico, alfanumérico u otra cosa.
 -->
<?php


$cadena = "Hola Mu4n5d6o4!5 miïenyas   !!!       ";

echo $cadena;
echo cuentaEspacio($cadena);
echo cuentaDigitos($cadena);
echo cuentaLetras($cadena);
echo cuentaCaracteres($cadena);


// $cadena=str_split($cadena);
// echo('<pre>');
// print_r($cadena);
// echo('</pre>');





function cuentaEspacio($cadena){
	$cadena =explode(" ", $cadena);
	//count() cuenta los substring de una cadena, las palabras...siempre habra un espacio menos que palabras.
	$tamaño = count($cadena);
 	$espacios = $tamaño - 1;

return "<h3>---> Numero de Espacios: [" . $espacios . "] <---</h3>"; 
}


	function cuentaDigitos($cadena){

	$numeros=preg_replace("/[^0-9]/", "", $cadena);
	$numeros = strlen($numeros);
 	return "<h3>---> Numero de Dígitos: [" . $numeros . "] <---</h3>"; 
  }



function cuentaLetras($cadena){

	$letras=preg_replace("/[^a-zA-Záéíóúàèùìòâêîôû]/", "", $cadena);
	$letras=strlen($letras);

	return "<h3>---> Numero de Letras: [" . $letras . "]<---</h3>";
}


function cuentaCaracteres($cadena){

	$caracteres=preg_replace("/[a-zA-Z0-9 ]/","",$cadena);
	$caracteres=strlen($caracteres)-1;
	return "<h3>---> Numero de Caracteres: [" . $caracteres . "] <---</h3>";
}


?> 

<meta charset="utf-8">

