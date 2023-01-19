
    <?php
 $_SESSION['err'] = $_SESSION['nombreErr'] = $_SESSION['passordErr'] = $_SESSION['passordErr2'] = $_SESSION['nombreErr2'] = "";
    $_SESSION['usuario'] = "";
    $nombre = $passw = "";
    $errNombre = $errPass = "";

    require 'con_BD.php';
    $cons = new mysqli();
    $cons->connect($host, $user, $pass, $bd);
    $error = $cons->connect_error;
    if($error != null) {
        $_SESSION['err'] = "<p>Error $error</p>";
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
                $_SESSION['nombreErr'] = "Error, se debe introducir un valor en el nombre";
                
            }else {
                $nombre=verificar($_POST["nombre"]);
            }
            if(empty($_POST["passw"])) {//si el campo esta vacio
                $_SESSION['passordErr'] = "Error, se debe introducir un valor en la contraseña";
               
            }else {
                $passw=verificar($_POST["passw"]);
            }
            
            if($nombre != "" && $passw != "") { //si las variables contiene valor
                //se realiza la consulta a la base de datos
                $sql= $cons->query("SELECT nombre_usuario, password FROM usuarios");
                for ($i = 0; $i<$sql->num_rows; $i++) {
                    $row = $sql->fetch_object();
                    if (($row->nombre_usuario == $nombre) ) { //se comprueba si existe el nombre
                        if (($row->password == $passw)) { //se comprueba si la contraseña es correcta para ese usuario
                            $_SESSION['usuario'] = $nombre; //se guardan los valores en $_SESSION
                            header("Location:../controlador/index.php");
                        }else {
                            $_SESSION['passordErr2'] = "Error, contraseña incorrecta";
                    
                        }   
                    }else {
                        $_SESSION['nombreErr2'] = "Error, usuario incorrecta";
                   
                    }
                }
            }
            header("Location:../controlador/login.php");   
        }
    }

    ?>

