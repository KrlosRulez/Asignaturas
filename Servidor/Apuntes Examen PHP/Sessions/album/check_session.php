<?php 

session_start();

if (!(isset($_SESSION["usuario"])) && 
    !(isset($_SESSION["admin"])) &&
    !(isset($_SESSION["tiempo"]))) {

    header("location:login.php?aviso");

}

?>