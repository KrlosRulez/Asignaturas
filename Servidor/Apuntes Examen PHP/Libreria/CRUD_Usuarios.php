<?php 

require_once("Connection.php");

class Usuarios {

    public function showUsuarios () {

        $sqlConnection = new Connection();  // Objeto Connection
        $mySQL = $sqlConnection->getConnection();   // Guardar return de getConnection
        $query = "SELECT usuarios.*, roles.nombre_rol FROM usuarios JOIN roles ON usuarios.rol=roles.id_rol";
        $result = $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function addUsuario ($nombre, $password, $rol) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();

        $query = "INSERT INTO usuarios (usuario, password, rol) VALUES ('$nombre', '$password', '$rol');";
        $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

    }

    public function editUsuario ($id, $nombre, $password, $rol) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();

        $query = "UPDATE usuarios SET usuario = '$nombre', password = '$password', rol = '$rol' WHERE id_usuario = $id";
        $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

    }

    public function deleteUsuario ($id_usuario) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();

        $query = "DELETE FROM usuarios WHERE id_usuario = $id_usuario";
        $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

    }

}

//$users = new Usuarios();
//$users->showUsuarios();

?>