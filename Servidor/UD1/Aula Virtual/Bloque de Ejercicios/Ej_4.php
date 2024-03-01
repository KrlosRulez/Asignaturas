<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>

    <?php
    
    $suma = 0;

    for ($i = 1; $i <= 100; $i++) {

        if ($i % 5 == 0) {

        echo $i . "<br />";
        $suma += $i;

        }

    } 

    echo "Suma: " . $suma;

    ?>

</body>
</html>