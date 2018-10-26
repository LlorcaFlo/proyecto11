<?php


classDbpo
{
  //DATOS DE LA CONEXIÓN

  private $host = 'mysql';
  private $user = 'llorca';
  private $pass = 'llorca';
  private $dbname = 'dbejemplo12';

// CONTENDRÁ EL ERROR EN CASO QUE LO HAYA
public $errors = false;


//LA CONEXIÓN CON LA BASE DE DATOS
public $db;


// INDICA SI ESTAMOS EN MODO DESARROLLO O PRODUCCIÓN
public $modeDEV = true;


//INDICA SI QUEREMOS UNA CONEXIÓN PERSISTENTE O NO
private $persistent = true;


private function connection(){
  $dsn = 'mysql:host=' .$this->host .
        ';dbname='  .$this->dbname;

  $options = [PDO::ATTR_PERSISTENT => $this-> persistent,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];


  try{
      return new PDO($dsn, $this->user,$this->pass, $options);
      }catch(PDOException $e){
      $this->errors = $e->getMessage();

      if($this_>modeDEv){
        print_r($this->errors);
      }else {
        echo "Hay problemas con el accedo a la Base De Datos.
        Prueba mas tarde.";
      }

  }
}

public function __construct()
{
  $this->db = $this->connection();

}
public function getConnection(){

  return $this->db;
}

public function setPass($pass){
  $this->pass = $pass;
  $this->connection();
}

public function setHost($host){
  $this->host = $host;
  $this->connection();
}
public function setUser($user){
  $this->user = $user;
  $this->connection();
}

public function setDbname($dbname){
  $this->dbname = $dbname;
  $this->connection();
}
 public function setBd($data){

   $this->dbName = $data['dbname'];
   $this->host = $data['host'];
   $this->user = $data['user'];
   $this->pass = $data['pass'];

 }

 public funtion all($limit=10)
 {
   $prepare = $this->db->prepare('SELECT * FROM ' .$this->table . ' LIMIT ' . $limit);
   $prepare->execute();

   return $prepare->fetchAll(PDO::FETCH_ASSOC);
 }

 public funtion insert($params)
 {
   
 }


}
