<?php

require_once("Connection.php");

class Libros
{
    public function showLibros()
    {
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT libros.*,categorias.categoria, autores.autor FROM libros JOIN categorias ON libros.id_categoria=categorias.id_categoria JOIN autores ON libros.id_autor=autores.id_autor";
        $result = $mySQL->query($sql) or die($mySQL->error);
        $sqlConnection->closeConnection($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);
    }

    public function addLibro($data)
    {
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "INSERT INTO libros (titulo,id_autor,id_categoria,precio) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]')";
        $mySQL->query($sql) or die($mySQL->error);

        $sqlConnection->closeConnection($mySQL);
    }

    public function LibroById($data)
    {
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT libros.*,categorias.categoria, autores.autor FROM libros JOIN categorias ON libros.id_categoria=categorias.id_categoria JOIN autores ON libros.id_autor=autores.id_autor WHERE id_libro='$data[0]'";
        $result = $mySQL->query($sql) or die($mySQL->error);

        $sqlConnection->closeConnection($mySQL);
        return $result->fetch_all(MYSQLI_BOTH);
    }
    public function editLibro($data)
    {
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "UPDATE libros SET titulo='$data[1]', id_autor='$data[2]', id_categoria='$data[3]',precio='$data[4]' WHERE id_libro='$data[0]'";
        $mySQL->query($sql) or die($mySQL->error);

        $sqlConnection->closeConnection($mySQL);
    }

    public function deleteLibro($data)
    {
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "DELETE FROM libros WHERE id_libro=$data[0]";

        try {

            $mySQL->query($sql) or die($mySQL->error);

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