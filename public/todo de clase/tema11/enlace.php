<?php

class Enlace extends Etiqueta
{
	// private $texto; será $contenido de la clase padre Etiqueta
	private $url;

	public function __construct($contenido, $url)
	{
		parent::__construct("a", "$contenido", "href=\"$url\"");
	// $this->texto = $texto; será $contenido de la clase padre Etiqueta
		$this->url = $url;
	}

}
