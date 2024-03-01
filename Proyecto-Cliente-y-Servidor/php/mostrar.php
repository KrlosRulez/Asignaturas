<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


require("conexion.php");

$sqlConexion = new Conexion();

$conexion = $sqlConexion->getConexion();

$conexion->set_charset("utf8");

if (isset($_GET["id_detalles"])) {

    $id_articulo = $_GET["id_detalles"];

    $sql_articulo_id = $conexion->query(
        "SELECT Articulos.*, Tipos.*, Plataformas.*, Generos.* FROM Articulos JOIN Tipos ON Articulos.tipo_id = Tipos.id_tipo JOIN Plataformas ON Articulos.plataforma_id = Plataformas.id_plataforma JOIN Generos ON Articulos.genero_id = Generos.id_genero WHERE Articulos.id_articulo = $id_articulo"
    );

    $articulo_elegido = array();

    while ($row = mysqli_fetch_assoc($sql_articulo_id)) {
        $articulo_elegido[] = $row;
    }

    $JSON_DATA['articulo_elegido'] = $articulo_elegido;

} else {

    $sql_articulos = $conexion->query(
        "SELECT Articulos.*, Tipos.*, Plataformas.*, Generos.* FROM Articulos JOIN Tipos ON Articulos.tipo_id = Tipos.id_tipo JOIN Plataformas ON Articulos.plataforma_id = Plataformas.id_plataforma JOIN Generos ON Articulos.genero_id = Generos.id_genero ORDER BY Articulos.id_articulo"
    );
    
    $sql_plataformas = $conexion->query(
        "SELECT * FROM Plataformas"
    );
    
    $sql_tipos = $conexion->query(
        "SELECT * FROM Tipos"
    );
    
    $sql_generos = $conexion->query(
        "SELECT * FROM Generos"
    );
    
    $JSON_DATA = array();
    
    $articulos = array();
    $plataformas = array();
    $tipos = array();
    $generos = array();
    
    while ($row = mysqli_fetch_assoc($sql_articulos)) {
        $articulos[] = $row;
    }
    
    while ($row = mysqli_fetch_assoc($sql_plataformas)) {
        $plataformas[] = $row;
    }
    
    while ($row = mysqli_fetch_assoc($sql_tipos)) {
        $tipos[] = $row;
    }
    
    while ($row = mysqli_fetch_assoc($sql_generos)) {
        $generos[] = $row;
    }
    
    $JSON_DATA['articulos'] = $articulos;
    $JSON_DATA['plataformas'] = $plataformas;
    $JSON_DATA['tipos'] = $tipos;
    $JSON_DATA['generos'] = $generos;

}

echo json_encode($JSON_DATA);

$sqlConexion->cerrarConexion($conexion);