<?php

    if ((isset($_GET['nombre'])) && (isset($_GET['edad']))) {
        echo "Debes escribir un nombre y una edad";
    } else if (isset($_GET['nombre'])) {
        echo "Debes escribir un nombre";
    } else if (isset($_GET['edad'])) {
        echo "Debes escribir una edad";
    }

?>