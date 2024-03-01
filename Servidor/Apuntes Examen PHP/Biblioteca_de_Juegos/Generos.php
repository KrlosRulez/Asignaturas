<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabla de Géneros</title>
    </head>

    <?php require("CRUD/CRUD_Generos.php"); ?>

    <?php include("menu.php"); ?>

    <body>

        <?php 
        
        $dataBase = new Generos();

        $generos = $dataBase->showGeneros();

        ?>

        <h2 class="nombre">Tabla de Géneros</h2>

        <!-- AGREGAR GÉNERO -->

        <?php if (isset($_GET['Agregar'])) { ?>

            <!-- Mostrar formulario de agregar -->

            <h3>Agregar Género</h3>

            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

                Género: <input type="text" name="genero"><br /><br />

                <input type="submit" name="boton-agregar" value="Agregar Género">

            </form>

            <br />

        <?php } else { ?>

            <!-- Mostrar enlace para abrir formulario -->

            <a href="Generos.php?Agregar">Agregar Género</a>

            <br /><br />

        <?php } ?>

        <?php 
        
        if (isset($_POST['boton-agregar'])) {

            $input_genero = $_POST['genero'];

            $data = [$input_genero];

            $dataBase->addGenero($data);

            header('location:Generos.php');

        } 
        
        ?>

        <!-- FIN AGREGAR GÉNERO -->

        <!-- BORRAR GÉNERO -->

        <?php 
        
        if (isset($_GET['Eliminar'])) { 

            $genero_eliminar = [$_GET['Eliminar']];

            if ($result = $dataBase->deleteGenero($genero_eliminar)) {

                header('location:Generos.php');

            } else {

                echo "<h3>No se puede eliminar el género porque tiene juegos asociados</h3>";

            }

        } 
        
        ?>

        <!-- FIN BORRAR GÉNERO -->

        <!-- MODIFICAR GÉNERO -->

        <?php 

        if (isset($_GET['Modificar'])) {

            $id_modificar = [$_GET['Modificar']];

            $datos_modificar = $dataBase->showOneGenero($id_modificar); // Array de una sola posición que es el array con parámetros

            $datos_modificar = $datos_modificar[0];

        ?>

            <h3>Modificar Género</h3>

            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

                Nuevo Nombre: <input type="text" name="genero" value="<?php echo $datos_modificar[1]; ?>">
                <input type="hidden" name="id" value="<?php echo $datos_modificar[0]; ?>">
                <br /><br />

                <input type="submit" name="boton-modificar" value="Modificar Género">

            </form>

            <br />

        <?php

        }

        ?>

        <?php  
        
        if (isset($_POST['boton-modificar'])) {

            $data = [$_POST['id'], $_POST['genero']];

            $dataBase->editGenero($data);

            header('location:Generos.php');

        }

        ?>

        <!-- FIN MODIFICAR GÉNERO -->

        <!-- TABLA -->

        <table border="1">
            
            <tr>
                <td>ID</td>
                <td>Género</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>

            <?php foreach ($generos as $genero) { ?>

                <tr>
                    <td><?php echo $genero['id']; ?></td>
                    <td><?php echo $genero['genero']; ?></td>
                    <td><a href="Generos.php?Modificar=<?php echo $genero['id']; ?>">Modificar</a></td>
                    <td><button onclick="confirmar_borrar_genero(<?php echo $genero['id']; ?>, '<?php echo $genero['genero']; ?>')">Eliminar</button></td>
                </tr>

            <?php } ?>

        </table>

        <!-- FIN TABLA -->

    </body>
</html>