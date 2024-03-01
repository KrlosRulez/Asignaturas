<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nombre <input type="text" name="nombre"><br /><br />
        Contraseña <input type="password" name="pass"><br /><br />
        <input type="submit" name="Enviar"><br /><br />
    <form>

    <?php
    
    $real_user = "Carlos";
    $real_password = "1234";

    if (isset($_POST['Enviar'])) {

        $user = $_POST['nombre'];
        $password = $_POST['pass'];

        if ($user == "" || $password == "") {
            echo "No puede haber campos vacíos";
        } else {

            if ($user == $real_user && $password == $real_password) {
                header("location:Ej_2_Bienvenida.php?nombre=$user");
            } else if ($user != $real_user) {
                echo "Usuario Incorrecto";
            } else {
                echo "Contraseña Incorrecta";
            } 

        }

    }

    ?>

</body>
</html>