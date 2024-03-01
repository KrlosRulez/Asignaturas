<?php 

require_once("conexion.php");

class Products {

    public function MostrarProductos () {

        $sqlconexion = new Conexion();  
        $mySQL = $sqlconexion->getConexion();   

        $query = "SELECT * FROM products";
        $result = $mySQL->query($query);

        $sqlconexion->cerrarConexion($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function MostrarPorID ($id_product) {

        $sqlconexion = new Conexion();  
        $mySQL = $sqlconexion->getConexion();   

        $query = "SELECT * FROM products WHERE id_product = $id_product";
        $result = $mySQL->query($query);

        $sqlconexion->cerrarConexion($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function AgregarProducto ($name, $brand, $description) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "INSERT INTO products (name, brand, description) VALUES (?, ?, ?)";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("sss", $name, $brand, $description);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Producto Insertado Correctamente";

    }

    public function EditarProducto ($id_product, $name, $brand, $description) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "UPDATE products SET name = ?, brand = ?, description = ? WHERE id_product = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("sssi", $name, $brand, $description, $id_product);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Producto Editado";

    }

    public function EliminarProducto ($id_product) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "DELETE FROM products WHERE id_product = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("i", $id_product);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Producto Eliminado";

    }

}