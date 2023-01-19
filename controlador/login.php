<?php
    include "../vista/v_login.html";
    include "../modelo/m_login.php";

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