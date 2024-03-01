<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extra 3</title>
</head>
<body>

    <?php 
    
    $num1 = rand(1, 8);
    $num2 = rand(1, 8);
    $num3 = rand(1, 8);

    echo "Números: " . $num1 . " " . $num2 . " " . $num3 . "<br />";

    if (($num1 == $num2) && ($num2 == $num3)) {
        echo "Los tres números son iguales";
    } else if (($num1 == $num2) || ($num1 == $num3) || ($num2 == $num3)) {
        echo "Hay dos números iguales";
    } else {
        echo "No hay dos números iguales";
    }

    ?>

</body>
</html>