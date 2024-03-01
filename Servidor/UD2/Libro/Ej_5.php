<?php 

    $fichero = fopen("fichero_ej5.txt", "rw");

    $txt = "Krlos Rulez \n";
    fwrite($fichero, $txt);

    $txt = "Viva el Betis \n";
    fwrite($fichero, $txt);

    $txt = "Krlos Rulez \n";
    fwrite($fichero, $txt);

    $txt = "Viva el Betis \n";
    fwrite($fichero, $txt);

    while (feof($fichero) == false) {

        echo fgets($fichero) . "<br />";

    }

    echo fgets($fichero);

    fclose ($fichero);

?>