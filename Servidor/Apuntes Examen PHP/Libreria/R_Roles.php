<?php 

require_once("Connection.php");

class Roles {

    public function showRoles () {

        $sqlConnection = new Connection();  // Objeto Connection
        $mySQL = $sqlConnection->getConnection();   // Guardar return de getConnection
        $query = "SELECT * FROM roles";
        $result = $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

}

?>