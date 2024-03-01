<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
</head>

  <?php include("resize-class.php"); ?>

<body>

  <h1>Ejercicio 3</h1>
  <h2>Subir imagen a álbum seleccionado</h2>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

    Subir imagen <input type="file" name="foto"><br /><br />
    al álbum 
    <select name="album">

      <?php

        $scandir_imagenes = scandir("imagenes");

        for ($i = 2; $i < count($scandir_imagenes); $i++) {
        ?>
          
          <option value="<?php echo $scandir_imagenes[$i]; ?>"><?php echo $scandir_imagenes[$i]; ?></option>

        <?php
        }

      ?>

    </select>&nbsp;&nbsp;
    <input type="submit" name="subir_imagen" value="Subir imagen">

  </form>

  <?php 
  
  if (isset($_POST['subir_imagen'])) {

    $album = $_POST['album'];

    $foto = $_FILES["foto"]["name"];

    // Subir imagen y miniatura

    move_uploaded_file($_FILES["foto"]["tmp_name"],
    "imagenes/$album/" . $foto);

    $resizeObj = new resize('imagenes/' . $album . '/' . $foto);

    $resizeObj -> resizeImage(150, 150, 'crop');

    $resizeObj -> saveImage('imagenes/' . $album . '/thumbs/' . $foto, 100);

    header("location:index.php");

  }

  ?>

</body>
</html>