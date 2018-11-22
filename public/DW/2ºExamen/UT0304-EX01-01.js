function pulsaBoton(e){

	var parrafo02 = document.createElement("p");
	parrafo02.id = 'parrafo02';
	document.body.appendChild(parrafo02);	


	if 
		(e.target.name == 'boton01'){
		parrafo01.innerHTML= 'Todo gran poder conlleva una gran responsabilidad.';
	}


	if 
		(e.target.name == 'boton02')
		{
		parrafo02.innerHTML = 'Nuestros antepasados lo llamaron magia, tú lo llamas ciencia. Vengo de una tierra en la que ambas son lo mismo.';	
	}

	if 
		(e.target.name == 'boton03')
		{

		boton2 = document.getElementById('parrafo02');
		parrafo01.innerHTML='';
		parrafo02.parentNode.removeChild(parrafo01);
		parrafo02.parentNode.removeChild(boton2);
	}
}


function asocia(){
  document.body.addEventListener('click',pulsaBoton);
}
document.addEventListener('DOMContentLoaded',asocia);
