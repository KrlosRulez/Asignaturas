<?php 

    $array_betis=array();

    $posiciones=8;

    for ($i; $i<$posiciones; $i++) {
        array_push($array_betis, rand(1, 9));
    }

    $suma=array_sum($array_betis);

    echo $suma;

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