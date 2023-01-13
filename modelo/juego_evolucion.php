
    <?php
    session_start();

    include "../vista/v_juego_evolucion.html";

    $usuario = $juego = $id_us = $id_juego = $id_votacion= "";
    require 'con_BD.php';
    $cons = new mysqli();
    $cons->connect($host, $user, $pass, $bd);
    $error = $cons->connect_error;
    if($error != null) {
        echo "<p>Error $error</p>";
    }else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_SESSION['usuario'];
            $juego = $_REQUEST['evolucion'];
            if($_REQUEST['evolucion'] !="") {
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
                        $sqlVot= $cons->query("SELECT id_votacion FROM votaciones WHERE categoria='mejor juego en constante evolucion' and id_usuario=$id_us"); //se comprueba si el usuario ya ha votado en sa categoria
                        for ($b = 0; $b<$sqlVot->num_rows; $b++) {
                            $row = $sqlVot->fetch_object();
                            $id_votacion= $row->id_votacion;
                        }
                    } catch (Exception $e) {
                        echo "Se ha producido un error : " . $e->getMessage();
                    }
                    
                    if($id_votacion == "" ){
                        try {
                            $sql= $cons->query("INSERT INTO votaciones (id_juego, id_usuario, categoria) VALUES ('$id_juego' , '$id_us', 'mejor juego en constante evolucion')"); //se añade la votacion a la tabla
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
    }

    ?>
    
