<?php 

require_once("Connection.php");

class Categorias{
    public function showCategorias(){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT * FROM categorias";
        $result = $mySQL->query($sql) or die($mySQL->error);
        $sqlConnection->closeConnection($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);
    }

    public function addCategoria($data){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "INSERT INTO categorias (categoria) VALUES ('$data[0]')";
        $mySQL->query($sql) or die($mySQL->error);

        $sqlConnection->closeConnection($mySQL);
    }

    public function CategoriaById($data){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "SELECT * FROM categorias WHERE id_categoria=$data[0]";
        $result = $mySQL->query($sql) or die($mySQL->error);
        
        $sqlConnection->closeConnection($mySQL);
        return $result->fetch_all(MYSQLI_BOTH);
    }
    public function editCategoria($data){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "UPDATE categorias SET categoria='$data[1]' WHERE id_categoria='$data[0]'";
        $mySQL->query($sql) or die($mySQL->error);
        
        $sqlConnection->closeConnection($mySQL);
    }

    public function deleteCategoria($data){
        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();
        $sql = "DELETE FROM categorias WHERE id_categoria=$data[0]";

        try{
            $mySQL->query($sql);
        }
        catch(Exception $e){
            die ("No se puede eliminar la categoría porque tiene libros asociados.");
        }
       
        $sqlConnection->closeConnection($mySQL);
    }

}
 
?>

