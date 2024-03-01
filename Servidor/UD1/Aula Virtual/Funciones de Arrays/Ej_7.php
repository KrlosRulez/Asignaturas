<?php 

    $array_españa=array(1 => "Betis", 2 => "Pedro Sánchez", 3 => "Tortilla", 4 => "Siesta", 5 => "Playa");

    for ($i=0; $i<(count($array_españa) - 1); $i++) {
        echo $i . " => " . current($array_españa) . "<br />";
        next($array_españa);
    }

    echo "Último valor => " . current($array_españa) . "<br />";

    for ($i=(count($array_españa) - 2); $i>=0; $i--) {
        prev($array_españa);
        echo $i . " => " . current($array_españa) . "<br />";
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