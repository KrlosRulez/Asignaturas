<?php 

//include("ShowErrors.php");

class Connection {

    private $server = "localhost";

    private $user = "root";

    private $password = "";

    private $db = "biblioteca_juegos";

    public function getConnection () {

        return $conexion = new mysqli(
            $this->server,
            $this->user,
            $this->password,
            $this->db
        );

    }

    public function closeConnection ($conexion) {

        $conexion->close();

    }
    
}

$con = new Connection();

if ($con->getConnection()->connect_error) {
    
    print_r($con->getConnection()->connect_error);

}

?>