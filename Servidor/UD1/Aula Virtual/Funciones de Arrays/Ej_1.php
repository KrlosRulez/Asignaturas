<?php 

    $array_1=array("Paco", "Roberto", "El Panzas");
    //$array_2=array("Esteban", "Ramón", "El Panzas");
    $array_2=array("Paco", "Roberto", "El Panzas");

    $diferencia=array_diff($array_1, $array_2);

    if (count($diferencia) == 0) {
        echo "Los arrays son iguales";
    } else {
        echo "Los arrays son diferentes";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>