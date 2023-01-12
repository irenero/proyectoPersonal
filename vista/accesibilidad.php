<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votaciones</title>
    <style>
        h2, p {
            text-align : center;
        }
        button {
            display:block;
            margin:auto;
        }
        body {background-color : lightblue;  margin: 0}
        h2 { margin-top: 0; height : 40px;background-color : black; color : lightblue; padding-top:10px}
    </style>
</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h2>Innovación en accesibilidad</h2>
        <p><input type="radio" name="accesibilidad" value = "As Dusk Falls"> As Dusk Falls</p>
        <p><input type="radio" name="accesibilidad" value = "God of War: Ragnarok">God of War Ragnarök</p>
        <p><input type="radio" name="accesibilidad" value = "Return to Monkey Island"> Return to Monkey Island</p>
        <p><input type="radio" name="accesibilidad" value = "The Last Of Us Part I"> The Last Of Us Part I</p>
        <p><input type="radio" name="accesibilidad" value = "The Quarry"> The Quarry</p>
        <button type="submit">Votar</button>
    </form>

    <p><a href="votar.php">Volver a la pagina de votaciones</a></p>

    <?php
    session_start();

    $usuario = $juego = $id_us = $id_juego = $id_votacion= "";
    require 'con_BD.php';
    $cons = new mysqli();
    $cons->connect($host, $user, $pass, $bd);
    $error = $cons->connect_error;
    if($error != null) {
        echo "<p>Error $error</p>";
    }else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") { //cuando se pulsa el boton
            $usuario = $_SESSION['usuario']; //se guarda la variable de la sesion
            $juego = $_REQUEST['accesibilidad']; //se guarda la opcion seleccionada
            if($_REQUEST['accesibilidad'] !="") { //si la opcion no esta vacia
                try {
                    $sqlUsuario= $cons->query("SELECT id_usuario FROM usuarios WHERE nombre_usuario='$usuario'"); //se obtiene el id del usuario
                    for ($i = 0; $i<$sqlUsuario->num_rows; $i++) {
                        $row = $sqlUsuario->fetch_object();
                        $id_us = $row->id_usuario;
                    }
                } catch (Exception $e) {
                    echo "Se ha producido un error : " . $e->getMessage();
                }
                
                try {
                    $sqlJuego= $cons->query("SELECT id FROM juegos where nombre='$juego'"); //se obtiene el id del juego
                    for ($a = 0; $a<$sqlJuego->num_rows; $a++) {
                        $row = $sqlJuego->fetch_object();
                        $id_juego = $row->id;
                    }
                } catch (Exception $e) {
                    echo "Se ha producido un error : " . $e->getMessage();
                }
                
                if($id_us !="" && $id_juego !="") { //se comprueba que los dos id no estan vacios
                   try {
                        $sqlVot= $cons->query("SELECT id_votacion FROM votaciones WHERE categoria='mejor innovacion en accesibilidad' and id_usuario=$id_us"); //se comprueba si el usuario ya ha votado en sa categoria
                        for ($b = 0; $b<$sqlVot->num_rows; $b++) {
                            $row = $sqlVot->fetch_object();
                            $id_votacion= $row->id_votacion;
                        }
                    } catch (Exception $e) {
                        echo "Se ha producido un error : " . $e->getMessage();
                    }
                    
                    if($id_votacion == "" ){
                        try {
                            $sql= $cons->query("INSERT INTO votaciones (id_juego, id_usuario, categoria) VALUES ('$id_juego' , '$id_us', 'mejor innovacion en accesibilidad')"); //se añade la votacion a la tabla
                        } catch (Exception $e) {
                            echo "Se ha producido un error : " . $e->getMessage();
                        }
                        echo "La votacion se ha realizado correctamente";
                    }else {
                        echo "Ya has votado en esta categoria";
                    }

                }else {
                    echo "Se ha producido un error en la votacion";
                    
                }
                
            }
        }
    }

    ?>
    

</body>
</html>