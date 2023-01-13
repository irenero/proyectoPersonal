<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        form{
            width:400px;
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
    $nombre = $passw = $passw2 = $email = "";
    $errNombre = $errPass = $errEmail = "";

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
            if(empty($_POST["passw2"])) {//si el campo esta vacio
            }else {
                $passw2=verificar($_POST["passw2"]);
            }
            if(empty($_POST["email"])) {//si el campo esta vacio
                $errEmail="Error, se debe introducir un valor en el correo electronico";
            }else {
                $email=verificar($_POST["email"]);
            }  

            if($passw == $passw2) { //comprobar que las contraseñas son iguales
                if($nombre != "" && $passw != "" && $email != "") { //si las variables contiene valor
                    //se introducen los datos en la base de datos
                    $sql= $cons->query("INSERT INTO usuarios (nombre_usuario, password, correo) VALUES ('$nombre', '$passw', '$email')");
                    if ($cons->affected_rows > 0) { //si hay mas de 0 linas afectadas se ha introducido correctamente
                        echo("<h2> Te has registrado correctamente </h2>"); //se muestra un mensaje
                    } else {
                        echo("<h2> Ha ocurrido un error al registrarte, ya hay un usuario con ese nombre, porfavor elige otro </h2>");
                    }
                }
            }else {
                $errPass = "Error, las contraseñas deben ser iguales";
            }                 
        }
    }
    ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label> Nombre usuario :  <input type="text" name="nombre" id="nombre"> <?php echo $errNombre ?> </label>
        <label> Contraseña :  <input type="password" name="passw" id="passw"> <?php echo $errPass ?> </label>
        <label> Repetir contraseña :  <input type="password" name="passw2" id="passw2"></label>
        <label> Correo electronico :  <input type="email" name="email" id="email"> <?php echo $errEmail ?> </label>
        <input type="submit" value="Registrarse">
    </form>
    <p><a href="index.php">Volver a la pagina principal</a></p>

</body>
</html>