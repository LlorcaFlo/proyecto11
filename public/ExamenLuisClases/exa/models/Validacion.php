<?php

    class Validacion extends Conexion
    
    {
        public $errores = [];
        
        public function mostrar_errores($errores)
        {
            echo '<ul class="listaerrores">';
            foreach ( $errores as $error ) {
                echo "<li>$error</li>";
            }
            echo '</ul>';
        }

        public function mostrar_campo($campo)
        {
            if (isset($_POST[$campo ])) {
                echo ' value="' . $_POST[$campo] . '"';
            }
        }

        public function mostrar_error_campo ($campo,$errores)
        {
            if (isset($errores[$campo])) {
                echo '<span class="errorf">' . $errores[$campo] . '</span>';
            }
        }

        public function nombreValido ( $nombre )
        {
            return preg_match ( '/^([A-ZÁÉÍÓÚ]{1}[A-Za-zñáéíóú]{2,}[\sdel]*[-]?)+$/', $nombre );
        }

        public function apellidoValido ( $apellido )
        {
            return preg_match ( '/^([A-ZÁÉÍÓÚ]{1}[\']?[a-zñáéíóú]{2,}[\sdelasy]*[-]?)+$/', $apellido );
        }

        public function nickValido ( $nick )
        {
            return preg_match ( '/([A-ZÁÉÍÓÚa-zñáéíóú@#&%,\.\-\*\d][\s]*){3,20}$/', $nick );
        }

        private function sanitizeEmail ( $data )
        {
            return filter_var ( $data, FILTER_SANITIZE_EMAIL );
        }

        private function validateEmail ( $data )
        {
            return filter_var ( $data, FILTER_VALIDATE_EMAIL );
        }

        private function checkEmail ( $data )
        {
            return checkdnsrr ( explode ( '@', $data )[ 1 ], 'MX' );
        }

        function emailValido ( $email )
        {
            $email = $this->sanitizeEmail ( $email );
            $email = $this->validateEmail ( $email );

            return $email ? $this->checkEmail ( $email ) : false;
        }

        public function passwordValido ( $password )
        {
            //return preg_match ( '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#&%,\.\-\*])[\w@#&%,\.\-\*]{6,}/', $password );
            return true;
        }

        private function filtrar ( $datos )
        {
            $datos = trim ( $datos );
            $datos = stripslashes ( $datos );
            $datos = htmlspecialchars ( $datos );
            return $datos;
        }

        public function validaIsset ( $data )
        {
            $data_filtrado = $this->filtrar ( $data );
            return ! isset($data) || empty($data_filtrado) ? false : $data_filtrado;
        }

        public function duplicateEmail ($email)
        {
            $sql = "SELECT * FROM usuarios WHERE email = :email";

            $stmt = $this->dbh->prepare($sql);

            $stmt->execute ( array ( ":email" => $email ) );

            return $stmt->rowCount () === 1 ? true : false;
        }

        public function duplicateNick ($nick)
        {
            $sql = "SELECT * FROM usuarios WHERE nickname = :nick";

            $stmt = $this->dbh->prepare ( $sql );

            $stmt->execute ( array ( ":nick" => $nick ) );

            return $stmt->rowCount () === 1 ? true : false;
        }

    }