<?php 

    $array_1=array(1=>"Paco", 2=>"Roberto", 3=>"El Panzas");
    //$array_2=array("Esteban", "Ramón", "El Panzas");
    $array_2=array(1=>"Paco", 2=>"Roberto", 4=>"El Panzas");

    $diferencia=array_diff_assoc($array_1, $array_2);

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