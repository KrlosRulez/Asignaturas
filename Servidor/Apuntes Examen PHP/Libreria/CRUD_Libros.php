<?php 

require_once("Connection.php");

class Libros {

    public function showLibros () {

        $sqlConnection = new Connection();  // Objeto Connection
        $mySQL = $sqlConnection->getConnection();   // Guardar return de getConnection
        $query = "SELECT libros.*, categorias.categoria FROM libros JOIN categorias ON libros.id_categoria=categorias.id_categoria ORDER BY libros.id_libro";
        $result = $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function showOneLibro ($id) {

        $sqlConnection = new Connection(); 
        $mySQL = $sqlConnection->getConnection();   
        $query = "SELECT * FROM libros WHERE id_libro = $id";
        $result = $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function addLibro ($titulo, $nombre_foto, $autor, $id_categoria, $precio) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();

        $query = "INSERT INTO libros (imagen, titulo, autor, id_categoria, precio) VALUES ('$nombre_foto', '$titulo', '$autor', '$id_categoria', '$precio')";
        $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

    }

    public function editLibro ($id_libro, $titulo, $nombre_foto, $autor, $id_categoria, $precio) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();

        $query = "UPDATE libros SET titulo = '$titulo', imagen = '$nombre_foto', autor = '$autor', id_categoria = '$id_categoria', precio = $precio WHERE id_libro = $id_libro";
        $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

    }

    public function deleteLibro ($id_libro) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();

        $query = "DELETE FROM libros WHERE id_libro = $id_libro";
        $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

    }

}

?>