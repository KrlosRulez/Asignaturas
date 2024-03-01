<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("conexion.php");

$sqlConexion = new Conexion();

$conexion = $sqlConexion->getConexion();

$conexion->set_charset("utf8");

$foto = $_GET["nombre_foto"];

unlink("../img/" . $foto);

$sqlConexion->cerrarConexion($conexion);