<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body>

    <?php 
    
    $array_index = array(2, 4, 5, 6, 7);

    for ($i = 0; $i < (count($array_index) - 1); $i++) {

        echo "Valor del puntero: " . $array_index[$i] . "<br />";

    }

    echo "Valor del último elemento: " . $array_index[(count($array_index) - 1)] . "<br />";


    for ($i = (count($array_index) - 2); $i >= 0; $i--) {

        echo "Valor del puntero: " . $array_index[$i] . "<br />";

    }

    ?>

</body>
</html>