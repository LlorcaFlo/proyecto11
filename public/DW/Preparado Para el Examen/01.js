
/*1. Realiza un programa que solicite el nombre de un país de la Unión Europea,
y que indique si pertenece a la zona euro. En caso de ser un país de la unión europea y no pertenecer al euro debe indicar su moneda.
Si no es un país de la Unión debe volver a pedir el nombre de un pais.(2,5 ptos)

Los 19 estados que forman la zona del euro son:​ Alemania, Austria, Bélgica, Chipre, Eslovaquia, Eslovenia,
España, Estonia, Finlandia, Francia, Grecia, Irlanda, Italia, Letonia, Lituania, Luxemburgo, Malta, Países Bajos y Portugal.
'Rumania','Croacia','Bulgaria','Hungría','Polonia','República Checa','Suecia',
'Dinamarca','Reino Unido'


*/
var pais = ['Alemania', 'Austria', 'Bélgica', 'Chipre', 'Eslovaquia', 'Eslovenia',
'España', 'Estonia', 'Finlandia', 'Francia', 'Grecia', 'Irlanda', 'Italia', 'Letonia', 
'Lituania', 'Luxemburgo', 'Malta', 'Países Bajos','Portugal'];

var pais2 = ['Rumania','Croacia','Bulgaria','Hungría','Polonia','República Checa','Suecia',
'Dinamarca','Reino Unido'];

 var moneda =['Leu','Kuna','Lev','Forinto','Złoty','Corona checa','Corona sueca',
  'Corona danesa','Libra esterlina'];

  var ritmo==false;
 do {

 	var pedir = prompt("Inserte un país que esté en la Unión Europea.");


 	for(var i=0;i<pais.length;i++){

 		if(pedir==pais[i]){
 			ritmo==true;
 			alert("Es un pais de la Unión Europea");


 			for(var j=0;j<pais2.length;j++){
 				if(pedir==pais2[j]) {

 					alert("pero su moneda es " + moneda[j] +".");

 				}
 			}
 		}
 	}
 }while(ritmo==false;)



