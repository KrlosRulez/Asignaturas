<?php 

    if (isset($_POST['enviar'])) {

        $usuario = $_POST['usuario'];

        $password = $_POST['password'];

        if ($usuario = "Krlos" && $password == "1234") {

            session_start();

            $_SESSION["usuario"] = $usuario;

            echo $_SESSION["usuario"];

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sesiones</title>
</head>
<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="usuario" placeholder="Usuario"><br />
        <input type="password" name="password" placeholder="Contraseña">
        <input type="submit" name="enviar">
    </form>

</body>
</html>