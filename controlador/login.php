<?php
/**
 * archivo que unifica la vista y el modelo del login
 * 
 * primero se incluye el html y despues el modelo que se conecta a la base de datos cuando el usuario
 * introduce los datos para logearse para comprobar que el usuario con esos datos existe en la base de datos
 */
    include "../vista/v_login.html";
    include "../modelo/m_login.php";

    /**
     * se recoge en una variable de sesion los mensajes que se generan en el modelo para mostarlos en la vista,
     * primero se comprueba si la variable existe y no es nula y si es asi se muestra en el html
     */
    if(isset($_SESSION['nombreErr'])){
        echo $_SESSION['nombreErr'];
    }
    if(isset($_SESSION['passordErr'])){
        echo $_SESSION['passordErr'];
    }
    if(isset($_SESSION['passordErr2'])){
        echo $_SESSION['passordErr2'];
    }
    if(isset($_SESSION['nombreErr2'])){
        echo $_SESSION['nombreErr2'];
    }
    if(isset($_SESSION['err'])){
        echo $_SESSION['err'];
    }

?>