<?php

require_once("conexion.php");

require("CRUD_Products.php");

$DB = new Products();

$tipo_query = $_GET["query"];

switch ($tipo_query) {

    case 'mostrar':

        $resultado = $DB->MostrarProductos();
        
        echo json_encode($resultado);

    break;

    case 'mostrar_id':

        $id_product = $_GET["id_product"];

        $resultado = $DB->MostrarPorID($id_product);
        
        echo json_encode($resultado);

    break;

    case 'agregar':

        $name = $_GET["name"];

        $brand = $_GET["brand"];

        $description = $_GET["description"];

        $resultado = $DB->AgregarProducto($name, $brand, $description);
        
        echo $resultado;

    break;

    case 'editar':

        $id_product = $_GET["id_product"];

        $name = $_GET["name"];

        $brand = $_GET["brand"];

        $description = $_GET["description"];

        $resultado = $DB->EditarProducto($id_product, $name, $brand, $description);
        
        echo $resultado;

    break;

    case 'eliminar':

        $id_product = $_GET["id_product"];

        $resultado = $DB->EliminarProducto($id_product);
        
        echo $resultado;

    break;

}