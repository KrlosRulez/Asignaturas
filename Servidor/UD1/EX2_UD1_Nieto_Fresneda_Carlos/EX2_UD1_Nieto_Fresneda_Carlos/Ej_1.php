<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>

    <h1>Ejercicio 1</h1>

    <?php 
    
    $array_meses = array(1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 
    5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 
    10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre");

    $num_random = rand(1, 12);

    echo "Número Random: $num_random" . "<br />";

    foreach ($array_meses as $index => $valor) {

        if ($num_random == $index) {
            echo "Mes: " . $valor;
        }

    }

    echo "<br /><br />";

    ?>

    <a href="index.php">Volver al Index</a>
    
</body>
</html>