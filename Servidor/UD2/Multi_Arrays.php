<?php 

    $moda = array (

        array("camiseta", 22, 50),
        array("pantalons", 15, 00, 23),
        array("gorra", 5, 9),
        array("jaqueta", 17, 95),
        array("jaqueta", 17, 95)

    );

    for ($i = 0; $i < count($moda); $i++) {

        $longitud = count($moda[$i]);

        for ($x = 0; $x < $longitud; $x++) {

            echo $moda[$i][$x] . "\t";

        } 

        echo "<br />";

    }

?>