<?php
//clase Usuario
    class Usuario{
        private $nombre;
        private $password;
        private $correo;

        //constructor
        function __construct($nombre, $password, $correo) {
            $this->nombre = $nombre;
            $this->password = $password;
            $this->correo = $correo;
        }

        
        public function getNombre() {
            return $this->nombre;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getCorreo() {
            return $this->correo;
        }

        function addUser() {
            require 'con_BD.php';
            $cons = new mysqli();
            $cons->connect($host, $user, $pass, $bd);
            $error = $cons->connect_error;
            if($error != null) {
                $_SESSION['err'] = "<p>Error $error</p>";
            }else {
                $sql= $cons->query("INSERT INTO usuarios (nombre_usuario, password, correo) VALUES ('$this->nombre','$this->password','$this->correo')");
                return $cons->affected_rows; //se retornan las columnas afectadas
            }
        }

        function consultaUsuario() {
            require 'con_BD.php';
            $cons = new mysqli();
            $cons->connect($host, $user, $pass, $bd);
            $error = $cons->connect_error;
            if($error != null) {
                $_SESSION['err'] = "<p>Error $error</p>";
            }else {
                $sql= $cons->query("SELECT nombre_usuario, password FROM usuarios");
                return $sql;
            }
        }

        function idUsuario() {
            require 'con_BD.php';
            $cons = new mysqli();
            $cons->connect($host, $user, $pass, $bd);
            $error = $cons->connect_error;
            if($error != null) {
                echo "<p>Error $error</p>";
            }else {
                $sqlUsuario= $cons->query("SELECT id_usuario FROM usuarios WHERE nombre_usuario='$this->nombre'"); //se obtiene el id del usuario
                for ($i = 0; $i<$sqlUsuario->num_rows; $i++) {
                    $row = $sqlUsuario->fetch_object();
                    return $row->id_usuario;
                }   
            }
        }

        

    }
?>