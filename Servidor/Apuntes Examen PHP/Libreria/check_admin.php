<?php 

session_start();

if (!(isset($_SESSION["admin"]))) {

    header("location:menu.php?aviso");

}

?>