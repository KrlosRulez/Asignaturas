<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>

    <h1>Ejercicio 4</h1>

    <?php 
    
    $array_random = array();

    for ($i = 0; $i < 10; $i++) {

        $num_random = rand(1, 7);

        array_push($array_random, $num_random);

    }

    echo "El array de aleatorios es: ";

    foreach ($array_random as $valor) {

        echo $valor . "\t";

    }

    echo "<br />";

    echo "Mensajes:" . "<br />";

    for ($i = 1; $i <= 7; $i++) {

        $repetidos = -1;

        for ($x = 0; $x < 10; $x++) {

            if ($i == $array_random[$x]) {
                $repetidos++;
            }

        }

        if ($repetidos > 0) {
            echo "El número $i se repite $repetidos veces" . "<br />";
        }

    }

    echo "<br /><br />";

    ?>

    <a href="index.php">Volver al Index</a>
    
</body>
</html>