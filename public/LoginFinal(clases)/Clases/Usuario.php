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
    }