<html>
    <head>
        <title>Conxion a BD</title>
    </head>
    <body>
        <?php
            //se cargan los datos de acceso a la conexion
            require 'd_acceso.php'; 
            //conectar con la base de datos
            $con = new mysqli();
            //le pasamos los datos de conexion con el metodo connect
            $con->connect($host, $user, $pass, $bd);
            //si la conexion ha ido bien, mostrar info del servidor
            $error = $con->connect_errno; //numero de error
            if($error != null) {
                echo "<p>Error $error conectando a la base de datos: $con->connect_error </p>" ;//mensaje de error
            } else {
                $con->close(); //se cierra la conexion
            }

        ?>
    </body>
</html>