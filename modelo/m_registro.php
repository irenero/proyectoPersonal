<?php 
/**
 * archivo m_registro el cual se encarga de recibir los datos de nombre, contraseña y email del formulario de registro,
 * y se comprueba mediante la clase usuario si ese usuario con los datos introducidos existe en la base de datos y
 * si es asi se crea el usuario añadiendolo a la base de datos, si no existe el usuario o ocurre algun error al introducir los datos
 * se le informa al usuario mediante mensajes
 */
    session_start();

    $nombre = $passw = $passw2 = $email = "";

    //se verifican los datos introducidos
    function verificar($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["nombre"])) {//si el campo esta vacio
            $_SESSION['nombErr'] = "<p>Error, se debe introducir un valor en el nombre</p>";
        }else {
            $nombre=verificar($_POST["nombre"]);
            $_SESSION['nombErr'] ="";
        }
        if(empty($_POST["passw"])) {//si el campo esta vacio
            $_SESSION['passErr'] = "<p>Error, se debe introducir un valor en la contraseña</p>";
        }else {
            $passw=verificar($_POST["passw"]);
            $_SESSION['passErr']="";
        }
        if(empty($_POST["passw2"])) {//si el campo esta vacio
        }else {
            $passw2=verificar($_POST["passw2"]);
        }
        if(empty($_POST["email"])) {//si el campo esta vacio
            $_SESSION['emailErr'] = "<p>Error, se debe introducir un valor en el correo electronico</p>";
        }else {
            $email=verificar($_POST["email"]);
            $_SESSION['emailErr'] ="";
        }  

        if($passw == $passw2) { //comprobar que las contraseñas son iguales
            if($nombre != "" && $passw != "" && $email != "") { //si las variables contiene valor
                //se introducen los datos en la base de datos
                include "../modelo/c_usuarios.php"; //se incluye el php con la clase usuario
                $newUsuario = new Usuario($nombre, $passw, $email); //se crea un nuevo usuario con los valores introducidos
                $rows = $newUsuario->addUser(); //se invoca la funcion para crear usuarios desde la clase usuario
                if ($rows > 0) { //si hay mas de 0 linas afectadas se ha introducido correctamente
                    $_SESSION['mensajeRegistro'] = "<h2> Te has registrado correctamente </h2>"; //se muestra un mensaje
                    $_SESSION['inicio'] = '<a href="../controlador/index.php">Pagina de inicio</a>';
                    $_SESSION['mensajeErr']="";
                } else {
                    $_SESSION['inicio']="";
                    $_SESSION['mensajeRegistro']="";
                    $_SESSION['mensajeErr'] = "<h2> Ha ocurrido un error al registrarte, ya hay un usuario con ese nombre, porfavor elige otro </h2>";
                }
            }
            $_SESSION['errPass'] ="";
        }else {
            $_SESSION['errPass'] = "<p>Error, las contraseñas deben ser iguales</p>";
        }
        header("Location:../controlador/registro.php");                 
    }
    

    

    ?>

