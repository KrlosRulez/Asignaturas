<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Krlos</title>

    <script src="JS/funciones.js"></script>

</head>

    <?php include("PHP/resize-class.php"); ?>

<body>

    <?php include("PHP/funcionalidad.php"); ?>

    <?php $albumes = scandir("albumes"); ?>

    <?php 

    // Mostrar enlaces a todos los álbumes
    
    for ($i = 2; $i < count($albumes); $i++) {

        if (is_dir("albumes/" . $albumes[$i])) {
        ?>

            <a href="<?php echo "index.php?album=" . $albumes[$i]; ?>"><?php echo $albumes[$i]; ?></a><br /><br />

        <?php
        }

    }

    ?>

    <br /><br />

    <a href="index.php?estructura">Ver estuctura</a><br /><br />

    <a href="index.php?nuevo_album">Crear Nuevo Álbum</a><br /><br />

    <?php 

    // Formulario para crear nuevo álbum
    
    if (isset($_GET['nuevo_album'])) {
    ?>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    Nombre del nuevo álbum <input type="text" name="nombre"><br />
    <input type="submit" name="crear" value="Crear álbum">

    </form>

    <?php

    } 

    ?>

    <?php 
    
    if (isset($_GET['album'])) {
        
    $album = $_GET['album'];

    ?>

    <h2>Álbum: <?php echo $album; ?></h2>

    <button onclick="renombrar_album('<?php echo $album ?>')">
        Cambiar Nombre del álbum
    </button>

    <br /><br />

    <!-- Eliminar un álbum -->

    <button onclick="eliminar_album('<?php echo $album ?>')">
        Eliminar álbum
    </button>

    <!-- Mostrar Formulario al clickar un enlace -->
        
    <h3>Subir Imagen</h3>

    <!-- El formulario se procesará en la página del álbum que se esté visualizando -->

    <form method="post" action="<?php echo "index.php?album=" . $album; ?>" enctype="multipart/form-data">

        Subir imagen <input type="file" name="foto"><br /><br />
        <input type="submit" name="enviar" value="Subir a <?php echo $album; ?>">

    </form>

    <h3>Miniaturas del álbum</h3>

    <?php 

    // Mostrar miniaturas del álbum
    
    $imagenes = scandir("albumes/$album/thumbs/");

    for ($i = 2; $i < count($imagenes); $i++ ) {
    ?>

        <a href="<?php echo "albumes/$album/" . $imagenes[$i]; ?>" width="400" target="_blank">
            <img src="<?php echo "albumes/$album/thumbs/" . $imagenes[$i]; ?>" /><br />
        </a>

        <p>Foto: <?php echo $imagenes[$i]; ?></p>
        
        <a href="<?php echo "albumes/$album/" . $imagenes[$i]; ?>" download>Descargar</a>

        &nbsp;&nbsp;

        <button onclick="eliminar('<?php echo $album ?>', '<?php echo $imagenes[$i]; ?>')">
                Eliminar
        </button>

        &nbsp;&nbsp;

        <button onclick="renombrar_imagen('<?php echo $album ?>', '<?php echo $imagenes[$i]; ?>')">
                Renombrar
        </button>
       

        &nbsp;&nbsp;

        <!-- Formulario con opciones para mover imagen -->

    <?php

    ?>

    <form method="post" action="<?php echo "index.php?album=" . $album; ?>">

        <input type="submit" name="mover_js" value="Mover a"> &nbsp;

        <input type="hidden" name="img" value="<?php echo $imagenes[$i]; ?>">

        <input type="hidden" name="album" value="<?php echo $album; ?>">

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

    </form>

        <br /><br />

    <?php

    }

    ?>

    <?php

    } // Cierre if (isset($_POST['album']))

    ?>

    <?php 

    // Al enviar el formulario, guardar la foto original y la miniatura
    
    if (isset($_POST['enviar'])) {

        $nombre_foto = $_FILES["foto"]["name"];

        move_uploaded_file($_FILES["foto"]["tmp_name"],
        "albumes/$album/" . $nombre_foto);

        $resizeObj = new resize('albumes/' . $album . '/' . $nombre_foto);

        $resizeObj -> resizeImage(150, 100, 'crop');

        $resizeObj -> saveImage('albumes/' . $album . '/thumbs/' . $nombre_foto, 100);

        header("location:index.php?album=$album");

    }

    ?>

</body>
</html>