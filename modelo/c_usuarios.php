<?php
/**
 * archivo que contiene la clase Usuario
 * 
 * la clase Usuario tiene como atributo el nombre, la contraseña y el correo del usuario
 */
    class Usuario{
        private $nombre;
        private $password;
        private $correo;

        /**
         * metodo constructor para inicializar los atributos de la clase Usuario
         * @param nombre se almacena el nombre del usuario
         * @param password se almacena la contraseña dek usuario
         * @param correo se almacena el correo del usuario
         */
        function __construct($nombre, $password, $correo) {
            $this->nombre = $nombre;
            $this->password = $password;
            $this->correo = $correo;
        }

        /**
         * funcion getNombre que se encarga de retorna el nombre guardado del usuario
         * @return this->nombre se retorna el nombre
         */
        public function getNombre() {
            return $this->nombre;
        }

        /**
         * funcion getNombre que se encarga de retorna la contraseña guardado del usuario
         * @return this->password se retorna la contraseña
         */
        public function getPassword() {
            return $this->password;
        }

        /**
         * funcion getNombre que se encarga de retorna el correo guardado del usuario
         * @return this->correo se retorna el correo
         */
        public function getCorreo() {
            return $this->correo;
        }

        /**
         * funcion addUser la cual realiza una conexion a la base de datos para introducir los datos del usuario
         * en la tabla usuarios de la base de datos 
         * @return cons->affected_rows se retornan las columnas afectadas
         */
        function addUser() {
            require 'd_acceso.php';
            $cons = new mysqli();
            $cons->connect($host, $user, $pass, $bd);
            $error = $cons->connect_error;
            if($error != null) {
                $_SESSION['err'] = "<p>Error $error</p>";
            }else {
                try {
                    $sql= $cons->query("INSERT INTO usuarios (nombre_usuario, password, correo) VALUES ('$this->nombre','$this->password','$this->correo')");
                    return $cons->affected_rows; 
                } catch (Exception $e) {
                    echo "Se ha producido un error en añadir usuario de usuario : " . $e->getMessage();
                }
            }
        }

        /**
         * funcion consultaUsuario la cual realiza una conexion a la base de datos para realizar una consulta,
         * la cual devuelve el nombre de todos los usuarios almacenados en la base de datos
         * @return sql se retornan los resultados de la consulta
         */
        function consultaUsuario() {
            require 'd_acceso.php';
            $cons = new mysqli();
            $cons->connect($host, $user, $pass, $bd);
            $error = $cons->connect_error;
            if($error != null) {
                $_SESSION['err'] = "<p>Error $error</p>";
            }else {
                try {
                    $sql= $cons->query("SELECT nombre_usuario, password FROM usuarios");
                    return $sql;
                }catch (Exception $e) {
                    echo "Se ha producido un error en consulta usuario de usuario : " . $e->getMessage();
                }
                
            }
        }

        /**
         * funcion idUsuario la cual realiza una conexion a la base de datos para realizar una consulta para
         * comprobar si el id del usuario existe en la base de datos
         * @return row->id_usuario se retornan el id del usuario
         */
        function idUsuario() {
            require 'd_acceso.php';
            $cons = new mysqli();
            $cons->connect($host, $user, $pass, $bd);
            $error = $cons->connect_error;
            if($error != null) {
                echo "<p>Error $error</p>";
            }else {
                try {
                    $sqlUsuario= $cons->query("SELECT id_usuario FROM usuarios WHERE nombre_usuario='$this->nombre'"); //se obtiene el id del usuario
                for ($i = 0; $i<$sqlUsuario->num_rows; $i++) {
                    $row = $sqlUsuario->fetch_object();
                    return $row->id_usuario;
                }  
                }catch (Exception $e) {
                    echo "Se ha producido un error en id usuario de usuario : " . $e->getMessage();
                }
            }
        }
    }
?>