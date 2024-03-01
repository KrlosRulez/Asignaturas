<?php 

session_start();

if (!(isset($_SESSION["admin"])) && !(isset($_SESSION["super"])) && !(isset($_SESSION["user"]))) {

    header("location:index.php?aviso");

}

?>