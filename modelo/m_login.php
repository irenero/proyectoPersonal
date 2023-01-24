
    <?php

    session_start();

    $_SESSION['usuario'] = "";
    $nombre = $passw = "";
    $errNombre = $errPass = "";
    $existeNombre = false;

    //se verifican los datos introducidos
    function verificar($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if(empty($_POST["nombre"])) {//si el campo esta vacio
            $_SESSION['nombreErr'] = "<p>Error, se debe introducir un valor en el nombre</p>";
            header("Location:../controlador/login.php"); 
        }else {
            $nombre=verificar($_POST["nombre"]);
            $_SESSION['nombreErr'] = "";
        }
        if(empty($_POST["passw"])) {//si el campo esta vacio
            $_SESSION['passordErr'] = "<p>Error, se debe introducir un valor en la contraseña</p>";
            header("Location:../controlador/login.php"); 
        }else {
            $passw=verificar($_POST["passw"]);
            $_SESSION['passordErr'] = "";
        }
        
        if($nombre != "" && $passw != "") { //si las variables contiene valor
            include "../modelo/c_usuarios.php"; //se incluye el php con la clase usuario
            $user = new Usuario($nombre, $passw, "");
            $sql = $user->consultaUsuario();
            
            for ($i = 0; $i<$sql->num_rows; $i++) {
                $row = $sql->fetch_object();
                if (($row->nombre_usuario == $nombre)) { //se comprueba si existe el nombre
                    $existeNombre = true;
                    if (($row->password == $passw)) { //se comprueba si la contraseña es correcta para ese usuario
                        $_SESSION['usuario'] = $nombre; //se guardan los valores en $_SESSION
                        $_SESSION['passordErr2'] = "";
                        header("Location:../controlador/index.php");
                    }else {
                        $_SESSION['passordErr2'] = "<p>Error, contraseña incorrecta</p>";
                        header("Location:../controlador/login.php"); 
                    }  
                    $_SESSION['nombreErr2'] = ""; 
                }else if (!$existeNombre){
                    $_SESSION['nombreErr2'] = "<p>Error, usuario incorrecto</p>";
                    header("Location:../controlador/login.php"); 
                }
            }
        }
    
    }

    ?>

