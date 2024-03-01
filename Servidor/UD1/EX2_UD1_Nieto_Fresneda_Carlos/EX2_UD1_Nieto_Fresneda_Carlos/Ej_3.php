<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>

    <h1>Ejercicio 3</h1>

    <?php 

    $array_numeros_impares = array(1, 3, 5, 7, 9);

    for ($i = 1; $i < 4; $i++) {

        $num_random = rand(1, 20);

        if ($num_random % 2 == 0) {

            echo "ITERACIÓN Nº $i: Número par insertado: $num_random" . "<br />";

            array_push($array_numeros_impares, $num_random);

        } else if ($num_random % 2 != 0) {

            if (in_array($num_random, $array_numeros_impares) == false) {

                echo "ITERACIÓN Nº $i: Número impar insertado: $num_random" . "<br />";

                array_push($array_numeros_impares, $num_random);

            } else {
                $i--;
            }

        }

    }

    echo "El array es: ";

    foreach ($array_numeros_impares as $valor) {
        echo $valor . "\t";
    }
    
    echo "<br /><br />";

    ?>

    <a href="index.php">Volver al Index</a>
    
</body>
</html>