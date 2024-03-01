<?php 

    if (isset($_GET["aviso"])) {
        
        echo '<p style="margin: 20px;">No tienes permisos para acceder a este sitio</p>';

    }

    if (isset($_GET["tiempo"])) {
        
        echo '<p style="margin: 20px;">Sesión cerrada por inactividad</p>';

    }

    if (isset($_GET['no_session'])) {

        session_start();

        if (isset($_SESSION["usuario"])) {

            echo '<p style="margin: 20px;">Hasta pronto, ' . $_SESSION["usuario"] . '</p>';

            session_destroy();
            unset($_SESSION["usuario"]);

        } else if (isset($_SESSION["admin"])) {

            echo '<p style="margin: 20px;">Hasta pronto, ' . $_SESSION["admin"] . '</p>';

            session_destroy();
            unset($_SESSION["admin"]);

        }


    }

    if (isset($_POST['enviar'])) {

        $usuario = $_POST['usuario'];

        $password = $_POST['password'];

        if ($usuario == "user" && $password == "1234") {

            session_start();

            $_SESSION["usuario"] = $usuario;

            setcookie("usuario", $usuario, time() + 60);

            setcookie("password", $password, time() + 60);

            header("location:privada.php");

        } else if ($usuario == "admin" && $password == "1234") {

            session_start();

            $_SESSION["admin"] = $usuario;

            setcookie("usuario", $usuario, time() + 60);

            setcookie("password", $password, time() + 60);    
        
            header("location:privada.php");

        } else if ($usuario == "tiempo" && $password == "1234") {

            session_start();

            $_SESSION["tiempo"] = time();

            setcookie("usuario", $usuario, time() + 60);

            setcookie("password", $password, time() + 60);    
        
            header("location:privada.php");

        } else if ($usuario == "" || $password == "") {

            echo '<p style="margin: 20px;">No puede haber campos vacíos</p>';

        } else {

            echo '<p style="margin: 20px;">Usuario o Contraseña Incorrectos</p>';

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/styles.css">
    <style>
        form {
            margin: 20px;
        }
    </style>
</head>
<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="usuario" value="<?php echo $_COOKIE["usuario"]; ?>" placeholder="Usuario"><br />
        <input type="password" name="password" value="<?php echo $_COOKIE["password"]; ?>" placeholder="Contraseña">
        <input type="submit" name="enviar">
    </form>

</body>
</html>