<?php 

require_once("Connection.php"); 

class Usuarios {

    public function showUsuarios () {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $query = "SELECT usuarios.*, roles.rol FROM usuarios JOIN roles ON usuarios.id_rol = roles.id ORDER BY usuarios.id";
        $result = $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function addUsuario ($data) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $query = "INSERT INTO usuarios (usuario, contraseña, id_rol) VALUES ('" . $data[0] . "', '" . $data[1] .  "', " . $data[2] .  ")";
        $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

    }

}

?>