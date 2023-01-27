<?php
/**
 * archivo que contiene la clase Juego
 * 
 * la clase juego tiene como atributo el id del juego y el nombre del juego
 */
    class Juego {
        private $id_juego;
        private $nombre_juego;
  
        /**
         * metodo constructor para inicializar los atributos de la clase Juego
         * @param id_jugo se guarda el id del juego
         * @param nombre_juego almacena el nombre del juego
         */
        function __construct($id_juego, $nombre) {
            $this->id_juego = $id_juego;
            $this->nombre_juego = $nombre;
        }

        /**
         * funcion consultarId la cual realiza la conexion con la base de datos para realizar una consulta
         * en la que se comprueba si existe el id de la clase juego creado en la base de datos
         * @return row->id retorna el id si existe en la base de datos
         */
        function consultarId() {
            require 'd_acceso.php';
            $cons = new mysqli();
            $cons->connect($host, $user, $pass, $bd);
            $error = $cons->connect_error;
            if($error != null) {
                echo "<p>Error $error</p>";
            }else {
                try {
                    $sqlJuego= $cons->query("SELECT id FROM juegos where nombre='$this->nombre_juego'"); 
                    for ($a = 0; $a<$sqlJuego->num_rows; $a++) {
                        $row = $sqlJuego->fetch_object();
                        return $row->id;
                    }
                } catch (Exception $e) {
                    echo "Se ha producido un error en consulta id de juego: " . $e->getMessage();
                }
                
            }
        }
    }
?>