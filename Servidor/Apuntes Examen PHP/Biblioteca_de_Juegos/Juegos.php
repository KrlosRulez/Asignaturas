<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabla de Juegos</title>
    </head>

    <?php require("CRUD/CRUD_Juegos.php"); ?>

    <?php include("menu.php"); ?>

    <body>

        <?php 
        
        $dataBase = new Juegos();

        $juegos = $dataBase->showJuegos();

        ?>

        <h2 class="nombre">Tabla de Juegos</h2>

        <table border="1">
            
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Imagen</td>
                <td>Compañia</td>
                <td>Precio</td>
                <td>Género</td>
            </tr>

            <?php foreach ($juegos as $juego) { ?>

                <tr>
                    <td><?php echo $juego['id']; ?></td>
                    <td><?php echo $juego['juego']; ?></td>
                    <td><img width="150" height="200" src="img/<?php echo $juego['imagen']; ?>" /></td>
                    <td><?php echo $juego['compañia']; ?></td>
                    <td><?php echo $juego['precio']; ?></td>
                    <td><?php echo $juego['genero']; ?></td>
                </tr>

            <?php } ?>

        </table>

    </body>
</html>