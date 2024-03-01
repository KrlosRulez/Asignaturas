<?php require("check_session.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalam&family=Trade+Winds&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/Categorias.css" />
    <script src="js/funciones.js"></script>
</head>

<body>

    <?php

    include("menu.php");

    require("CRUD_Categorias.php");

    $dataBase = new Categorias();

    if (isset($_POST['agregar'])) { // Si se envia el formulario de agregar
    
        $categoria = $_POST['categoria'];

        $dataBase->addCategoria($categoria);

        header("location:Categorias.php");

    }

    if (isset($_POST['editar'])) { // Si se envia el formulario de editar
    
        $id = $_POST['id_categoria'];

        $categoria = $_POST['categoria'];

        $dataBase->editCategoria($id, $categoria);

        header("location:Categorias.php");

    }

    if (isset($_GET['Borrar'])) { // Si se pulsa el botón de borrar

        if (isset($_SESSION['admin']) || isset($_SESSION['super'])) { 
    
        $id_borrar = $_GET['Borrar'];

        $dataBase->deleteCategoria($id_borrar);

        header("location:Categorias.php");

        } else {

            header("location:Categorias.php?aviso");

        }

    }

    ?>

    <h2 class="nombre">Tabla de Categorías</h2>

    <?php if (isset($_GET['Agregar'])) { ?>

        <?php if (isset($_SESSION['admin']) || isset($_SESSION['super'])) { ?>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <span>Categoría:</span> <input type="text" name="categoria">&nbsp;&nbsp;
            <input class="submit" type="submit" name="agregar" value="Añadir">

        </form>

        <?php } else { 
         
            header("location:Categorias.php?aviso");
         
        } ?>

        <br />

    <?php } else { ?>

        <?php if (isset($_SESSION['admin']) || isset($_SESSION['super'])) { ?>

        <div class="agregar">
            <h3>
                <a href="Categorias.php?Agregar">
                    <div>+</div> Añadir Categoría
                </a>
            </h3>
        </div>

        <?php } ?>

    <?php } ?>



    <?php if (isset($_POST['Editar'])) { ?>

        <h3 class="form">Editar Categoría</h3>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <input type="hidden" name="id_categoria" value="<?php echo $_POST['id_categoria']; ?>">
            <span>Categoría:</span> <input type="text" name="categoria" value="<?php echo $_POST['categoria']; ?>">&nbsp;&nbsp;
            <input class="submit" type="submit" name="editar" value="Editar">

        </form>

        <br />

    <?php } ?>

    <?php

    $categorias = $dataBase->showCategorias();

    ?>

    <table border="1">

        <tr>
            <td>ID Categoría</td>
            <td>Categoría</td>
            <?php if (isset($_SESSION['admin']) || isset($_SESSION['super'])) { ?>
            <td>Editar</td>
            <td>Borrar</td>
            <?php } ?>
        </tr>

        <?php foreach ($categorias as $categoria) { ?>

            <tr>
                <td>
                    <?php echo $categoria["id_categoria"]; ?>
                </td>
                <td>
                    <?php echo $categoria["categoria"]; ?>
                </td>
                <?php if (isset($_SESSION['admin']) || isset($_SESSION['super'])) { ?>
                <td>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="id_categoria" value="<?php echo $categoria["id_categoria"]; ?>">
                        <input type="hidden" name="categoria" value="<?php echo $categoria["categoria"]; ?>">
                        <input class="submit" type="submit" name="Editar" value="Editar">
                    </form>
                </td>
                <td>
                    <button class="submit" onclick="borrar_categoria_js('<?php echo $categoria['id_categoria']; ?>', '<?php echo $categoria['categoria']; ?>')">
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