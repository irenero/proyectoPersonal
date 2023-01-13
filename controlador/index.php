<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>

</head>
<body>
    <?php
    session_start();

    if(isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
        include "../vista/index_usuario.html";

    }else {
        include "../vista/index_noUsuario.html";;
    }
    
    //eliminar los juego_ en el modelo y unificarlos en 1 y 
    //crear la conexion de v_juego_ y de la consulta a los juegos unificadados
    //en modelo mediante nuevos archivos en el controlador
    ?>
   
</body>
</html>