<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
</head>
<body>

    <?php 
    
    $array = array();

    $num_posiciones = 7;

    for ($i = 0; $i < $num_posiciones; $i++) {

        $num_aleatorio = rand(1, 9);

        array_push($array, $num_aleatorio);

    }

    foreach ($array as $x) {

        echo "Posición del Array: " . $x . "<br />";

    }

    echo "Suma de los elementos del array: " . array_sum($array);

    ?>

</body>
</html>