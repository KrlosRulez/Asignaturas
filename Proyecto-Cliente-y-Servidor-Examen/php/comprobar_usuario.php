<?php

session_start();

if (isset($_SESSION["Usuario"])) {

    $sesion_iniciada = true;

} else {

    $sesion_iniciada = false;

}

echo $sesion_iniciada;