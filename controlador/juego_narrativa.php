<?php
    include "../vista/v_juego_narrativa.html";
    include "../modelo/m_juego_consulta.php";

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