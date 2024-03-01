<?php 

    $mensaje_nombre = "";
    $mensaje_edad = "";

    if (isset($_POST['Enviar'])) {
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];

        if (empty($nombre) && empty($edad)) {
            header("location:Error.php?nombre&edad");
        } else if (empty($nombre)) {
            // $mensaje_nombre = "Debes introducir un nombre" . "<br />";
            header("location:Error.php?nombre");
        } else if (empty($edad)) {
            // $mensaje_edad = "Debes introducir una edad" . "<br />";
            header("location:Error.php?edad");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <?php echo $mensaje_nombre; ?>
        <input type="text" name="nombre"><br /><br />
        <?php echo $mensaje_edad; ?>
        <input type="number" name="edad"><br /><br />
        <input type="submit" name="Enviar"><br /><br />

    </form>

</body>
</html>