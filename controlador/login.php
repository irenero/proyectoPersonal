<?php
    session_start();
    include "../vista/v_login.html";
    include "../modelo/m_login.php";
    echo $_SESSION['nombreErr'] . $_SESSION['passordErr'] . $_SESSION['passordErr2'] . $_SESSION['nombreErr2'];
    echo $_SESSION['err'];
?>