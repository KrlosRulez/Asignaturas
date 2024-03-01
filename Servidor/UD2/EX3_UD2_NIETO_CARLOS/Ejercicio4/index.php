<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
    <script src="funciones.js"></script>
</head>

  <?php include("funciones.php"); ?>

<body>
  <h1>Ejercicio 4</h1>
  <h2>Renombrar imagen</h2>

  <?php 

    $img = scandir("img");
  
    for ($i = 2; $i < count($img); $i++) {
    ?>

      <a href="<?php echo "index.php?album=" . $img[$i]; ?>"><?php echo $img[$i]; ?></a>

      <br /><br />

    <?php
    }
 
  ?>

  <?php 
  
  if (isset($_GET['album'])) {
   
    $album = $_GET['album'];

    $scandir_miniaturas = scandir("img/" . $album . "/thumbs");

    for ($x = 2; $x < count($scandir_miniaturas); $x++) {
    ?>

      <img src="<?php echo "img/" . $album . "/thumbs/" . $scandir_miniaturas[$x] ?>" width="150" />
      <p>Imagen: <?php echo $scandir_miniaturas[$x]; ?></p>

      <form method="post" action="<?php echo "index.php?album=" . $album; ?>">
        Nuevo Nombre <input type="text" name="nuevo_nombre">&nbsp;&nbsp;
        <input type="submit" name="renombrar" value="Renombrar">
        <input type="hidden" name="imagen" value="<?php echo $scandir_miniaturas[$x]; ?>">
      </form>

    <?php
    }
    
  }

  ?>

</body>
</html>