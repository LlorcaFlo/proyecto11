<?php

    // include '../funciones.php';

    class Entrada extends Conexion
    {
        public $table = 'entradas';
        /* OBTIENE Y DEVUELVE LAS ENTRADAS DEL USUARIO LOGUEADO */
        public function getEntradasUsuario ($id_user)
        {
            $sql = 'SELECT * FROM' . $this->table . ' WHERE id_usuario = $id_user';

            return $this->dbh->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }

        public function deleteEntrada ( $id_post )
        {
            $sql = "DELETE FROM entradas WHERE id_post = $id_post";

            $this->dbh->query ($sql);
        }

        public function search ( $opcion, $terminoBusqueda )
        {
            $sql = "SELECT * FROM entradas WHERE $opcion LIKE :terminoBusqueda";

            $stmt = $this->dbh->prepare ( $sql );

            $stmt->bindValue ( ":terminoBusqueda", "%$terminoBusqueda%" );

            $stmt->execute ();

            return $stmt->fetchAll ( PDO::FETCH_OBJ );
        }

        /****************           ZONA_PUBLICA.php          ***********************/

        /* LISTA TODAS LAS ENTRADAS EN LA ZONA PÚBLICA */
        public function verAllEntradas ( $arrayEntradas )
        {
            foreach ( $arrayEntradas as $entradas ) {

                $id = $entradas->id_post;

                echo
                    '<br>Titulo: ' . $entradas->titulo . '<br>' .
                    'Autor: ' . $entradas->autor . '<br>' .
                    'Fecha: ' . $entradas->fecha . '<br>' .
                    '<a href="ver_entrada?id=' . $id . '">Ir al post</a><br>' .
                    '------------------------------------------';
            }
        }

        /******************************************************************************/


        /***************            VER_ENTRADA.php          *******************/

        /* OBTIENE LA ENTRADA DEL ENLACE */
        public function getPostIndividual ( $data )
        {
            $sql = "SELECT * FROM entradas WHERE  id_post = $data";

            return $this->dbh->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }

        /*******************************************************************************/

        /* OBTIENE LAS CATEGORÍAS EN EL DESPLEGABLE DEL FORMULARIO DE CREAR POST */
        public function getCategorias ()
        {
            $sql = "SELECT * FROM categorias";

            return $this->dbh->query ( $sql )->fetchAll ( PDO::FETCH_OBJ );
        }

        public function getIdCategoria ( $categoria )
        {
            $sql = "SELECT id_categoria FROM categorias WHERE nombre = :categoria";

            $stmt = $this->dbh->prepare ( $sql );
            $stmt->execute ( array ( ":categoria" => $categoria ) );

            while ( $fila = $stmt->fetch ( PDO::FETCH_OBJ ) ) {

                return $id_cat = $fila->id_categoria;
            }

        }

        public function getIdCatTitulo ( $titulo )
        {
            $sql = "SELECT id_categoria FROM entradas WHERE titulo = :titulo";

            $stmt = $this->dbh->prepare ( $sql );
            $stmt->execute ( array ( ":titulo" => $titulo ) );

            while ( $fila = $stmt->fetch ( PDO::FETCH_OBJ ) ) {

                return $id_cat = $fila->id_categoria;
            }

        }

        public function validaTitulo ($titulo, $categoria) {

            $sql = "SELECT id_usuario FROM entradas WHERE titulo = :titulo AND categoria = :categoria";
            $stmt = $this->dbh->prepare ($sql);
            $stmt->execute(array(":titulo" => $titulo,
                                 ":categoria" => $categoria));

           /* while ($fila = $stmt->fetch(PDO::FETCH_OBJ)) {

               return $fila->id_usuario;
            }*/

            $fila = $stmt->fetch(PDO::FETCH_OBJ);

            return $fila->id_usuario;
        }


    }