<html>
    <head>
        <title>Conxion a BD</title>
    </head>
    <body>
        <?php
        
        // class Conexion {
        //     private $host;
        //     private $user;
        //     private $pass;
        //     private $bd;
        //     private $connection;

        //     function __construct($host, $user, $pass, $bd) {
        //         $this->host = $host;
        //         $this->user = $user;
        //         $this->pass = $pass;
        //         $this->bd = $bd;
        //     }

        //     function connect() {
        //         $this->connection = mysqli_connect(
        //             $this->host, $this->user, $this->pass, $this->bd
        //         );
        //         if (mysqli_connect_errno()) {
        //             echo "error al conectarse";
        //         }
        //     }

        //     function close() {
        //         mysqli_close($this->connection);
        //     }
        // }
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