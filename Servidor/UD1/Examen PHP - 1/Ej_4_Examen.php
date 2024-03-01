<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    
    <?php 
    
    if (isset($_GET['Tirada'])) {

        $Tirada = $_GET['Tirada'];

        $suma = $_GET['Suma'];

        $Tirada++;

        $numero_random = rand(1, 6);

        $suma += $numero_random;

        echo "Tirada " . $Tirada . "<br />";
        echo "Número " . $numero_random . "<br />";
        echo "Puntos " . $suma . "<br />";

    } else {

        $Tirada = 0;

        $suma = 0;

    } 

    if ($Tirada < 3) {

    ?>

    <a href="Ej_4_Examen.php?Tirada=<?php echo $Tirada; ?>&Suma=<?php echo $suma; ?>">Tirar Dado</a>

    <?php 
        
    } else {

        if ($suma >= 10) {
            echo "Has ganado." . "<br />";
        } else {
            echo "Has perdido." . "<br />";
        }

        echo "Fin de la partida";

    }
        
    ?>

</body>
</html>