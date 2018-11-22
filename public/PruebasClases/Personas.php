<?php
	class Personas{
	// Atributos
	public $nombre = "José";
	public $edad = 33;
	public $estado = "Soltero";

	//Métodos
	public function hablar($mensaje)
	{
		echo $mensaje;
	}
}

	$persona = new Personas();

	$nom = $persona->nombre;
	$ed = $persona->edad;
	$est = $persona->estado;
	$persona->hablar("<h4 style=\"color:red;\">Buenas tardes, mi nombre es " . $nom . ", tengo " . $ed . " años y actualmente estoy " . $est . ".</h4>");

?>
<meta charset="utf-8">

<style type="text/css">
	
	left 
</style>