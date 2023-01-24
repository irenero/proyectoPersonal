<?php
    class Juego {
        private $id_juego;
        private $nombre_juego;
  
        function __construct($id_juego, $nombre) {
            $this->id_juego = $id_juego;
            $this->nombre_juego = $nombre;
        }

        function consultarId() {
            require 'con_BD.php';
            $cons = new mysqli();
            $cons->connect($host, $user, $pass, $bd);
            $error = $cons->connect_error;
            if($error != null) {
                echo "<p>Error $error</p>";
            }else {
                $sqlJuego= $cons->query("SELECT id FROM juegos where nombre='$this->nombre_juego'"); 
                for ($a = 0; $a<$sqlJuego->num_rows; $a++) {
                    $row = $sqlJuego->fetch_object();
                    return $row->id;
                }
            }
        }
    }
?>