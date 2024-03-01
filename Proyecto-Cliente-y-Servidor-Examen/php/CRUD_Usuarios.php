<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("conexion.php");

class Usuarios {

    public function MostrarUsuarios () {

        $sqlconexion = new Conexion();  
        $mySQL = $sqlconexion->getConexion();   

        $query = "SELECT * FROM Usuarios JOIN Roles ON Usuarios.rol_id = Roles.id_rol ORDER BY id_usuario ASC";
        $result = $mySQL->query($query);

        $sqlconexion->cerrarConexion($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

    public function MostrarPorID ($id_usuario) {

        $sqlconexion = new Conexion();  
        $mySQL = $sqlconexion->getConexion();   

        $query = "SELECT * FROM Usuarios JOIN Roles ON Usuarios.rol_id = Roles.id_rol WHERE id_usuario = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_BOTH);
        
        $sqlconexion->cerrarConexion($mySQL);

        return $result;

    }

    public function AgregarUsuario ($nombre_usuario, $correo_usuario, $password_usuario) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        // Comprobar si el correo ya existe

        $query_correo = "SELECT * FROM Usuarios WHERE correo_usuario = ?";
        $stmt_correo = $mySQL->prepare($query_correo);
        $stmt_correo->bind_param("s", $correo_usuario);
        $stmt_correo->execute();
        $resultado_correo = $stmt_correo->get_result();

        // Comprobar si el nombre de usuario ya existe

        $query_nombre = "SELECT * FROM Usuarios WHERE nombre_usuario = ?";
        $stmt_nombre = $mySQL->prepare($query_nombre);
        $stmt_nombre->bind_param("s", $nombre_usuario);
        $stmt_nombre->execute();
        $resultado_nombre = $stmt_nombre->get_result();

        if ($resultado_correo->num_rows > 0 && $resultado_nombre->num_rows > 0) {

            $sqlconexion->cerrarConexion($mySQL);

            return "Ambos en Uso";

        } else if ($resultado_correo->num_rows > 0) {

            $sqlconexion->cerrarConexion($mySQL);

            return "Correo ya Registrado";

        } else if ($resultado_nombre->num_rows > 0) {

            $sqlconexion->cerrarConexion($mySQL);

            return "Nombre en Uso";

        } else {

            $query = "INSERT INTO Usuarios (nombre_usuario, correo_usuario, password_usuario, rol_id) VALUES (?, ?, ?, 2)";
            $stmt = $mySQL->prepare($query);
            $stmt->bind_param("sss", $nombre_usuario, $correo_usuario, $password_usuario);
            $stmt->execute();

            $sqlconexion->cerrarConexion($mySQL);

        }

    }

    public function AgregarUsuarioRol ($nombre_usuario, $correo_usuario, $password_usuario, $rol_usuario) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        // Comprobar si el correo ya existe

        $query_correo = "SELECT * FROM Usuarios WHERE correo_usuario = ?";
        $stmt_correo = $mySQL->prepare($query_correo);
        $stmt_correo->bind_param("s", $correo_usuario);
        $stmt_correo->execute();
        $resultado_correo = $stmt_correo->get_result();

        // Comprobar si el nombre de usuario ya existe

        $query_nombre = "SELECT * FROM Usuarios WHERE nombre_usuario = ?";
        $stmt_nombre = $mySQL->prepare($query_nombre);
        $stmt_nombre->bind_param("s", $nombre_usuario);
        $stmt_nombre->execute();
        $resultado_nombre = $stmt_nombre->get_result();

        if ($resultado_correo->num_rows > 0 && $resultado_nombre->num_rows > 0) {

            $sqlconexion->cerrarConexion($mySQL);

            return "Ambos en Uso";

        } else if ($resultado_correo->num_rows > 0) {

            $sqlconexion->cerrarConexion($mySQL);

            return "Correo ya Registrado";

        } else if ($resultado_nombre->num_rows > 0) {

            $sqlconexion->cerrarConexion($mySQL);

            return "Nombre en Uso";

        } else {

            $query = "INSERT INTO Usuarios (nombre_usuario, correo_usuario, password_usuario, rol_id) VALUES (?, ?, ?, ?)";
            $stmt = $mySQL->prepare($query);
            $stmt->bind_param("sssi", $nombre_usuario, $correo_usuario, $password_usuario, $rol_usuario);
            $stmt->execute();

            $sqlconexion->cerrarConexion($mySQL);

        }

    }

    public function EditarUsuario ($id_usuario, $nombre_usuario, $correo_usuario, $password_usuario, $rol_id) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "UPDATE Usuarios SET nombre_usuario = ?, correo_usuario = ?, password_usuario = ?, rol_id = ? WHERE id_usuario = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("sssii", $nombre_usuario, $correo_usuario, $password_usuario, $rol_id, $id_usuario);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Usuario Editado Correctamente";

    }

    public function BorrarUsuario ($id_usuario) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "DELETE FROM Usuarios WHERE id_usuario = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Usuario Eliminado Correctamente";

    }

    public function CambiarFoto ($id_usuario, $nombre_foto) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "UPDATE Usuarios SET imagen_usuario = ? WHERE id_usuario = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("si", $nombre_foto, $id_usuario);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Foto Cambiada";

    }

    // Buscar Fotos para saber si eliminar la antigua

    public function BuscarFoto ($nombre_foto) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "SELECT * FROM Usuarios WHERE imagen_usuario = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("s", $nombre_foto);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {

            $sqlconexion->cerrarConexion($mySQL);

            return "true";

        } else {

            $sqlconexion->cerrarConexion($mySQL);

            return json_encode($resultado);

        }

    }

    public function CambiarPassword ($id_usuario, $nueva_password) {

        $sqlconexion = new Conexion();
        $mySQL = $sqlconexion->getConexion();

        $query = "UPDATE Usuarios SET password_usuario = ? WHERE id_usuario = ?";
        $stmt = $mySQL->prepare($query);
        $stmt->bind_param("si", $nueva_password, $id_usuario);
        $stmt->execute();

        $sqlconexion->cerrarConexion($mySQL);

        return "Password Cambiada";

    }

    public function MostrarRoles () {

        $sqlconexion = new Conexion();  
        $mySQL = $sqlconexion->getConexion();   

        $query = "SELECT * FROM Roles";
        $result = $mySQL->query($query);

        $sqlconexion->cerrarConexion($mySQL);

        return $result->fetch_all(MYSQLI_BOTH);

    }

}