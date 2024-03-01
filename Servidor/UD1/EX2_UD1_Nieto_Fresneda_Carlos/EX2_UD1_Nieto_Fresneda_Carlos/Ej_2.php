<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>

    <h1>Ejercicio 2</h1>

    <?php 
    
    $contador = 0;

    $suma_multiplicaciones = 0;

    $suma_sumas = 0;

    $suma_total = 0;

    while ($contador <= 24) {

        if ($contador < 10) {

            echo $contador . " * 3 = " . ($contador*3) . "<br />";

            $suma_multiplicaciones += ($contador*3);

        } else {

            $suma = 0;

            for ($i = $contador; $i > 0; $i--) {

                $suma += $i;

            }

            echo "Número $contador y la suma de los anteriores es $suma" . "<br />";

            $suma_sumas += $suma;

        }

        $contador += 2;

    }

    $suma_total = ($suma_multiplicaciones + $suma_sumas);

    echo "Resultado de las multiplicaciones es $suma_multiplicaciones" . "<br />";
    echo "Resultado de las sumas es $suma_sumas" . "<br />";
    echo "Resultado de todos los cálculos es $suma_total" . "<br />";

    echo "<br /><br />";

    ?>

    <a href="index.php">Volver al Index</a>
    
</body>
</html>