<?php require("check_session.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalam&family=Trade+Winds&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/Libros.css" />
    <script src="js/funciones.js"></script>
</head>

<body>

    <?php

    include("menu.php");

    require("CRUD_Categorias.php");

    require("CRUD_Libros.php");

    $dataBaseCategorias = new Categorias();

    $categorias = $dataBaseCategorias->showCategorias();

    $dataBase = new Libros();

    if (isset($_POST['agregar'])) { // Si se envia el formulario de agregar
    
        $titulo = $_POST['titulo'];

        $nombre_foto = $_FILES["imagen"]["name"];

        move_uploaded_file($_FILES["imagen"]["tmp_name"],
        "img/" . $nombre_foto);

        $autor = $_POST['autor'];

        $id_categoria = $_POST['id_categoria'];

        $precio = $_POST['precio'];

        $dataBase->addLibro($titulo, $nombre_foto, $autor, $id_categoria, $precio);

        header("location:Libros.php");

    }

    if (isset($_POST['editar'])) { // Si se envia el formulario de editar
    
        $id_libro = $_POST['id_libro'];

        $titulo = $_POST['titulo'];

        $foto_ant = $_POST['foto_ant'];

        $autor = $_POST['autor'];

        $id_categoria = $_POST['id_categoria'];

        if ($_POST['precio'] == "") {

            $precio = 0;

        } else {

            $precio = $_POST['precio'];

        }

        $nombre_foto = $_POST['nombre_foto'];

        $foto_nueva = $_FILES["foto_nueva"]["name"];

        if ($foto_nueva == "") {

            rename("img/$foto_ant", "img/$nombre_foto");

            $dataBase->editLibro($id_libro, $titulo, $nombre_foto, $autor, $id_categoria, $precio);

        } else {

            unlink('img/' . $foto_ant);

            move_uploaded_file($_FILES["foto_nueva"]["tmp_name"],
            "img/" . $foto_nueva);

            $dataBase->editLibro($id_libro, $titulo, $foto_nueva, $autor, $id_categoria, $precio);

        }
    
        header("location:Libros.php");

    }

    if (isset($_GET['Borrar'])) { // Si se pulsa el botón de borrar
    
        if (isset($_SESSION['admin']) || isset($_SESSION['super'])) { 

        $id_borrar = $_GET['Borrar'];

        $imagen = $_GET['Imagen'];

        unlink('img/' . $imagen);

        $dataBase->deleteLibro($id_borrar);

        header("location:Libros.php");

        } else {

            header("location:Libros.php?aviso");

        }

    }

    ?>

    <h2 class="nombre">Tabla de Libros</h2>

    <?php if (isset($_GET['Agregar'])) { ?>

        <?php if (isset($_SESSION['admin']) || isset($_SESSION['super'])) { ?>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

            <span>Título del Libro:</span> <input type="text" name="titulo" class="largo">&nbsp;&nbsp;
            <span>Autor:</span> <input type="text" name="autor">&nbsp;&nbsp;
            <span>Categoría:</span>
            <select name="id_categoria">

                <?php foreach ($categorias as $categoria) { ?>

                    <option value="<?php echo $categoria[0]; ?>">
                        <?php echo $categoria[1]; ?>
                    </option>

                <?php } ?>

            </select>&nbsp;&nbsp;
            <span>Precio:</span> <input class="corto" type="number" name="precio"><br />
            <span>Imagen: </span> <input type="file" name="imagen">&nbsp;&nbsp;
            <input class="submit" type="submit" name="agregar" value="Añadir">

        </form>

        <?php } else { 

            header("location:Libros.php?aviso");

        } ?>

        <br />

    <?php } else { ?>

        <?php if (isset($_SESSION['admin']) || isset($_SESSION['super'])) { ?>

        <div class="agregar">
            <h3>
                <a href="Libros.php?Agregar">
                    <div>+</div> Añadir Libro
                </a>
            </h3>
        </div>

        <?php } ?>

    <?php } ?>



    <?php if (isset($_POST['Editar'])) { ?>

        <h3 class="form">Editar Libro</h3>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

            <input type="hidden" name="id_libro" value="<?php echo $_POST['id_libro']; ?>">
            <span>Título:</span> <input class="largo" type="text" name="titulo"
                value="<?php echo $_POST['titulo']; ?>">&nbsp;&nbsp;
            <span>Autor:</span> <input type="text" name="autor" value="<?php echo $_POST['autor']; ?>">&nbsp;&nbsp;
            <span>Categoría:</span>
            <select name="id_categoria">

                <?php foreach ($categorias as $categoria) { ?>

                    <option value="<?php echo $categoria[0]; ?>" <?php if ($categoria[0] == $_POST['id_categoria']) { ?> selected
                        <?php } ?>>
                        <?php echo $categoria[1]; ?>
                    </option>

                <?php } ?>

            </select>&nbsp;&nbsp;
            <span>Precio:</span> <input class="corto" type="number" name="precio" value="<?php echo $_POST['precio']; ?>"><br />
            <span>Imagen: </span> <input type="text" name="nombre_foto" value="<?php echo $_POST['foto_ant']; ?>">&nbsp;&nbsp; <input type="file" name="foto_nueva">&nbsp;&nbsp;
            <input type="hidden" name="foto_ant" value="<?php echo $_POST["foto_ant"]; ?>">
            <input class="submit" type="submit" name="editar" value="Editar">

        </form>

        <br />

    <?php } ?>

    <?php

    $libros = $dataBase->showLibros();

    ?>

    <table border="1">

        <tr>
            <td>ID Libro</td>
            <td>Título</td>
            <td>Imagen</td>
            <td>Autor</td>
            <td>Precio</td>
            <td>Categoría</td>
            <?php if (isset($_SESSION['admin']) || isset($_SESSION['super'])) { ?>
            <td>Editar</td>
            <td>Borrar</td>
            <?php } ?>
        </tr>

        <?php foreach ($libros as $libro) { ?>

            <tr>
                <td>
                    <?php echo $libro["id_libro"]; ?>
                </td>
                <td>
                    <?php echo $libro["titulo"]; ?>
                </td>
                <td>
                    <img src="img/<?php echo $libro["imagen"]; ?>" width="120" height="160"/>
                </td>
                <td>
                    <?php echo $libro["autor"]; ?>
                </td>
                <td>
                    <?php echo $libro["precio"]; ?>
                </td>
                <td>
                    <?php echo $libro["categoria"]; ?>
                </td>
                <?php if (isset($_SESSION['admin']) || isset($_SESSION['super'])) { ?>
                <td>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="id_libro" value="<?php echo $libro["id_libro"]; ?>">
                        <input type="hidden" name="titulo" value="<?php echo $libro["titulo"]; ?>">
                        <input type="hidden" name="autor" value="<?php echo $libro["autor"]; ?>">
                        <input type="hidden" name="id_categoria" value="<?php echo $libro["id_categoria"]; ?>">
                        <input type="hidden" name="precio" value="<?php echo $libro["precio"]; ?>">
                        <input type="hidden" name="foto_ant" value="<?php echo $libro["imagen"]; ?>">
                        <input class="submit" type="submit" name="Editar" value="Editar">
                    </form>
                </td>
                <td>
                    <button class="submit" onclick="borrar_libro_js('<?php echo $libro['id_libro']; ?>', '<?php echo $libro['titulo']; ?>', '<?php echo $libro['imagen']; ?>')">
                        Borrar
                    </button>
                </td>
                <?php } ?>
            </tr>

        <?php } ?>

    </table>

    <br /><br />

</body>

</html>