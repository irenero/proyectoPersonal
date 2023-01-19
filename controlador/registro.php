<?php
//session_start();   
//$_SESSION['error'] = $_SESSION['nombErr'] = $_SESSION['passErr'] = $_SESSION['emailErr'] = $_SESSION['mensajeRegistro'] = $_SESSION['inicio'] = $_SESSION['mensajeErr'] = $_SESSION['errPass'] ="";
    include "../vista/v_registro.html";
    include "../modelo/m_registro.php";
    
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