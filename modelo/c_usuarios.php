<?php
    class Usuario{
        private $nombre;
        private $password;
        private $correo;

        public __construct($nombre, $password, $correo) {
            $this->nombre = $nombre;
            $this->password = $password;
            $this->correo = $correo;
        }

        
    }
?>