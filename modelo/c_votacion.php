<?php
    class Votacion {
        private $id_votacion;
        private $id_juego;
        private $id_usuario;
        private $categoria;

        function __construct($id_vot, $id_j, $id_us, $cat) {
            $this->id_votacion = $id_vot;
            $this->id_juego = $id_j;
            $this->id_usuario = $id_us;
            $this->categoria =$cat;
        }

        function consultarId() {
            require 'con_BD.php';
            $cons = new mysqli();
            $cons->connect($host, $user, $pass, $bd);
            $error = $cons->connect_error;
            if($error != null) {
                echo "<p>Error $error</p>";
            }else {
                $sqlVot= $cons->query("SELECT id_votacion FROM votaciones WHERE categoria='$this->categoria' and id_usuario=$this->id_usuario"); 
                return $sqlVot->num_rows;
            }
        }

        function addVotacion() {
            require 'con_BD.php';
            $cons = new mysqli();
            $cons->connect($host, $user, $pass, $bd);
            $error = $cons->connect_error;
            if($error != null) {
                echo "<p>Error $error</p>";
            }else {
                $sql= $cons->query("INSERT INTO votaciones (id_juego, id_usuario, categoria) VALUES ('$this->id_juego' , '$this->id_usuario', '$this->categoria')"); 
                return $cons->affected_rows;
            }
        }
    }
?>