<?php
/**
 * archivo que unifica la vista y el modelo del registro
 * 
 * primero se incluye el html y despues el modelo que se conecta a la base de datos cuando el usuario
 * introduce los datos para registrarse y se añade ese usuario
 */
    include "../vista/v_registro.html";
    include "../modelo/m_registro.php";
    
    /**
     * se recoge en una variable de sesion los mensajes que se generan en el modelo para mostarlos en la vista,
     * primero se comprueba si la variable existe y no es nula y si es asi se muestra en el html
     */
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
    }
    if (isset($_SESSION['nombErr'])){
        echo $_SESSION['nombErr'];
    } 
    if (isset($_SESSION['passErr'])){
        echo $_SESSION['passErr'];
    } 
    if (isset($_SESSION['emailErr'])) {
        echo $_SESSION['emailErr'];
    } 
    if (isset($_SESSION['mensajeRegistro'])) {
        echo $_SESSION['mensajeRegistro'];
    } 
    if (isset($_SESSION['inicio'])) {
        echo $_SESSION['inicio'];
    } 
    if (isset($_SESSION['mensajeErr'])) {
        echo $_SESSION['mensajeErr'];
    } 
    if (isset($_SESSION['errPass'])) {
         echo $_SESSION['errPass'];        
    }

?>