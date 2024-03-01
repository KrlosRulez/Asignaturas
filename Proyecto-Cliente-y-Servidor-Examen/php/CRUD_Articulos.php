<?php 

require_once("conexion.php");

class Articulos {

    public function MostrarArticulos () {

        $sqlconexion = new Conexion();  
        $mySQL = $sqlconexion->getConexion();   

        $query = "SELECT * FROM Articulos JOIN Tipos ON Articulos.tipo_id = Tipos.id_tipo JOIN Plataformas ON Articulos.plataforma_id = Plataformas.id_plataforma JOIN Generos ON Articulos.genero_id = Generos.id_genero ORDER BY id_articulo ASC";
        $result = $mySQL->query($query);

        $sqlconexion->cerrarConexion($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function AgregarArticulo ($nombre_articulo, $descripcion_articulo, $precio_articulo, $imagen_articulo, $stock_articulo, $fecha_lanzamiento_articulo, $desarrollador_articulo, $id_tipo, $id_plataforma, $id_genero) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "INSERT INTO Articulos (nombre_articulo, descripcion_articulo, precio_articulo, imagen_articulo, stock_articulo, fecha_lanzamiento_articulo, desarrollador_articulo, tipo_id, plataforma_id, genero_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("ssdsissiii", $nombre_articulo, $descripcion_articulo, $precio_articulo, $imagen_articulo, $stock_articulo, $fecha_lanzamiento_articulo, $desarrollador_articulo, $id_tipo, $id_plataforma, $id_genero);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Artículo Insertado Correctamente";

    }

    public function EditarArticulo ($id_articulo, $nombre_articulo, $descripcion_articulo, $precio_articulo, $imagen_articulo, $stock_articulo, $fecha_lanzamiento_articulo, $desarrollador_articulo, $id_tipo, $id_plataforma, $id_genero) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "UPDATE Articulos SET nombre_articulo = ?, descripcion_articulo = ?, precio_articulo = ?, imagen_articulo = ?, stock_articulo = ?, fecha_lanzamiento_articulo = ?, desarrollador_articulo = ?, tipo_id = ?, plataforma_id = ?, genero_id = ? WHERE id_articulo = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("ssdsissiiii", $nombre_articulo, $descripcion_articulo, $precio_articulo, $imagen_articulo, $stock_articulo, $fecha_lanzamiento_articulo, $desarrollador_articulo, $id_tipo, $id_plataforma, $id_genero, $id_articulo);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Articulo Editado";

    }

    public function BajarStock ($id_articulo, $restar_stock) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "UPDATE Articulos SET stock_articulo = stock_articulo - ? WHERE id_articulo = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("ii", $restar_stock, $id_articulo);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Stock de Articulo Actualizado";

    }

    public function BuscarArticulo ($id_articulo) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "SELECT * FROM Articulos WHERE id_articulo = $id_articulo";
        $result = $mySQL->query($query);

        $sqlconexion->cerrarConexion($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function MostrarTipos () {

        $sqlconexion = new Conexion();  
        $mySQL = $sqlconexion->getConexion();   

        $query = "SELECT * FROM Tipos";
        $result = $mySQL->query($query);

        $sqlconexion->cerrarConexion($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function MostrarPlataformas () {

        $sqlconexion = new Conexion();  
        $mySQL = $sqlconexion->getConexion();   

        $query = "SELECT * FROM Plataformas";
        $result = $mySQL->query($query);

        $sqlconexion->cerrarConexion($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function MostrarGeneros () {

        $sqlconexion = new Conexion();  
        $mySQL = $sqlconexion->getConexion();   

        $query = "SELECT * FROM Generos";
        $result = $mySQL->query($query);

        $sqlconexion->cerrarConexion($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function BorrarArticulo ($id_articulo) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "DELETE FROM Articulos WHERE id_articulo = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("i", $id_articulo);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Articulo Eliminado";

    }

    // public function BuscarCompra ($id_usuario, $id_articulo) {

    //     $sqlconexion = new Conexion();  
    //     $mySQL = $sqlconexion->getConexion();   

    //     $query = "SELECT * FROM Compras JOIN Usuarios ON Compras.usuario_id = Usuarios.id_usuario JOIN Articulos ON Compras.articulo_id = Articulos.id_articulo WHERE usuario_id = ? AND articulo_id = ? AND estado_compra = 'carrito'";
    //     $stmt = $mySQL->prepare($query);
    //     $stmt->bind_param("ii", $id_usuario, $id_articulo);
    //     $stmt->execute();
    //     $result = $stmt->get_result();

    //     $sqlconexion->cerrarConexion($mySQL);

    //     if ($result->num_rows > 0) {

    //         $row = $result->fetch_assoc();

    //         return $row['id_compra'];

    //     } else {

    //         return "no existe";

    //     }

    // }

    // public function SumarCompra ($id_compra) {

    //     $sqlconexion = new Conexion();
    //     $mySQL = $sqlconexion->getConexion();

    //     $query = "UPDATE Compras SET cantidad_compra = cantidad_compra + 1 WHERE id_compra = ?";
    //     $stmt = $mySQL->prepare($query);
    //     $stmt->bind_param("i", $id_compra);
    //     $stmt->execute();

    //     $sqlconexion->cerrarConexion($mySQL);

    //     return "Compra Actualizada";

    // }



}