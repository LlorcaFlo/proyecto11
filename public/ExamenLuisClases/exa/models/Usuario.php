<?php

    // include '../Class/Conexion/Conexion.php';
    //include '../../funciones.php';

    class Usuario extends Conexion
    {
        public $errores = [];

        public $table = 'usuarios';


        public function insert ($params)
        {
            return parent::insert($this->validateParams($params));
        }

        private function validateParams ($params)
        {
            if (! $params) return null;

            else {

                $params ['clave'] = $this->codificaClave ($params['clave']);

                return $params;
            }
        }

        public function sigIn ( $email, $clave )
        {
            $clave = $this->codificaClave ( $clave );

            $sql = 'SELECT * FROM ' . $this->table . ' WHERE email = :email AND clave = :clave ';

            $stmt = $this->dbh->prepare ( $sql );

            $stmt->execute ( array (
                ":email" => $email,
                ":clave" => $clave ) );

            return $stmt->fetchAll (PDO::FETCH_OBJ);
        }

        public function codificaClave ( $clave )
        {
            return md5 ($clave);
        }
    }