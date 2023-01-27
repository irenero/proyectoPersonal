<?php
/**
 * archivo que unifica la vista y el modelo de la votacion de juegos mas esperados
 * 
 * primero se incluye el html y despues el modelo que se conecta a la base de datos cuando el usuario
 * registrado realiza una votacion
 */
    include "../vista/v_juego_esperado.html";
    include "../modelo/m_juego_consulta.php";

    /**
     * se recoge en una variable de sesion los mensajes que se generan en el modelo para mostarlos en la vista,
     * primero se comprueba si la variable existe y no es nula y si es asi se muestra en el html
     */
    if (isset($_SESSION['votacionCorrecta'])){
        echo $_SESSION['votacionCorrecta'];
    }
    if (isset($_SESSION['votacionRepetida'])){
        echo $_SESSION['votacionRepetida'];
    }
    if (isset($_SESSION['votacionError'])){
        echo $_SESSION['votacionError'];
    }
?>