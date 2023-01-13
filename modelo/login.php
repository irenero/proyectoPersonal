<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        form{
            width:300px;
            padding:16px;
            border-radius:10px;
            margin:auto;
            margin-top: 20%;
            background-color:#ccc;
            padding : 40px;
        }
        label {
            display:block;
            margin-top:10px;
        }
        body {
            background-color:lightblue;
        }
        p {
            text-align: center;
            margin-top: 30px;
        }
        [type=submit] {
            display:block;
            margin:auto;
            margin-top:15px;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    $_SESSION['usuario'] = "";
    $nombre = $passw = "";
    $errNombre = $errPass = "";

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
                $errNombre="Error, se debe introducir un valor en el nombre";
            }else {
                $nombre=verificar($_POST["nombre"]);
            }
            if(empty($_POST["passw"])) {//si el campo esta vacio
                $errPass="Error, se debe introducir un valor en el nombre";
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
                            header("Location:index.php");
                        }else {
                            $errPass = "Error, contraseña incorrecta";
                        }   
                    }else {
                        $errPass = "Error, usuario incorrecta";
                    }
                }
            }
                 
        }
    }

    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label> Nombre usuario :  <input type="text" name="nombre" id="nombre"> <?php echo $errNombre ?> </label>
        <label> Contraseña :  <input type="password" name="passw" id="passw"> <?php echo $errPass ?> </label>
        <input type="submit" value="Iniciar sesion">
    </form>

    <p><a href="index.php">Volver a la pagina principal</a></p>
</body>
</html>