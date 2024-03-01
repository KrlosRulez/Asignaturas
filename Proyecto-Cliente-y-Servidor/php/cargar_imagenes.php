<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("conexion.php");

$sqlConexion = new Conexion();

$conexion = $sqlConexion->getConexion();

$conexion->set_charset("utf8");

$imagenes = scandir("../img");

echo json_encode($imagenes);

$sqlConexion->cerrarConexion($conexion);