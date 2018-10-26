<?php
//Cuando hereda, hay que tener cuidado!!
include 'lib/Dbpdo.php';

class Usuario extends Dbpdo{
/*
  public function __constructor(){
    echo "Hola, soy un usuario";
  }
  */
  
  public $table = 'usuarios';

}









 ?>
