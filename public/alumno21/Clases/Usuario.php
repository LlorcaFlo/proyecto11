<?php

    class Usuario extends Conexion{
        public $errores = [];

        
        public $table = 'usuarios';

        public function insert ($params){
            return parent::insert ($this->validateParams ( $params ) );
        }

        private function validateParams ($params){
            if (! $params) return null;
            else {
                $params ['clave'] = $this->codificaClave($params['clave']);
                return $params;
            }
        }

        public function codificaClave ($clave){
            return md5 ($clave);
        }

        public function pasarproductos($id_jefe, $id){
            $this->db->query("UPDATE productos SET id_usuario = $id_jefe WHERE id_usuario = $id");
        }

        public function borrarusuario($id){
        $this->db->query("DELETE FROM usuarios WHERE id = $id");
    }   
    
    public function busNomUser($id){

        $consulta = "SELECT nickname FROM usuarios WHERE id = :id";

        $prepare = $this->db->prepare($consulta);
        $prepare->bindValue(':id',$id);
        $prepare->execute();

        $id=$prepare->fetchAll(PDO::FETCH_OBJ);

        foreach ($id as $key) {
            $i=$key->nickname;
        }
           return $i;
    }
    
    }