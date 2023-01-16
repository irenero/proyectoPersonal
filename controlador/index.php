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
        include "../modelo/index_usuario.php";

    }else {
        include "../vista/index_noUsuario.html";;
    }
    
    ?>
   
</body>
</html>