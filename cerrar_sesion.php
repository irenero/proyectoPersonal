<?php
session_start(); //se inicia la sesion
session_unset(); //se eliminan las variables almacenadas
session_destroy(); //se elimina la sesion
header("Location:index.php"); //se redirige a la pagina de inicio
?>