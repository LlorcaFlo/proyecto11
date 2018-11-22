<?php

class Productos extends Conexion{

	public $table = 'productos';


        //METODOS

        //TODOS LOS PRODUCTOS//
        public function muestraProductos(){

            $a=$this->db->query("SELECT * FROM " . $this->table)->fetchAll(PDO::FETCH_OBJ);
            return $a;
        }



        public function buscadesc($descripcion, $categoria){
		
        $buscanombre = "SELECT * FROM productos WHERE descripcion = :descripcion AND categoria = :categoria";
    	
        $prepare = $this->db->prepare($buscanombre);
        $prepare->execute(array(":descripcion" => $descripcion, ":categoria" => $categoria));
		
        	if($prepare->rowCount()){
                
            	return true;
            }else{
                
            	return false;
            } 
	    }  

        //ELIMINA PRODUCTOS POR ID
        public function borrarprod($id){
            $this->db->query("DELETE FROM productos WHERE id = $id");
        } 
          
        //ELIMINA TODOS LOS PRODUCTOS POR ID DE USUARIO
        public function borrartodo($id){
            $this->db->query("DELETE FROM productos WHERE id_usuario = $id");
        }

        //ELIMINA TODOS LOS PRODUCTOS
        public function eliminatodo(){
            $this->db->query("DELETE FROM productos");
        }

    



}