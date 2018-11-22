<?php

class Categorias extends Conexion{

	public $table = 'categorias';

    //METODOS

    public function busNomPorId($id){

        $buscanombrecat = "SELECT nombre FROM categorias WHERE id = :id";

        $prepare = $this->db->prepare($buscanombrecat);
        $prepare->bindValue(':id',$id);
        $prepare->execute();

        $id=$prepare->fetchAll(PDO::FETCH_OBJ);

        foreach ($id as $key) {
            $i=$key->nombre;
        }
      
           return $i;
    }


    public function buscaIdporNombre($nombre){

    $a = $this->db->query("SELECT id FROM categorias where nombre = '$nombre'")->fetchAll(PDO::FETCH_OBJ);


        return $a;


    }



}