<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    
    <?php 
    
    $nota = rand(1, 10);

    echo "Nota: " . $nota . "<br />";

    // SWITCH

    switch($nota) {
        case 1:
        case 2:
        case 3:
        case 4:
            echo "Suspendido";
            break;
        case 5:
            echo "Suficiente";
            break;
        case 6:
            echo "Bien";
            break;
        case 7:
        case 8:
            echo "Notable";
            break;
        case 9:
        case 10:
            echo "Sobresaliente";
            break;        
    }

    // IF

    // if ($nota < 5) {
    //     echo "Suspendido";
    // } else if ($nota >= 5 && $nota < 6) {
    //     echo "Suficiente";
    // } else if ($nota >= 6 && $nota < 7) {
    //     echo "Bien";
    // } else if ($nota >= 7 && $nota < 9) {
    //     echo "Notable";
    // } else if ($nota >= 9) {
    //     echo "Sobresaliente";
    // }

    ?>

</body>
</html>