<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("conexion.php");

require("CRUD_Compras.php");

$DB = new Compras();

$tipo_query = $_GET["query"];

switch ($tipo_query) {

    case 'agregar':
        
        $id_usuario = $_GET["id_usuario"];

        $id_articulo = $_GET["id_articulo"];

        $resultado = $DB->AgregarCompra($id_usuario, $id_articulo);
        
        echo "Compra Insertada Correctamente";

    break;

    case 'mostrar':

        $resultado = $DB->MostrarCompras();

        echo json_encode($resultado);

    break;

    case 'comprobar':

        $id_usuario = $_GET["id_usuario"];

        $id_articulo = $_GET["id_articulo"];

        $resultado = $DB->ComprobarCompra($id_usuario, $id_articulo);

        if ($resultado == "no existe") {

            echo $resultado;

        } else {

            echo json_encode($resultado);

        }

    break;

    case 'sumar':

        $id_compra = $_GET['id_compra'];

        $resultado = $DB->SumarCompra($id_compra);

        echo $resultado;

    break;

    case 'borrar':

        $id_compra = $_GET['id_compra'];

        $resultado = $DB->BorrarCompras($id_compra);

        echo $resultado;

    break;

    case 'buscar':

        $id_compra = $_GET['id_compra'];

        $resultado = $DB->BuscarCompra($id_compra);

        echo json_encode($resultado);

    break;

    case 'cambiar_a_comprado':

        $id_compra = $_GET['id_compra'];

        $resultado = $DB->CambiarAComprado($id_compra);

        echo $resultado;

    break;
}