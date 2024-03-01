<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>

<body>

    <h1>Ejercicio 1</h1>
    <h2>Modificar código</h2>

</body>

<?php 

    if (isset($_GET['ver_fotos'])) {

        $fotos = scandir("fotos");
        
        for ($i = 2; $i < count($fotos); $i++) {
        ?>

            <a href="<?php echo "fotos/" . $fotos[$i]; ?>" target="_blank">
                <img src="fotos/<?php echo $fotos[$i];?>" width="150">
            </a>
            <p><?php echo $fotos[$i]; ?></p>

            <br />
        
        <?php
        }

    } else {
    ?>

        <a href="index.php?ver_fotos">fotos</a>

    <?php
    }
 
?>

</html>