<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mas votados</title>
    <style>
        h1, p{ text-align:center; }
        body {background-color : lightblue;  margin-top: 0}
        h1 { margin-top: 0; height : 50px;background-color : black; color : lightblue; padding-top:10px}
    </style>
</head>
<body>
    <h1>Juegos mas votados!!</h1>

    <?php
    /**
     * documento resultado_votacion en el cual se muestran los resultados de las votaciones de los usuarios en las distintas 
     * categorias de juegos
     */

    session_start();

    $usuario = $juego = $id_us = $id_juego = $id_votacion= "";
    require 'd_acceso.php';
    $cons = new mysqli();
    $cons->connect($host, $user, $pass, $bd);
    $error = $cons->connect_error;
    if($error != null) {
        echo "<p>Error $error</p>";
    }else {
        echo ('<h2>Mejor juego del año</h2>');
        $categoria="Juego del anio";
        consulta($categoria, $cons);

        echo ('<h2>Mejor narrativa</h2>');
        $categoria="mejor narrativa";
        consulta($categoria, $cons);

        echo ('<h2>Mejor direccion de arte</h2>');
        $categoria="mejor arte";
        consulta($categoria, $cons);

        echo ('<h2>Mejor juego de impacto</h2>');
        $categoria="mejor juego de impacto";
        consulta($categoria, $cons);

        echo ('<h2>Mejores juegos en constante evolucion</h2>');
        $categoria="mejor juego en constante evolucion";
        consulta($categoria, $cons);

        echo ('<h2>Mejor indie</h2>');
        $categoria="mejor juego indie";
        consulta($categoria, $cons);

        echo ('<h2>Mejor apoyo a la comunidad</h2>');
        $categoria="mejor apoyo a la comunidad";
        consulta($categoria, $cons);

        echo ('<h2>Mejor juego para moviles</h2>');
        $categoria="mejor juego para movil";
        consulta($categoria, $cons);

        echo ('<h2>Mejor juego de realidad virtual/aumentada</h2>');
        $categoria="mejor juego de realidad virtual";
        consulta($categoria, $cons);

        echo ('<h2>Mejor juego de accion</h2>');
        $categoria="mejor juego de aventura";
        consulta($categoria, $cons);

        echo ('<h2>Mejor jugo de accion/aventura</h2>');
        $categoria="mejor juego de accion";
        consulta($categoria, $cons);

        echo ('<h2>Mejor juego de rol</h2>');
        $categoria="mejor juego de rol";
        consulta($categoria, $cons);

        echo ('<h2>Mejor juego de lucha</h2>');
        $categoria="mejor juego de lucha";
        consulta($categoria, $cons);

        echo ('<h2>Mejor juego familiar</h2>');
        $categoria="mejor juego familiar";
        consulta($categoria, $cons);

        echo ('<h2>Mejor juego de estrategia/simulacion</h2>');
        $categoria="mejor juego de estrategia";
        consulta($categoria, $cons);

        echo ('<h2>Mejor juego deportivo/carreras</h2>');
        $categoria="mejor juego de carreras";
        consulta($categoria, $cons);

        echo ('<h2>Mejor juego multijugador</h2>');
        $categoria="mejor juego de multijugador";
        consulta($categoria, $cons);

        echo ('<h2>Juego mas esperado</h2>');
        $categoria="juego mas esperado";
        consulta($categoria, $cons);

        echo ('<h2>Mejor adaptacion a cine/serie</h2>');
        $categoria="mejor adaptacion a cine/serie";
        consulta($categoria, $cons);

        echo ('<h2>Innivacion en accesibilidad</h2>');
        $categoria="mejor innovacion en accesibilidad";
        consulta($categoria, $cons);

        echo ('<h2>Mejor juego de esports</h2>');
        $categoria="mejor juego de esports";
        consulta($categoria, $cons);


    }

    /**
     * la funcion consulta recibe la categoria y la conexion para acceder a la base de datos y obtener el nombre del juego y 
     * la cantidad de votaciones que ha recibido de cada categoria
     * dependiendo del resultado de la consulta, si la categoria no ha recibido ninguna votacion, si solo se ha realizado una votacion,
     * si se han realizado varias votaciones, se mostrara un mensaje u otro
     * 
     * @param categoria categoria del juego del que se va a realiza la cosulta
     * @param cons conexion a la base de datos
     */
    function consulta($categoria, $cons) {
        $consulta= $cons->query("SELECT juegos.nombre, COUNT(*) n_votaciones FROM votaciones, juegos WHERE juegos.id = votaciones.id_juego and votaciones.categoria='$categoria' GROUP BY votaciones.id_juego");
        $result=[];

        if($consulta) {
            for ($i = 0; $i<$consulta->num_rows; $i++) { 
                $row = $consulta->fetch_object();
                $result[$i][0] = $row->nombre; //se guarda en un array el nombre del juego votado
                $result[$i][1] = $row->n_votaciones; //se guarda en un array la cantidad de veces que se ha votado el juego
            }

            if(count($result)==1) { //si solo se ha votado un juego
                echo "</p>El unico juego que se ha votado es : " . $result[0][0] . "<br></p>";
            }else if(count($result)==0) { //si no se va botado ningun juego de esa catergoria
                echo "</p>No se ha votado ningun juego <br></p>";
            }else{
                $mayor=0;
                for($a=1;$a<count($result);$a++){ //se compara el juego que tenga mas votos
                    if($result[$a-1][1] < $result[$a][1]) {
                        $mayor = $result[$a][0];
                    }
                }
                if($mayor==0) {//si mayor es = 0 significa que todos los juegos del array tienen los mismos votos asique se muestran todos
                    echo "</p>Hay empate entre los juegos : ";
                    for($i=0;$i<count($result);$i++){
                        echo $result[$i][0] . ",  " ;
                    }
                    echo " </p>";
                }else { //si hay un juego con mas votos se muestra solo ese juego
                    echo "</p>El juego mas votado es : " . $mayor . "<br></p>";
                }
            }
 
        }
        $consulta->close();
    }
    ?>

<p><a href="../controlador/index.php">Volver a la pagina principal</a></p>
</body>
</html>