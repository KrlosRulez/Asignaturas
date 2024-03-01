<?php 

    $fichero = fopen ("visitas.txt", "rw");

    fwrite($fichero, $visitas);

    echo fgets($fichero);

    fclose ($fichero);

    

?>