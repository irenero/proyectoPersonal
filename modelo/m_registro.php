<?php 
    session_start();
    $nombre = $passw = $passw2 = $email = "";

    require 'con_BD.php';
    $cons = new mysqli();
    $cons->connect($host, $user, $pass, $bd);
    $error = $cons->connect_error;
    if($error != null) {
        echo "<p>Error $error</p>";
    }else {

        //se verifican los datos introducidos
        function verificar($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST["nombre"])) {//si el campo esta vacio
                echo "<p>Error, se debe introducir un valor en el nombre</p>";
                echo '<a href="../controlador/registro.php">Volver a intentarlo</a>';
            }else {
                $nombre=verificar($_POST["nombre"]);
            }
            if(empty($_POST["passw"])) {//si el campo esta vacio
                echo "<p>Error, se debe introducir un valor en la contraseña</p>";
                echo '<a href="../controlador/registro.php">Volver a intentarlo</a>';
            }else {
                $passw=verificar($_POST["passw"]);
            }
            if(empty($_POST["passw2"])) {//si el campo esta vacio
            }else {
                $passw2=verificar($_POST["passw2"]);
            }
            if(empty($_POST["email"])) {//si el campo esta vacio
                echo "<p>Error, se debe introducir un valor en el correo electronico</p>";
                echo '<a href="../controlador/registro.php">Volver a intentarlo</a>';
            }else {
                $email=verificar($_POST["email"]);
            }  

            if($passw == $passw2) { //comprobar que las contraseñas son iguales
                if($nombre != "" && $passw != "" && $email != "") { //si las variables contiene valor
                    //se introducen los datos en la base de datos
                    include "../modelo/c_usuarios.php"; //se incluye el php con la clase usuario
                    $newUsuario = new Usuario($nombre, $passw, $email); //se crea un nuevo usuario con los valores introducidos
                    $usuario= $newUsuario->getNombre();
                    $password =  $newUsuario->getPassword();
                    $correo = $newUsuario->getCorreo();
                    $sql= $cons->query("INSERT INTO usuarios (nombre_usuario, password, correo) VALUES ('$usuario', '$password', '$correo')");
                    if ($cons->affected_rows > 0) { //si hay mas de 0 linas afectadas se ha introducido correctamente
                        echo("<h2> Te has registrado correctamente </h2>"); //se muestra un mensaje
                        echo '<a href="../controlador/index.php">Pagina de inicio</a>';
                    } else {
                        echo("<h2> Ha ocurrido un error al registrarte, ya hay un usuario con ese nombre, porfavor elige otro </h2>");
                        echo '<a href="../controlador/registro.php">Volver a intentarlo</a>';
                    }
                }
            }else {
                $errPass = "<p>Error, las contraseñas deben ser iguales</p>";
                echo '<a href="../controlador/registro.php">Volver a intentarlo</a>';
            }                 
        }
    }
    ?>

