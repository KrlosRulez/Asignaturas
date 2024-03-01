<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MI PÁGINA WEB</title>
</head>

<body>

    <?php

    if (isset($_GET['aviso'])) {
        ?>

        <h4>No tienes permisos para acceder a esta página</h4>

        <?php
    }

    if (isset($_GET['no_session'])) {

        session_start();

        if (isset($_SESSION['admin'])) {

            echo "<h4>Hasta pronto, " . $_SESSION['admin'] . "</h4>";

            session_destroy();
            unset($_SESSION["admin"]);

        }

    }

    if (isset($_POST['enviar'])) {

        $user_name = $_POST['user_name'];

        $user_pass = $_POST['user_pass'];

        if ($user_name == "" || $user_pass == "") {

            echo "<h4>No puedes dejar campos sin rellenar</h4>";

        } else {

            if ($user_name == "admin" && $user_pass == "1234") {

                session_start();

                $_SESSION["admin"] = $user_name;

                header("location:admin/index.php");

            } else {

                echo "<h4>Error de credenciales</h4>";

            }

        }

    }

    ?>

    <form method="post" action="<?php echo ($_SERVER['PHP_SELF']); ?>">
        <input type="text" name="user_name" placeholder="Usuario">
        <input type="password" name="user_pass" placeholder="Contraseña">
        <input type="submit" name="enviar">
    </form>
</body>

</html>