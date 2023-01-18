<?php
    session_start();
    $usuario = $juego = $id_us = $id_juego = $id_votacion = $categoria = "";
    require 'con_BD.php';
    $cons = new mysqli();
    $cons->connect($host, $user, $pass, $bd);
    $error = $cons->connect_error;
    if($error != null) {
        echo "<p>Error $error</p>";
    }else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_SESSION['usuario'];

           //se modifican las variables dependiendo del tipo
            if($_REQUEST['accesibilidad'] !="") {
                $juego = $_REQUEST['accesibilidad'];
                $categoria = 'mejor innovacion en accesibilidad';
            }
            if($_REQUEST['accion'] !="") {
                $juego = $_REQUEST['accion'];
                $categoria = 'mejor juego de accion';
            }
            if($_REQUEST['adaptacion'] !="") {
                $juego = $_REQUEST['adaptacion'];
                $categoria = 'mejor adaptacion a cine/serie';
            }
            if($_REQUEST['anio'] !="") {
                $juego = $_REQUEST['anio'];
                $categoria = 'Juego del anio';
            }
            if($_REQUEST['comunidad'] !="") {
                $juego = $_REQUEST['comunidad'];
                $categoria='mejor apoyo a la comunidad';
            }
            if($_REQUEST['arte'] !="") {
                $juego = $_REQUEST['arte'];
                $categoria='mejor arte';
            }
            if($_REQUEST['aventura'] !="") {
                $juego = $_REQUEST['aventura'];
                $categoria='mejor juego de aventura';
            }
            if($_REQUEST['carreras'] !="") {
                $juego = $_REQUEST['carreras'];
                $categoria='mejor juego deportivo';
            }
            if($_REQUEST['esperado'] !="") {
                $juego = $_REQUEST['esperado'];
                $categoria='juego mas esperado';
            }
            if($_REQUEST['esports'] !="") {
                $juego = $_REQUEST['esports'];
                $categoria='mejor juego de esports';
            }
            if($_REQUEST['estrategia'] !="") {
                $juego = $_REQUEST['estrategia'];
                $categoria='mejor juego de estrategia';
            }
            if($_REQUEST['evolucion'] !="") {
                $juego = $_REQUEST['evolucion'];
                $categoria='mejor juego en constante evolucion';
            }
            if($_REQUEST['familiar'] !="") {
                $juego = $_REQUEST['familiar'];
                $categoria='mejor juego familiar';
            }
            if($_REQUEST['impacto'] !="") {
                $juego = $_REQUEST['impacto'];
                $categoria='mejor juego de impacto';
            }
            if($_REQUEST['indie'] !="") {
                $juego = $_REQUEST['indie'];
                $categoria='mejor juego indie';
            }
            if($_REQUEST['lucha'] !="") {
                $juego = $_REQUEST['lucha'];
                $categoria='mejor juego de lucha';
            }
            if($_REQUEST['movil'] !="") {
                $juego = $_REQUEST['movil'];
                $categoria='mejor juego para movil';
            }
            if($_REQUEST['multijugador'] !="") {
                $juego = $_REQUEST['multijugador'];
                $categoria='mejor juego de multijugador';
            }
            if($_REQUEST['narrativa'] !="") {
                $juego = $_REQUEST['narrativa'];
                $categoria='mejor narrativa';
            }
            if($_REQUEST['virtual'] !="") {
                $juego = $_REQUEST['virtual'];
                $categoria='mejor juego de realidad virtual';
            }
            if($_REQUEST['rol'] !="") {
                $juego = $_REQUEST['rol'];
                $categoria='mejor juego de rol';
            }

            //se ejecuta siempre
            try {
                $sqlUsuario= $cons->query("SELECT id_usuario FROM usuarios WHERE nombre_usuario='$usuario'"); //se obtiene el id del usuario
                for ($i = 0; $i<$sqlUsuario->num_rows; $i++) {
                    $row = $sqlUsuario->fetch_object();
                    $id_us = $row->id_usuario;
                }
            } catch (Exception $e) {
                echo "Se ha producido un error : " . $e->getMessage();
            }
            
            try {
                $sqlJuego= $cons->query("SELECT id FROM juegos where nombre='$juego'"); //se obtiene el id del juego
                for ($a = 0; $a<$sqlJuego->num_rows; $a++) {
                    $row = $sqlJuego->fetch_object();
                    $id_juego = $row->id;
                }
            } catch (Exception $e) {
                echo "Se ha producido un error : " . $e->getMessage();
            }
            
            if($id_us !="" && $id_juego !="") { //se comprueba que los dos id no estan vacios
                try {
                    $sqlVot= $cons->query("SELECT id_votacion FROM votaciones WHERE categoria=$categoria and id_usuario=$id_us"); //se comprueba si el usuario ya ha votado en esa categoria
                    for ($b = 0; $b<$sqlVot->num_rows; $b++) {
                        $row = $sqlVot->fetch_object();
                        $id_votacion= $row->id_votacion;
                    }
                } catch (Exception $e) {
                    echo "Se ha producido un error : " . $e->getMessage();
                }
                
                if($id_votacion == "" ){
                    try {
                        $sql= $cons->query("INSERT INTO votaciones (id_juego, id_usuario, categoria) VALUES ('$id_juego' , '$id_us', $categoria)"); //se añade la votacion a la tabla
                    } catch (Exception $e) {
                        echo "Se ha producido un error : " . $e->getMessage();
                    }
                    echo "La votacion se ha realizado correctamente";
                }else {
                    echo "Ya has votado en esta categoria";
                }

            }else {
                echo "Se ha producido un error en la votacion";
                
            }
        }
    }

?>
    
