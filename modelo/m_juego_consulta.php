<?php
    session_start();
    $usuario = $juego = $id_us = $id_juego = $id_votacion = $categoria = $url = "";
    //conexion copn la base de datos
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") { //si se envian datos mediante post
            $usuario = $_SESSION['usuario']; //se guarda la variable de sesion de usuario en la variable usuario

           //se modifican las variables dependiendo del tipo de juego/votacion y se guardan las opciones seleccionadas en variables
            if(isset($_REQUEST['accesibilidad'])) {
                $juego = $_REQUEST['accesibilidad'];
                $categoria = 'mejor innovacion en accesibilidad';
                $url="juego_accesibilidad.php";
            }
            if(isset($_REQUEST['accion'] )) {
                $juego = $_REQUEST['accion'];
                $categoria = 'mejor juego de accion';
                $url="juego_accion.php";
            }
            if(isset($_REQUEST['adaptacion'])) {
                $juego = $_REQUEST['adaptacion'];
                $categoria = 'mejor adaptacion a cine/serie';
                $url="juego_adaptacion.php";
            }
            if(isset($_REQUEST['anio'] )) {
                $juego = $_REQUEST['anio'];
                $categoria = 'Juego del anio';
                $url="juego_anio.php";
            }
            if(isset($_REQUEST['comunidad'])) {
                $juego = $_REQUEST['comunidad'];
                $categoria='mejor apoyo a la comunidad';
                $url="juego_apoyo_comunidad.php";
            }
            if(isset($_REQUEST['arte'])) {
                $juego = $_REQUEST['arte'];
                $categoria='mejor arte';
                $url="juego_arte.php";
            }
            if(isset($_REQUEST['aventura'])) {
                $juego = $_REQUEST['aventura'];
                $categoria='mejor juego de aventura';
                $url="juego_aventura.php";
            }
            if(isset($_REQUEST['carreras'])) {
                $juego = $_REQUEST['carreras'];
                $categoria='mejor juego deportivo';
                $url="juego_carreras.php";
            }
            if(isset($_REQUEST['esperado'])) {
                $juego = $_REQUEST['esperado'];
                $categoria='juego mas esperado';
                $url="juego_esperado.php";
            }
            if(isset($_REQUEST['esports'])) {
                $juego = $_REQUEST['esports'];
                $categoria='mejor juego de esports';
                $url="juego_esports.php";
            }
            if(isset($_REQUEST['estrategia'])) {
                $juego = $_REQUEST['estrategia'];
                $categoria='mejor juego de estrategia';
                $url="juego_estrategia.php";
            }
            if(isset($_REQUEST['evolucion'])) {
                $juego = $_REQUEST['evolucion'];
                $categoria='mejor juego en constante evolucion';
                $url="juego_evolucion.php";
            }
            if(isset($_REQUEST['familiar'])) {
                $juego = $_REQUEST['familiar'];
                $categoria='mejor juego familiar';
                $url="juego_familiar.php";
            }
            if(isset($_REQUEST['impacto'])) {
                $juego = $_REQUEST['impacto'];
                $categoria='mejor juego de impacto';
                $url="juego_impacto.php";
            }
            if(isset($_REQUEST['indie'])) {
                $juego = $_REQUEST['indie'];
                $categoria='mejor juego indie';
                $url="juego_indie.php";
            }
            if(isset($_REQUEST['lucha'])) {
                $juego = $_REQUEST['lucha'];
                $categoria='mejor juego de lucha';
                $url="juego_lucha.php";
            }
            if(isset($_REQUEST['movil'])) {
                $juego = $_REQUEST['movil'];
                $categoria='mejor juego para movil';
                $url="juego_movil.php";
            }
            if(isset($_REQUEST['multijugador'] )) {
                $juego = $_REQUEST['multijugador'];
                $categoria='mejor juego de multijugador';
                $url="juego_multijugador.php";
            }
            if(isset($_REQUEST['narrativa'] )) {
                $juego = $_REQUEST['narrativa'];
                $categoria='mejor narrativa';
                $url="juego_narrativa.php";
            }
            if(isset($_REQUEST['virtual'])) {
                $juego = $_REQUEST['virtual'];
                $categoria='mejor juego de realidad virtual';
                $url="juego_realidad_virtual.php";
            }
            if(isset($_REQUEST['rol'])) {
                $juego = $_REQUEST['rol'];
                $categoria='mejor juego de rol';
                $url="juego_rol.php";
            }

            //se ejecuta siempre
            try {
                //se obtiene el id del usuario
                include "../modelo/c_usuarios.php"; //se incluye el php con la clase usuario
                $newUser = new Usuario($usuario, "", "");
                $id_us = $newUser->idUsuario();
            } catch (Exception $e) {
                echo "Se ha producido un error : " . $e->getMessage();
            }
            
            try {
                //se obtiene el id del juego
                include "../modelo/c_juego.php"; //se incluye el php con la clase jugo
                $newJuego = new Juego("", $juego);
                $id_juego = $newJuego->consultarId();
            } catch (Exception $e) {
                echo "Se ha producido un error : " . $e->getMessage();
            }
            
            if($id_us !="" && $id_juego !="") { //se comprueba que existe el usuario y el juego
                try {
                    //se comprueba si el usuario ya ha votado en esa categoria
                    include "../modelo/c_votacion.php";
                    $newVotacion = new Votacion($id_votacion, $id_juego, $id_us, $categoria); //se crea una nueva votacion
                    $rowsId = $newVotacion->consultarId();
                    
                    if( $rowsId > 0) { //si existe ya una votacion de ese usuario en esa categoria
                        $_SESSION['votacionRepetida'] = "<p>Ya has votado en esta categoria</p>";
                        $_SESSION['votacionCorrecta'] = "";
                    }else {
                        try {
                            //se añade la votacion a la tabla
                            $rowsAdd = $newVotacion->addVotacion();
                            if($rowsAdd > 0) {
                                $_SESSION['votacionCorrecta'] = "<p>La votacion se ha realizado correctamente</p>";
                            }
                            
                        } catch (Exception $e) {
                            echo "Se ha producido un error : " . $e->getMessage();
                        }
                        $_SESSION['votacionRepetida'] = "";
                    }
                } catch (Exception $e) {
                    echo "Se ha producido un error : " . $e->getMessage();
                }
                $_SESSION['votacionError'] = "";
            }else {
                $_SESSION['votacionError'] = "<p>Se ha producido un error en la votacion</p>";  
            }
            header("Location:../controlador/".$url); 
        }
    

?>
    
