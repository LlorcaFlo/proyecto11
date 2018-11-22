<b>Esto está fuera de PHP</b>
<?= "<h1>Hola Mundo otra vez!!!</h1>" ?>
<i>Por tanto será ignorado</i>

<?php $numero=100 ?>
<?php if($numero < 200) { ?>
<br>Es menor de 200
<?php } else { ?>
<br>Es mayor de 200
<?php } ?>



<br>Veamos otro uso de la variable<br>
<?php
$numero = 'Soy el Alumno';


var_dump($numero);
?>
<br>
<?php
$cadena= "Esto es una variable";

echo $cadena;


$miArray

foreach ($miArray as $key=>$value) {
	echo 'La capital de ' .$key. ' es ' . $value .'.'
}