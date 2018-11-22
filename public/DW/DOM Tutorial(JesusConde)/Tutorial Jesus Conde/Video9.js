

var cTemp = prompt("Ingrese los grados que quiera pasar: ");

var fTemp = farenheit(cTemp);

function farenheit(a){

 b = ((a * 9) / 5) + 32;

document.write("<br>"+"<div><h2>" + a + "º Celsius son " + b + "º Farenheit</h2></div>");


}