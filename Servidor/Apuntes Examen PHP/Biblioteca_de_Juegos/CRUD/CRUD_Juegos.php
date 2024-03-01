<?php 

require_once("Connection.php"); 

class Juegos {

    public function showJuegos () {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $query = "SELECT juegos.*, generos.genero FROM juegos JOIN generos ON juegos.id_genero = generos.id ORDER BY juegos.id";
        $result = $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

}

?>