<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("conexion.php");

$sqlConexion = new Conexion();

$conexion = $sqlConexion->getConexion();

$conexion->set_charset("utf8");

if ($_FILES["foto"]["name"] != "") {

    move_uploaded_file($_FILES["foto"]["tmp_name"],
    "../img/" . $_FILES["foto"]["name"]);

    echo $_FILES["foto"]["name"];

} else {

    echo "No hay imagen";

}

$sqlConexion->cerrarConexion($conexion);