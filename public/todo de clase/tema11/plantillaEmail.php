<?php
class PlantillaEmail extends Plantilla
{
  private $subjetc;
  Private $to;

  public function __construct($to, $subjetc,$body)
  {
      parent::__construct($body);
      $this->to=$to;
      $this->subject=$subjetc;
  }

protected function render() {

  mail($this->to, $this->subject, $this->htmlGenerado);
}

}


 ?>
