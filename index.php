<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <style>
        body {
            margin:0;
            background-color : lightblue;
        }
        header {
            height : 50px;
            width : 100%;
            background-color : black;
        }
        header>a {
            position: relative;
            top : 14px;
            margin-right : 20px;
            color : lightblue;
        }
        header > a:first-of-type {
            margin-left : 75%; 
        }
        header+img {
            width : 100%;
        }
        p>a {
            color:red;
        }
        h2 {
            text-align:center;
        }
        h1+h2 {
            text-align:left;
        }
        h2+img{
            width:60%;
            display:block;
            margin:auto;
        }
        img {
            width:80%;
            display:block;
            margin:auto; 
        }
        h1, h2, p {
            margin-left: 20px
        }
        div {
            color:white;
            text-align: center;
        }
        #votar {
            text-align : center;
        }
        a img {
            width:50%;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    if(isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
        echo '<header> <a href="cerrar_sesion.php">Cerrar sesion</a></header>
            <img src="https://top-mmo.fr/wp-content/uploads/2022/08/The-Game-Awards.jpg" alt="imagen the game awads">
            <h1>Nominados a The Game Awards 2022 </h1>
            <h2 id="votar">' . $usuario. ', vota ya a tu favorito!</h2>
            <a href="votar.php"><img src="https://areajugones.sport.es/wp-content/uploads/2022/11/vota-the-game-awards-2022-1080x609.jpg" alt="votar juego"></a>

        ';

    }else {
        echo '<header> <a href="login.php">Iniciar Sesion</a>    <a href="registro.php">Registrarse</a></header>
            <img src="https://top-mmo.fr/wp-content/uploads/2022/08/The-Game-Awards.jpg" alt="imagen the game awads">
            <h1>Nominados a The Game Awards 2022 </h1>
            <h2>Como votar?</h2>
            <p>Inicia sesion con tu nombre de usuario y contraseña, si todavia no tienes que esperas? <a href="registro.php">¡REGISTATE!</a></p>
        
        ';
    }
    
    ?>
    
    <h2>Cual es el juego mas votado?</h2>
        
    <a href="resultado_votacion.php"><img src="https://i0.wp.com/jornaldosjogos.com.br/wp-content/uploads/2020/11/goty-super-indicados-horario-game-awards.jpg?fit=800%2C450&ssl=1" alt=""></a>


    
</body>
</html>