<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="../vista/estilos.css">
</head>
<body>
    <?php
    /**
     * documento index_usuario que se encarga de mostar al usuario una pagina de inicio u otra si el usuario
     * se a registrado o no
     */
    session_start();

    if(isset($_SESSION['usuario'])){ //si la variable de sesion de usuario contiene valor
        $usuario = $_SESSION['usuario']; //se guarda la variable de sesion de usuario en la variable usuario
        //se muestra el codigo html personalizado para el usuario registrado
        echo '<header> <a href="../modelo/cerrar_sesion.php">Cerrar sesion</a></header>
            <img src="https://top-mmo.fr/wp-content/uploads/2022/08/The-Game-Awards.jpg" alt="imagen the game awads">
            <h1>Nominados a The Game Awards 2022 </h1>
            <h2 id="votar">' . $usuario. ', vota ya a tu favorito!</h2>
            <a href="../vista/votar.html"><img src="https://areajugones.sport.es/wp-content/uploads/2022/11/vota-the-game-awards-2022-1080x609.jpg" alt="votar juego"></a>
        ';

    }else { //si la variable usuario no contiene valores
        include "../vista/index_noUsuario.html"; //se muestra el archivo con el html del usuario no registrado
    }

    ?>
    
    <!-- parte que se muestra a usuarios registardos y no registados por igual -->
    <h2>Cual es el juego mas votado?</h2>
        
    <a href="../modelo/resultado_votacion.php"><img src="https://i0.wp.com/jornaldosjogos.com.br/wp-content/uploads/2020/11/goty-super-indicados-horario-game-awards.jpg?fit=800%2C450&ssl=1" alt=""></a>
    
</body>
</html>