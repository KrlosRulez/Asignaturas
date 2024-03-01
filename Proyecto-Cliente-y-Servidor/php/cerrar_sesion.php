<?php

session_start();

if (isset($_SESSION["Usuario"])) {

    unset($_SESSION["Usuario"]);

} else if (isset($_SESSION["Administrador"])) {

    unset($_SESSION["Administrador"]);

}

session_destroy();

echo "eliminado";