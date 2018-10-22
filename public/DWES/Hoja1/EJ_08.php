<!-- Mostrar en una tabla el cuadrado y el cubo de los cinco primeros números enteros que siguen a uno
  previamente introducido. Los datos deben aparecer encolumnados. -->
<?php
$Num=7;
$Cont=0;

echo "<table align=center width=80% border=1 cellspacing=0 cellpadding=2>";
echo "<tr>";
echo "<th>Número</th>";
echo "<th>Cuadrado del número</th>";
echo "<th>Triple del número</th>";
echo "</tr>";
while($Cont != 5){
echo "<tr>";
echo "<td>". $Num, "</td>";
echo "<td>". $Num*$Num,"</td>";
echo "<td>". $Num*$Num*$Num,"</td>";
echo "</tr>";
$Num++;
$Cont++;
}
echo "</table>";

?>
<br><br><br>
<meta charset="utf-8">
<a href="../index.php">Volver al menú</a>
