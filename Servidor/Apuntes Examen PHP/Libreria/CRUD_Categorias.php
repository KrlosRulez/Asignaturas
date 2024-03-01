<?php 

require_once("Connection.php");

class Categorias {

    public function showCategorias () {

        $sqlConnection = new Connection();  // Objeto Connection
        $mySQL = $sqlConnection->getConnection();   // Guardar return de getConnection
        $query = "SELECT * FROM categorias";
        $result = $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function addCategoria ($categoria) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();

        //$query = "INSERT INTO categorias (categoria) VALUES ('$categoria')";
        //$mySQL->query($query);

        $stmt = $mySQL->prepare("INSERT INTO categorias (categoria) VALUES (?)");

        $stmt->bind_param("s", $categoria);

        // i - entero
        // d - decimal
        // s - string
        // b - blob

        $stmt->execute();

        $stmt->close();

        $sqlConnection->closeConnection($mySQL);

    }

    public function editCategoria ($id, $categoria) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();

        $query = "UPDATE categorias SET categoria = '$categoria' WHERE id_categoria = $id";
        $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

    }

    public function deleteCategoria ($id_categoria) {

        $sqlConnection = new Connection();
        $mySQL = $sqlConnection->getConnection();

        $query = "DELETE FROM categorias WHERE id_categoria = $id_categoria";
        $mySQL->query($query);
        $sqlConnection->closeConnection($mySQL);

    }

}

?>

<!-- // NO TIENE NADA QUE VER ====

// FILTROS PHP

// $email = "/john.doe@example .com";

// Remove all illegal characters from email

// $email = filter_var($email, FILTER_SANITIZE_EMAIL);

// if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

//     echo "$email is a valid email address";

// } else {

//     echo "$email is not a valid email address";

// }

EN CRUD (Ej. CRUD_Categorias.php)

function test_input ($data) {

    $data = trim($data);    // Quita espacios en blanco
    $data = stripslashes($data);    // Quita contrabarras
    $data = htmlspecialchars($data);    // Evita que se ejecuten etiquetas html
    return $data;

}

EN ARCHIVO NORMAL (Ej. Categorias.php)

$usuario = test_input($_POST['usuario']);

// ========================== -->