<?php

require("conexion.php");

$sqlConexion = new Conexion();

$conexion = $sqlConexion->getConexion();

$conexion->set_charset("utf8");

    if (isset($_GET["mostrar"])) {

        $id_usuario = $_GET["id_usuario"];

        $sql_buscar = $conexion->query(
            "SELECT Usuarios.*, Roles.* FROM Usuarios JOIN Roles ON Usuarios.rol_id = Roles.id_rol WHERE id_usuario = $id_usuario"
        );

    } else {

        $correo = $_GET["correo_usuario"];

        $password = md5($_GET["password_usuario"]); 

        $sql_buscar = $conexion->query(
            "SELECT Usuarios.*, Roles.* FROM Usuarios JOIN Roles ON Usuarios.rol_id = Roles.id_rol WHERE correo_usuario = '$correo' AND password_usuario = '$password'"
        );

    }

    if ($row = mysqli_fetch_assoc($sql_buscar)) {
        $usuario_buscado = $row;
    }

echo json_encode($usuario_buscado);

$sqlConexion->cerrarConexion($conexion);