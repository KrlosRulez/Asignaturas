<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("conexion.php");

require("CRUD_Usuarios.php");

$DB = new Usuarios();

$tipo_query = $_GET["query"];

switch ($tipo_query) {

    case 'agregar':
        
        $nombre_usuario = $_GET["nombre_usuario"];

        $correo_usuario = $_GET["correo_usuario"];

        $password_usuario = md5($_GET["password_usuario"]); 

        $resultado = $DB->AgregarUsuario($nombre_usuario, $correo_usuario, $password_usuario);
        
        if ($resultado == "Correo ya Registrado" || $resultado == "Nombre en Uso" || $resultado == "Ambos en Uso") {

            echo $resultado;

        } else {

            echo "Usuario Insertado Correctamente";

        }

    break;

    case 'agregar_rol':
        
        $nombre_usuario = $_GET["nombre_usuario"];

        $correo_usuario = $_GET["correo_usuario"];

        $password_usuario = md5($_GET["password_usuario"]); 

        $rol_usuario = $_GET["rol_id"];

        $resultado = $DB->AgregarUsuarioRol($nombre_usuario, $correo_usuario, $password_usuario, $rol_usuario);
        
        if ($resultado == "Correo ya Registrado" || $resultado == "Nombre en Uso" || $resultado == "Ambos en Uso") {

            echo $resultado;

        } else {

            echo "Usuario Insertado Correctamente";

        }

    break;

    case 'mostrar':

        $resultado = $DB->MostrarUsuarios();

        echo json_encode($resultado);

    break;

    case 'buscar':

        $id_usuario = $_GET["id_usuario"];

        $resultado = $DB->MostrarPorID($id_usuario);

        echo json_encode($resultado);

    break;

    case 'cambiar_foto':

        $id_usuario = $_GET["id_usuario"];

        $nombre_foto = $_GET["nombre_foto"];

        $resultado = $DB->CambiarFoto($id_usuario, $nombre_foto);

        echo $resultado;

    break;

    case 'buscar_foto':

        $nombre_foto = $_GET["nombre_foto"];

        $resultado = $DB->BuscarFoto($nombre_foto);

        echo $resultado;

    break;

    case 'cambiar_password':

        $id_usuario = $_GET["id_usuario"];

        $nueva_password = md5($_GET["nueva_password"]);

        $resultado = $DB->CambiarPassword($id_usuario, $nueva_password);

        echo $resultado;

    break;

    case 'editar':

        $id_usuario = $_GET["id_usuario"];

        $nombre_usuario = $_GET["nombre_usuario"];

        $correo_usuario = $_GET["correo_usuario"];

        $password_usuario = md5($_GET["password_usuario"]);

        $rol_id = $_GET["rol_id"];

        $resultado = $DB->EditarUsuario($id_usuario, $nombre_usuario, $correo_usuario, $password_usuario, $rol_id);

        echo $resultado;

    break;

    case 'eliminar':

        $id_usuario = $_GET["id_usuario"];

        $resultado = $DB->BorrarUsuario($id_usuario);

        echo $resultado;

    break;

    case 'mostrar_roles':

        $resultado = $DB->MostrarRoles();
        
        echo json_encode($resultado);

    break;

}