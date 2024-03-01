<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalam&family=Trade+Winds&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="css/index.css" />
    <script src="js/funciones.js"></script>
</head>

    <?php require("CRUD_Usuarios.php"); ?>

<body>

    <?php 

    if (isset($_GET['aviso'])) {

        echo '<p class="mensaje">No tienes privilegios para acceder a esta página</p>';

    }

    if (isset($_GET['no_session'])) {

        session_start();

        if (isset($_SESSION["admin"])) {

            echo '<p class="mensaje" style="margin: 20px;">Hasta pronto, ' . $_SESSION["admin"] . '</p>';

            session_destroy();
            unset($_SESSION["admin"]);

        } else if (isset($_SESSION["super"])) {

            echo '<p class="mensaje" style="margin: 20px;">Hasta pronto, ' . $_SESSION["super"] . '</p>';

            session_destroy();
            unset($_SESSION["super"]);

        } else if (isset($_SESSION["user"])) {

            echo '<p class="mensaje" style="margin: 20px;">Hasta pronto, ' . $_SESSION["user"] . '</p>';

            session_destroy();
            unset($_SESSION["user"]);

        }

    }

    $dataBase = new Usuarios();
    
    if (isset($_POST['enviar'])) {

        $nombre = $_POST['nombre'];

        $password = md5($_POST['password']);  // Cifrar contraseña para comparar

        $users = $dataBase->showUsuarios();

        $correcto = false;

        foreach ($users as $user) {

            if ($nombre == $user['usuario'] && $password == $user['password']) {

                $correcto = true;

                $rol = $user['rol'];

                session_start();

                switch ($rol) {
                    case 1:
                        $_SESSION['admin'] = $nombre;
                        header("location:menu.php");
                        break;
                    case 2:
                        $_SESSION['super'] = $nombre;
                        header("location:menu.php");
                        break;
                    case 3:
                        $_SESSION['user'] = $nombre;
                        header("location:menu.php");
                        break;
                    default:
                        echo '<p class="mensaje">Este usuario no tiene un rol válido</p>';
                        break;
                }

                break;

            }

        }

        if ($correcto == false) {

            echo '<p class="mensaje">Usuario o Contraseña Incorrectos.</p>';

        }

    }

    ?>

    <div class="contenedor">

        <h1>Iniciar Sesión</h1>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <span>Nombre de usuario: </span><input type="text" name="nombre"><br /><br />
            <span>Contraseña: </span><input id="pass" type="password" name="password"><br /><br />
            <input type="submit" name="enviar" value="Iniciar Sesión">
        </form>

    </div>

</body>
</html>