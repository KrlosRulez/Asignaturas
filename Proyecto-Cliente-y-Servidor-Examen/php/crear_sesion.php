<?php

$id_usuario = $_GET["id_usuario"];

$nombre_usuario = $_GET["nombre_usuario"];

$nombre_rol = $_GET["nombre_rol"];

session_start();

$_SESSION["$nombre_rol"] = $nombre_usuario;

echo $id_usuario;