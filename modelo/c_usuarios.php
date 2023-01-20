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

    }
?>