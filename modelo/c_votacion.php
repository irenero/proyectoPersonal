<?php
/**
 * archivo que contiene la clase Votacion
 * 
 * la clase juego tiene como atributo el id de la votacion, el id del juego que se vota, el id del usuario que
 * ha realizado la votacion y la categoria que se ha votado
 */
    class Votacion {
        private $id_votacion;
        private $id_juego;
        private $id_usuario;
        private $categoria;

        /**
         * metodo constructor para inicializar los atributos de la clase Votacion
         * @param id_votacion se almacena el id de la votacion
         * @param id_jugo se guarda el id del juego
         * @param id_usuario se almacena el id del usuario
         * @param categoria almacena la categoria votada
         */
        function __construct($id_vot, $id_j, $id_us, $cat) {
            $this->id_votacion = $id_vot;
            $this->id_juego = $id_j;
            $this->id_usuario = $id_us;
            $this->categoria =$cat;
        }

        /**
         * funcion consultarId la cual realiza la conexion con la base de datos para realizar una consulta y
         * retorna el id de la votacion cuando la categoria y el usuario coinciden
         * @return sqlVot->num_rows retorna el id de la votacion si existe en la base de datos
         */
        function consultarId() {
            require 'd_acceso.php';
            $cons = new mysqli();
            $cons->connect($host, $user, $pass, $bd);
            $error = $cons->connect_error;
            if($error != null) {
                echo "<p>Error $error</p>";
            }else {
                try{
                    $sqlVot= $cons->query("SELECT id_votacion FROM votaciones WHERE categoria='$this->categoria' and id_usuario=$this->id_usuario"); 
                    return $sqlVot->num_rows;
                } catch (Exception $e) {
                    echo "Se ha producido un error en consulta id de votacion: " . $e->getMessage();
                }
                
            }
        }

        /**
         * funcion addVotacion la cual realiza la conexion con la base de datos para añadir una nueva votacion con 
         * sus correspondientes datos en la tabla de votaciondes de la base de datos
         * @return cons->affected_rows retorna las lineas afectadas
         */
        function addVotacion() {
            require 'd_acceso.php';
            $cons = new mysqli();
            $cons->connect($host, $user, $pass, $bd);
            $error = $cons->connect_error;
            if($error != null) {
                echo "<p>Error $error</p>";
            }else {
                try {
                    $sql= $cons->query("INSERT INTO votaciones (id_juego, id_usuario, categoria) VALUES ('$this->id_juego' , '$this->id_usuario', '$this->categoria')"); 
                    return $cons->affected_rows;
                } catch (Exception $e) {
                    echo "Se ha producido un error en consulta addVotacion : " . $e->getMessage();
                }
                
            }
        }
    }
?>