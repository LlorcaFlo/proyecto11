<?php

class Entradas extends Conexion{

	public $table = 'entradas';

	public function buscatitulo($titulo, $categoria){

		$buscatitulo = "SELECT * FROM entradas WHERE titulo = :titulo AND categoria = :categoria";
    	$prepare = $this->db->prepare($buscatitulo);

		$prepare->execute(array(":titulo" => $titulo, ":categoria" => $categoria));
		
        	if($prepare->rowCount()){
            	return true;
            }else{
            	return false;
            } 
	}  


    public function borrarentradas($id){
        $this->db->query("DELETE FROM entradas WHERE id_entradas = $id");
    }   


    public function borrartodo($id){
        $this->db->query("DELETE FROM entradas WHERE id_usuario = $id");
        }

    public function busIDuser($titulo, $categoria){

        $busid = "SELECT id_usuario FROM entradas WHERE titulo = :titulo AND categoria =:categoria";

        $prepare = $this->db->prepare($busid);

        $prepare->bindValue (":titulo", $titulo);
        $prepare->bindValue (":categoria", $categoria);

        $prepare->execute();

        $i = $prepare->fetch(PDO::FETCH_OBJ);
        $i->id_usuario;

        return $i;

        
        }

    public function updateentrada($titulo, $contenido, $id){

        $update = "UPDATE entradas SET titulo = :titulo, contenido = :contenido WHERE id_entradas=:id_post";

        $update = $this->db->prepare ($update);
        $update->bindValue (":titulo", $titulo);
        $update->bindValue (":contenido", $contenido);
        $update->bindValue (":id_post", $id);
        $update->execute ();

        header ('location:modificarpost.php');
    }

}
