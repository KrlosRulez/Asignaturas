<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica</title>
</head>
<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nombre: <input type="text" name="nombre"><br />
        Edad: <input type="number" name="edad"><br />
        <input type="submit" name="Enviar">
    </form>

    <?php 
    
    if (isset($_POST['Enviar'])) {

        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];

        $arr_as = array("Krlos" => 20, "Alex" => 17, "Joel" => 13);

        $arr_as["Pakitox"] = 18;

        $arr_as[$nombre] = $edad;

        foreach ($arr_as as $index => $value) {

            echo "Nombre: " . $index . ", Edad: " . $value . "<br />";

        }

        $arr_as["Krlos"] = 21;

        foreach ($arr_as as $index => $value) {

            echo "Nombre: " . $index . ", Edad: " . $value . "<br />";

        }

    }

    ?>

</body>
</html>