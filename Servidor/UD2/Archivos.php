<?php 

    $fichero = fopen ("nuevo_fichero.txt", "rw");

    $txt = "Krlos Rulez \t";

    fwrite($fichero, $txt);

    $txt = "Viva el Betis \t";

    fwrite($fichero, $txt);

    echo fgets($fichero);

    fclose ($fichero);

?>