<!-- Escribir un programa que pregunte el año actual y la edad de una persona y calcule la edad de esa persona en el año 2020. -->
<?php
$Año = $_POST['año'];
$Edad = $_POST['edad'];
$Edadfu = $_POST['edadfu'];

$añoNac = $Año-$Edad;
$Edadfut = $Edadfu-$añoNac;

echo "El Año actual es: " . $Año .".";
echo "<br>";
echo "Y ahora tienes " . $Edad . " años.";
echo "<br>";
echo "Tu año de nacimiento es: " . $añoNac . ".";
echo "<br>";
echo "Y tu edad en " . $Edadfu . " será: " . $Edadfut . ".";
?>

<br><br><br>
<meta charset="utf-8">
<a href="../../index.php">Volver al menú</a>
