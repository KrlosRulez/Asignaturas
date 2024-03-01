<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 9</title>
</head>

<body>

    <?php

    $numero_random = rand(1, 5);

    switch ($numero_random) {
        case 1:
            echo "uno";
            break;
        case 2:
            echo "dos";
            break;
        case 3:
            echo "tres";
            break;
        case 4:
            echo "cuatro";
            break;
        case 5:
            echo "cinco";
            break;
    }

    ?>

</body>

</html>