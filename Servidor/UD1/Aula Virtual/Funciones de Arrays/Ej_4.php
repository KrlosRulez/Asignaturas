<?php 

    $array_random=array();

    $usado=false;

    for ($i=0; $i<10; $i++) {

        $random=rand(1, 10);

        for ($x=0; $x<(count($array_random)); $x++) {

            if ($array_random[$x]==$random) {
                $usado=true;
            }

        }

        if ($usado==false) {
            array_push($array_random, $random);
        } else {
            $i--;
            $usado=false;
        }

    }

    for ($y=0; $y<(count($array_random)); $y++) {
        echo $array_random[$y] . "\t";
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