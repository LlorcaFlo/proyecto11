	var cifra = "";
	var acumulado = 0;
	var sumar = false;
	var restar = false;
	var multiplicar = false;
	var dividir = false;

	// función para que aparezcan los números en la pantalla
	function pantalla_numeros(numero){
	/*
	Accedemos a la propiedad valor del elemento display
	(pantalla de la calculadora) que tenemos en nuestra pag.web 
	utilizando la jerarquía de objetos. 

	Primero hacemos referencia al objeto document(nuestra pag.web), 
	el cual tiene una serie de métodos entre los cuales está getElementById 
	y después accedemos a la propiedad valor de ese elemento.
	Con la siguiente instrucción estamos diciendo que el elemento que 
	tiene el atributo display tiene que tener un valor igual al 
	parametro de la funcion, y todo esto tiene que ocurrir cuando nosostros 
	pulsemos un botón de cualquier número 
	(habremos aplicado el evento onClick="display_numeros" 
	en la caja tipo boton del numero correspondiente)
	value = valor que aparecerá en la caja del elemento display */
		
	//Concatenamos para poder escribir varios números en el display. 
	//Todo lo que escribamos en el display será considerado un string.	
	document.getElementById("pantalla").value = cifra + numero;
		cifra = document.getElementById("pantalla").value;		
	}

	function suma(){
		
		if(restar){
		//para después de restar, sumar
			acumulado -= parseInt(cifra);
			document.getElementById("pantalla").value = acumulado;
		}else if(multiplicar){
		//para después de multiplicar, sumar
			acumulado *= parseInt(cifra);
			document.getElementById("pantalla").value = acumulado;
		}else if(dividir){
		//para después de dividir, sumar
			acumulado /= parseInt(cifra);
			document.getElementById("pantalla").value = acumulado;
		}	
		
		else{
		acumulado += parseInt(cifra);
		
		document.getElementById("pantalla").value = acumulado;
		}
		cifra = "";// resetea el display para escribir la siguiente cifra a sumar
		
		sumar = true;
		restar = false;
		multiplicar = false;
		dividir = false;
	}

		function resta(){
		if(sumar){//para después de sumar, restar
			acumulado += parseInt(cifra);
			document.getElementById("pantalla").value = acumulado;
		}else if(multiplicar){//para después de multiplicar, restar
			acumulado *= parseInt(cifra);
			document.getElementById("pantalla").value = acumulado;
		}else if(dividir){//para después de dividir, restar
			acumulado /= parseInt(cifra);
			document.getElementById("pantalla").value = acumulado;
		}	
		
		else{
			
		if(acumulado == 0) acumulado = parseInt(cifra) - acumulado;	// está mal. Ver directorio PRACT JS	
		else acumulado -= parseInt(cifra);
		
		document.getElementById("pantalla").value = acumulado;
		
		}
		cifra = "";
		restar = true;
		sumar = false;//xq si lo último que hemos hecho es restar esta variable debe pasar a ser false	
		multiplicar = false;
		dividir = false;
	}
	
	function multiplicacion(){
		if(sumar){//para después de sumar, multiplicar
			acumulado += parseInt(cifra);
			document.getElementById("pantalla").value = acumulado;
		}else if(restar){//para después de restar, multiplicar
			acumulado -= parseInt(cifra);
			document.getElementById("pantalla").value = acumulado;
		}else if(dividir){//para después de dividir, multiplicar
			acumulado /= parseInt(cifra);
			document.getElementById("pantalla").value = acumulado;
		}		
		else{		
		if(acumulado == 0) acumulado = parseInt(cifra);	// está mal. Ver directorio PRACT JS		
		acumulado *= parseInt(cifra);
		
		document.getElementById("pantalla").value = acumulado;
		}
		cifra = "";	
		multiplicar = true;	
		sumar = false;
		restar = false;
		dividir = false;
	}
	
	function division(){
		if(sumar){//para después de sumar, dividir
			acumulado += parseInt(cifra);
			document.getElementById("pantalla").value = acumulado;
		}else if(restar){//para después de restar, dividir
			acumulado -= parseInt(cifra);
			document.getElementById("pantalla").value = acumulado;
		}else if(multiplicar){//para después de multiplicar, dividir
			acumulado *= parseInt(cifra);
			document.getElementById("pantalla").value = acumulado;
		}		
		else{
		if(acumulado == 0) acumulado = parseInt(cifra);	// está mal. Ver directorio PRACT JS	
		else acumulado /= parseInt(cifra);
		
		document.getElementById("pantalla").value = acumulado;
		}
		cifra = "";	
		dividir = true;
		sumar = false;
		restar = false;
		multiplicar = false;
	}

		function resultado(){// botón igual
		if(sumar){
			document.getElementById("resultados").value 
			= acumulado + parseInt(cifra);			
		}
		else if(restar){
			document.getElementById("resultados").value 
			= acumulado - parseInt(cifra);
		}
		else if(multiplicar){
			document.getElementById("resultados").value 
			= acumulado * parseInt(cifra);
		}
		else if(dividir){
			document.getElementById("resultados").value 
			= acumulado / parseInt(cifra);
		}
	}

		function reset(){
		
		cifra = "";
		var acumulado = 0;
		document.getElementById("pantalla").value = 0;		
	}

	document.getElementById("pantalla").value = 0;
	
