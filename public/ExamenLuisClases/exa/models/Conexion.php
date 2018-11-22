<?php

    class Conexion
    {
        // Datos de la conexion
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $dbname = 'examen';
        private $charset = 'utf8';

        // Contendrá el error en caso de que haya
        public $errors = false;

        // La conexión con la BD
        public $dbh;

        // Indica si estamos en modo desarrollo o produccion
        public $modeDEV = true;

        // Indica si queremos una conexión persistente o no
        private $persistent = true;

        private function connection ()
        {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=' . $this->charset;

            $options = [ PDO::ATTR_PERSISTENT => $this->persistent,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];

            try {
                return new PDO($dsn, $this->user, $this->pass, $options);

            } catch ( PDOException $e ) {
                $this->errors = $e->getMessage ();
                if ( $this->modeDEV ) {
                    print_r ( $this->errors );
                } else {
                    echo "Hay problemas con el acceso a la BD. Prueba más tarde";
                }
            }
        }

        public function __construct()
        {
            $this->dbh = $this->connection();
        }

        public function getConnection ()
        {
            return $this->dbh;
        }

        public function setPass ($pass)
        {
            $this->pass = $pass;
            $this->connection ();
        }

        public function setHost ($host)
        {
            $this->host = $host;
            $this->connection ();
        }

        public function setUser ($user)
        {
            $this->user = $user;
            $this->connection ();
        }

        public function setDbname ($dbname)
        {
            $this->dbname = $dbname;
            $this->connection();
        }

        public function setDB ($data)
        {
            $this->dbname = $data['dbname'];
            $this->host = $data['host'];
            $this->user = $data['user'];
            $this->pass = $data['pass'];
            $this->charset = $data['charset'];

            $this->connection ();
        }

        public function all ($limit = 10)
        {
            $stmt = $this->dbh->prepare ('SELECT * FROM ' . $this->table . ' LIMIT ' . $limit);

            $stmt->execute ();

            // $this->setQuery ( $stmt );

            return $stmt->fetchAll ( PDO::FETCH_OBJ );
        }


        public function insert ($params)
        {
            if ( ! empty($params)) {  // empty() es true si el valor es null

                $fields = '(' . implode ( ',', array_keys ($params) ) . ')';
                $values = "(:" . implode ( ",:", array_keys ($params) ) . ")";

                $sql = 'INSERT INTO ' . $this->table . ' ' . $fields . ' VALUES ' . $values;

                $stmt = $this->dbh->prepare ( $sql );

                $stmt->execute ( $this->normalizePrepareArray ( $params ) );

                //$this->setQuery ( $stmt );

                return $this->dbh->lastInsertId();

            } else {

                return false;

               //throw new Exception( 'Los parámetros están vacíos' );
            }
        }

        public function setQuery ( $sql )
        {
            if ( $this->modeDEV ) $sql->debugDumpParams ();
        }

        public function lastQuery ()
        {
            return $this->lastQuery;
        }

        private function normalizePrepareArray ( $params )
        {
            foreach ( $params as $key => $value ) {

                $params[ ':' . $key ] = $value;
                unset( $params[ $key ] );
            }

            return $params;
        }

        public function update ( $params, $where )
        {
            if ( ! empty( $params ) ) {

                $fields = '';

                foreach ( $params as $key => $value ) {

                    $fields .= $key . ' = :' . $key . ',';
                }

                $fields = rtrim ( $fields, ',' );

                $key = key ( $where );

                $value = $where[ $key ];

                $sql = 'UPDATE ' . $this->table . ' SET ' . $fields . ' WHERE ' . $key . '=' . $value;

                $prepare = $this->dbh->prepare ( $sql );

                $prepare->execute ( $this->normalizePrepareArray ( $params ) );

                $this->setQuery ( $prepare );

            } else {

                throw new Exception( 'Los parámetros están vacíos' );
            }
        }

        public function delete ( $param )
        {
            if ( ! empty( $param ) ) {

                $key = key ( $param );

                $sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $key . '= :' . $key;

                $prepare = $this->dbh->prepare ( $sql );

                $prepare->execute ( $this->normalizePrepareArray ( $param ) );

                $this->setQuery ( $prepare );

            } else {

                throw new Exception( 'Los parámetros están vacíos' );
            }
        }

        public function getId ( $id )
        {
            $stmt = $this->dbh->prepare ( "SELECT * FROM $this->table WHERE id = $id" );

            $stmt->execute ();
            $this->setQuery ( $stmt );
            return $stmt->fetchAll ( PDO::FETCH_OBJ );
        }

        public function setTransaction ()
        {
            return $this->dbh->beginTransaction ();
        }

        public function endTransaction ()
        {
            return $this->dbh->commit ();
        }

        public function cancelTransaction ()
        {
            return $this->dbh->rollBack ();
        }
    }