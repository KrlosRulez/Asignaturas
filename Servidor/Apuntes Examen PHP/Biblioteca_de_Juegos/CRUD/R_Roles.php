<?php 

require_once("Connection.php"); 

class Roles {

    public function showRoles () {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $query = "SELECT * FROM roles ORDER BY roles.id";
        $result = $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

}

?>