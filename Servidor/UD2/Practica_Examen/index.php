<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krlos al final estudia</title>
    <script src="JS/funciones.js"></script>
</head>

    <?php include("PHP/funcionalidad.php"); ?>

<body>

    <?php 
    
        $albumes = scandir("albumes");

        // Mostrar enlaces a los álbumes

        for ($i = 2; $i < count($albumes); $i++) {

            if (is_dir("albumes/" . $albumes[$i])) {
            ?>
            
            <a href="<?php echo "index.php?album=" . $albumes[$i]; ?>"><?php echo $albumes[$i]; ?></a><br /><br />

            <?php
            }

        }

    ?>

        <br /><br />

        <a href="index.php?estructura">Ver Estructura</a>

        <br /><br />

        <a href="index.php?crear_album">Crear Nuevo Álbum</a>

        <br /><br />

        <?php 
        
        if (isset($_GET['crear_album'])) {
        ?>
        
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                <span>Nombre del nuevo Álbum</span>&nbsp;&nbsp;<input type="text" name="nombre"><br /><br />
                <input type="submit" name="crear_album" value="Crear Álbum">

            </form>

        <?php
        }

        ?>

    <?php

        if (isset($_GET['album'])) {

            $album = $_GET['album'];

            $fotos_album = scandir("albumes/" . $album);

    ?>

        <h2>Álbum: <?php echo $album; ?></h2>

        <!-- Cambiar nombre del álbum -->

        <button onclick="cambiar_album_js('<?php echo $album; ?>')">
            Cambiar Nombre del álbum
        </button>

        <br /><br />

        <!-- Eliminar álbum -->

        <button onclick="eliminar_album_js('<?php echo $album; ?>')">
            Eliminar álbum
        </button>

        <h3>Subir Imagen</h3>

        <!-- Subir imagen al álbum -->

        <form method="post" action="<?php echo "index.php?album=" . $album; ?>" enctype="multipart/form-data">
            <input type="file" name="foto"><br /><br />
            <input type="submit" name="subir_imagen" value="Subir foto a <?php echo $album; ?>">
        </form>

        <h3>Imágenes del álbum</h3>

    <?php

        // Mostrar fotos de los álbumes

        for ($i = 2; $i < count($fotos_album); $i++) {

            if (is_file("albumes/" . $album . "/" . $fotos_album[$i])) {
            ?>
             
            <a href="<?php echo "albumes/" . $album . "/" . $fotos_album[$i]; ?>" target="_blank">
                <img src="<?php echo "albumes/" . $album . "/" . $fotos_album[$i]; ?>" width="300" height="250" />
            </a>

            <p>Foto: <?php echo "<i>" . $fotos_album[$i] . "</i>"; ?></p>
    
            <!-- Más Movidas para las fotos -->

            <!-- Descargar Foto -->

            <a href="<?php echo "albumes/" . $album . "/" . $fotos_album[$i]; ?>" download>Descargar Foto</a>

            &nbsp;&nbsp;

            <!-- Eliminar Imagen -->

            <button onclick="eliminar_imagen_js('<?php echo $album; ?>', '<?php echo $fotos_album[$i]; ?>')">
                Eliminar Imagen
            </button>

            &nbsp;&nbsp;

            <!-- Renombrar Imagen -->

            <button onclick="renombrar_imagen_js('<?php echo $album; ?>', '<?php echo $fotos_album[$i]; ?>')">
                Renombrar Imagen
            </button>

            <br /><br />

            <!-- Mover Imagen -->

            <form method="post" action="<?php echo "index.php?album=" . $album; ?>">    <!-- $_SERVER['PHP_SELF'] redirige a la URL sin variables -->
                <input type="submit" name="mover_imagen" value="Mover a">&nbsp;
                <select name="nuevo_album">
                <?php

                    for ($x = 2; $x < count($albumes); $x++) {

                        if (is_dir("albumes/" . $albumes[$x]) && $albumes[$x] != $album) {
                    ?>
                        
                        <option value="<?php echo $albumes[$x]; ?>"><?php echo $albumes[$x]; ?></option>

                    <?php
                        }
                    }

                ?>
                </select>
                <input type="hidden" name="imagen" value="<?php echo $fotos_album[$i]; ?>">
                <input type="hidden" name="album" value="<?php echo $album; ?>">
            </form>

            <br /><br />

            <?php
            } 

        }



    } // Cierre if (isset($_GET['album']))

    ?>

</body>
</html>