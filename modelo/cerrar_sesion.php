<?php
/**
 * archivo cerrar_sesion que se encarga de eliminar las variables almacenadas, eliminar la sesion
 * y redirigir al usuario a la pagina de inicio cuando el usuario presiona cerrar sesion en la pagina principal
 */
session_start(); 
session_unset(); 
session_destroy(); 
header("Location:../controlador/index.php"); 
?>