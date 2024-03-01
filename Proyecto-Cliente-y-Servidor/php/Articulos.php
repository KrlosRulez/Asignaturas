<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("conexion.php");

require("CRUD_Articulos.php");

$DB = new Articulos();

$tipo_query = $_GET["query"];

switch ($tipo_query) {

    case 'agregar':
        
        $nombre_articulo = $_GET["nombre_articulo"];

        $descripcion_articulo = $_GET["descripcion_articulo"];

        $precio_articulo = $_GET["precio_articulo"];

        $imagen_articulo = $_GET["imagen_articulo"];

        $stock_articulo = $_GET["stock_articulo"];

        $fecha_lanzamiento_articulo = $_GET["fecha_lanzamiento_articulo"];

        $desarrollador_articulo = $_GET["desarrollador_articulo"];

        $id_tipo = $_GET["id_tipo"];

        $id_plataforma = $_GET["id_plataforma"];

        $id_genero = $_GET["id_genero"];

        $resultado = $DB->AgregarArticulo($nombre_articulo, $descripcion_articulo, $precio_articulo, $imagen_articulo, $stock_articulo, $fecha_lanzamiento_articulo, $desarrollador_articulo, $id_tipo, $id_plataforma, $id_genero);
        
        echo $resultado;

    break;

    case 'editar':
        
        $id_articulo = $_GET["id_articulo"];

        $nombre_articulo = $_GET["nombre_articulo"];

        $descripcion_articulo = $_GET["descripcion_articulo"];

        $precio_articulo = $_GET["precio_articulo"];

        $imagen_articulo = $_GET["imagen_articulo"];

        $stock_articulo = $_GET["stock_articulo"];

        $fecha_lanzamiento_articulo = $_GET["fecha_lanzamiento_articulo"];

        $desarrollador_articulo = $_GET["desarrollador_articulo"];

        $id_tipo = $_GET["id_tipo"];

        $id_plataforma = $_GET["id_plataforma"];

        $id_genero = $_GET["id_genero"];

        $resultado = $DB->EditarArticulo($id_articulo, $nombre_articulo, $descripcion_articulo, $precio_articulo, $imagen_articulo, $stock_articulo, $fecha_lanzamiento_articulo, $desarrollador_articulo, $id_tipo, $id_plataforma, $id_genero);
        
        echo $resultado;

    break;

    case 'mostrar':

        $resultado = $DB->MostrarArticulos();
        
        echo json_encode($resultado);

    break;

    case 'bajar_stock':

        $id_articulo = $_GET["id_articulo"];

        $restar_stock = $_GET["restar_stock"];

        $resultado = $DB->BajarStock($id_articulo, $restar_stock);
        
        echo $resultado;

    break;

    case 'buscar':

        $id_articulo = $_GET["id_articulo"];

        $resultado = $DB->BuscarArticulo($id_articulo);
        
        echo json_encode($resultado);

    break;

    case 'eliminar':

        $id_articulo = $_GET["id_articulo"];

        $resultado = $DB->BorrarArticulo($id_articulo);
        
        echo $resultado;

    break;

    case 'mostrar_tipos':

        $resultado = $DB->MostrarTipos();
        
        echo json_encode($resultado);

    break;

    case 'mostrar_plataformas':

        $resultado = $DB->MostrarPlataformas();
        
        echo json_encode($resultado);

    break;

    case 'mostrar_generos':

        $resultado = $DB->MostrarGeneros();
        
        echo json_encode($resultado);

    break;

}