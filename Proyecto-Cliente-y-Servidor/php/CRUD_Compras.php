<?php 

require_once("conexion.php");

class Compras {

    public function MostrarCompras () {

        $sqlconexion = new Conexion();  
        $mySQL = $sqlconexion->getConexion();   

        $query = "SELECT * FROM Compras JOIN Usuarios ON Compras.usuario_id = Usuarios.id_usuario JOIN Articulos ON Compras.articulo_id = Articulos.id_articulo ORDER BY id_compra DESC";
        $result = $mySQL->query($query);

        $sqlconexion->cerrarConexion($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function ComprobarCompra ($id_usuario, $id_articulo) {

        $sqlconexion = new Conexion();  
        $mySQL = $sqlconexion->getConexion();   

        $query = "SELECT * FROM Compras JOIN Usuarios ON Compras.usuario_id = Usuarios.id_usuario JOIN Articulos ON Compras.articulo_id = Articulos.id_articulo WHERE usuario_id = ? AND articulo_id = ? AND estado_compra = 'carrito'";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("ii", $id_usuario, $id_articulo);
        $stmt->execute();
        $result = $stmt->get_result();

        $sqlconexion->cerrarConexion($mySQL);

        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();

            return $row['id_compra'];

        } else {

            return "no existe";

        }

    }

    public function AgregarCompra ($id_usuario, $id_articulo) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "INSERT INTO Compras (cantidad_compra, estado_compra, usuario_id, articulo_id) VALUES (1, 'carrito', ?, ?)";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("ii", $id_usuario, $id_articulo);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Compra Insertada Correctamente";

    }

    public function SumarCompra ($id_compra) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "UPDATE Compras SET cantidad_compra = cantidad_compra + 1 WHERE id_compra = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("i", $id_compra);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Compra Actualizada";

    }

    public function BorrarCompras ($id_compra) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "DELETE FROM Compras WHERE id_compra = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("i", $id_compra);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Articulo Eliminado";

    }

    public function CambiarAComprado ($id_compra) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "UPDATE Compras SET estado_compra = 'comprado' WHERE id_compra = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("i", $id_compra);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Articulo Comprado";

    }

    public function BuscarCompra ($id_compra) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "SELECT * FROM Compras WHERE id_compra = $id_compra";
        $result = $mySQL->query($query);

        $sqlconexion->cerrarConexion($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

}