<?php

class MigasPanContenedor extends MigasPan
{


private $contenedor;

public function __construct($separador, $contenedor)
{
  Parent::__construct($separador);
  $this->contenedor = new Etiqueta($contenedor);
}

public function mostrar ()
{
  return $this->contenido->mostrar(parent::mostrar());
}

}

 ?>
