<?php 

require_once("Connection.php"); 

class Generos {

    public function showGeneros () {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $query = "SELECT * FROM generos ORDER BY generos.id";
        $result = $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function showOneGenero ($data) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $query = "SELECT * FROM generos WHERE generos.id = " . $data[0];
        $result = $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function addGenero ($data) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $query = "INSERT INTO generos (genero) VALUES ('" . $data[0] . "')";
        $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

    }

    public function deleteGenero ($data) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $query = "DELETE FROM generos WHERE id = " . $data[0];
        

        try {

            $mySQL->query($query);

            if ($mySQL->errno > 0) {

                throw new mysqli_sql_exception();

            } else {

                $result = true;

            }

        } catch (mysqli_sql_exception $e) {

            $result = false;

        } finally {

            $sqlConnection->closeConnection($mySQL);

            return $result;

        }

    }

    public function editGenero ($data) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $query = "UPDATE generos SET genero = '" . $data[1] . "' WHERE id = " . $data[0];
        $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

    }

}

?>