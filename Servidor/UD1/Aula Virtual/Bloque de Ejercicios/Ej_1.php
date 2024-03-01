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

    function random($nota) {

        if ($nota < 5) {
            echo "Suspendido";
        } else if ($nota >= 5 && $nota < 6) {
            echo "Suficiente";
        } else if ($nota >= 6 && $nota < 7) {
            echo "Bien";
        } else if ($nota >= 7 && $nota < 9) {
            echo "Notable";
        } else if ($nota >= 9) {
            echo "Sobresaliente";
        }

    }

    random($nota);

    ?>

</body>
</html>