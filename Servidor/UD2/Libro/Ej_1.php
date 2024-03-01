<?php

    $fecha_actual = strtotime('now');

    $fin_practicas = strtotime('+4 months');

    $actual_formato = date("d-m-Y", $fecha_actual);

    $fin_formato = date("d-m-Y", $fin_practicas);

    echo "Hoy: " . $actual_formato . "<br />";
    echo "Dentro de 4 meses: " . $fin_formato . "<br />";
    echo "<br />";

    while ($fecha_actual < $fin_practicas) {

        $actual_formato = date("d-m-Y", strtotime($actual_formato . '+2 weeks'));

        $fecha_actual = strtotime($actual_formato);

        if ($fecha_actual < $fin_practicas) {

            echo "Dia de práctica: " . $actual_formato . "<br />";
        
        }

    }

?>