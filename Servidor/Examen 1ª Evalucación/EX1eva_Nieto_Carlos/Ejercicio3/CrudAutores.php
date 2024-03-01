<?php

require_once("Connection.php");

class Autores
{
    public function showAutores()
    {
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT * FROM autores";
        $result = $mySQL->query($sql) or die($mySQL->error);
        $sqlConnection->closeConnection($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);
    }

    public function addAutor($data)
    {
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "INSERT INTO autores (autor) VALUES ('$data[0]')";
        $mySQL->query($sql) or die($mySQL->error);

        $sqlConnection->closeConnection($mySQL);
    }

    public function AutorById($data)
    {
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT * FROM autores WHERE id_autor='$data[0]'";
        $result = $mySQL->query($sql) or die($mySQL->error);

        $sqlConnection->closeConnection($mySQL);
        return $result->fetch_all(MYSQLI_BOTH);
    }
    public function editAutor($data)
    {
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "UPDATE autores SET autor='$data[1]' WHERE id_autor='$data[0]'";
        $mySQL->query($sql) or die($mySQL->error);

        $sqlConnection->closeConnection($mySQL);
    }

    public function deleteAutor($data)
    {
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "DELETE FROM autores WHERE id_autor=$data[0]";

        try {

            $mySQL->query($sql);

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

}
?>