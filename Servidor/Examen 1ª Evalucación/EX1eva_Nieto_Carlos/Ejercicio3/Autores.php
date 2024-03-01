<?php

require("CrudAutores.php");

$dataBase = new Autores();
$autores = $dataBase->showAutores();

// AÑADIR AUTOR

// Si no se ha pulsado el botón de "editar" de ninguna fila existente
// el boton "enviar" del formulario tendrá como name "nuevo_autor", por lo que entrará en este isset

if (isset($_POST["nuevo_autor"])) {

    $autor = $_POST["autor"];   // Coger valor del formulario

    $data = array($autor);  // Crear array (addAutor espera un array cómo parámetro)
    $dataBase->addAutor($data); // Añadir autor con los datos del formulario
    header("location:Autores.php");

}

// ELIMINAR AUTOR

if (isset($_GET["eliminar"])) {

    $id_autor = $_GET["id_autor"];  // Coger id del autor de la URL

    $data = array($id_autor);   // Crear array (deleteAutor espera un array cómo parámetro)

    // Borrar ese autor  
    if ($result = $dataBase->deleteAutor($data)) {

        header("location:Autores.php");

    } else {

        echo "<h4>No se puede eliminar el autor porque tiene libros asociados</h4>";

    }

}

// EDITAR AUTOR

// Si se ha pulsado el editar de alguna fila, los datos de esa fila se guardan en variables 
// para rellenar los campos del formulario

if (isset($_GET["editar"])) {

    $id_autor = $_GET["id_autor"];  // Coger id del autor de la URL

    $data = array($id_autor);   // Crear array (AutorById espera un array cómo parámetro)
    $autores_editar = $dataBase->AutorById($data);  // Recoger datos de ese autor de la BBDD

    // $autores_editar es un array de una sola posición, que es el array con los datos del autor
    // el foreach se utiliza por comodidad a la hora de manejar los datos

    foreach ($autores_editar as $autor_editar) {

        $autor = $autor_editar["autor"];

    }

}

// Si se ha enviado el formulario tras pulsar el botón de editar de alguna fila existente
// se editarán los datos de la fila elegida con
// la nueva información de los campos del formulario

if (isset($_POST["editar_autor"])) {

    $id_autor = $_POST["id_autor"]; // Coger valores de los campos del formulario
    $autor = $_POST["autor"];

    $data = array($id_autor, $autor);   // Crear array (editAutor espera un array cómo parámetro)

    $dataBase->editAutor($data);    // Editar autor con los valores del formulario

    header("location:Autores.php");

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTORES</title>
</head>

<body>
    <h1>Backend - Gestión de la Librería</h1>
    <?php include("menu.php"); ?>

    <!-- FORMULARIO AÑADIR/EDITAR USUARIOS -->

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

        <!-- En este formulario, si se ha pulsado el editar de alguna fila, los campos se rellenarán con su información -->

        <input type="hidden" name="id_autor" value="<?php echo (isset($_GET['editar'])) ? $id_autor : ''; ?>">
        <label>AUTOR</label>
        <input type="text" name="autor" value="<?php echo (isset($_GET['editar'])) ? $autor : ''; ?>">
        <br>
        <input type="submit" name="<?php echo (isset($_GET['editar'])) ? 'editar_autor' : 'nuevo_autor'; ?>">
        <!-- Si se ha pulsado en editar de alguna fila, el formulario editará esa fila en lugar de añdir una nueva -->
        <br>

    </form>

    <br><br>

    <!-- FIN FORMULARIO -->

    <!-- TABLA DE AUTORES -->

    <table border="1">

        <tr>
            <td>ID AUTOR</td>
            <td>AUTOR</td>
        </tr>

        <?php foreach ($autores as $autor) { ?>
            <!-- Por cada fila en la tabla de autores en la BBDD, se crea una fila en la tabla -->

            <tr>
                <td>
                    <?php echo $autor["id_autor"]; ?>
                </td>
                <td>
                    <?php echo $autor["autor"]; ?>
                </td>
                <td><a href="Autores.php?id_autor=<?php echo $autor['id_autor']; ?>&editar">Editar</td>
                <!-- Hacer que el formulario edite en lugar de añadir -->
                <td><a href="Autores.php?id_autor=<?php echo $autor['id_autor']; ?>&eliminar">Eliminar</td>
            </tr>

        <?php } //END FOREACH ?>

    </table>

    <!-- FIN TABLA DE AUTORES -->

</body>

</html>