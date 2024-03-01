<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 19</title>
</head>
<body>

    <?php 

    if (isset($_POST['Entrar'])) {  // Si ya se ha pulsado el botón de enviar
        $contador = $_POST['contador']; // Contador es igual a la variable guardada en el campo oculto del formulario
    } else {    // Si aún no se ha pulsado el botón
        $contador = 3;  // El número de intentos es 3
    }

    $mostrar = true;    // Variable que se usará para mostrar u ocultar el formulario

    $contraseña_real = "1234";  // Contraseña Correcta
    
    if (isset($_POST['Entrar'])) {  // Si se ha pulsado el botón

        $nombre = $_POST['nombre']; // Guardar variables del formulario
        $pass = $_POST['pass']; // Guardar variables del formulario

        if ($pass == $contraseña_real) {    // Si es la contraseña correcta

    ?>

            <h1>Bienvenido, <?php echo $nombre; ?></h1> <!-- Se muestra un mensaje de bienvenida -->

    <?php

            $mostrar = false;   // Se cambia el booleano para que ya no aparezca el formulario

        } else {    // Si no es la contraseña correcta

            $contador--;    // Se resta un intento

            if ($contador > 0) {    // Si aún quedan intentos

                echo "Contraseña Incorrecta, " . $contador . " intentos restantes" . "<br /><br />";    // Te dice cuantos te quedan

            } else {    // Si no quedan intentos

    ?>

                <h1>Acceso Denegado</h1>    <!-- Se muestra un mensaje de acceso denegado -->
        
    <?php

            $mostrar = false;   // Se cambia el booleano para que ya no aparezca el formulario

            }

        }

    } 
    
    ?>

    <?php if ($mostrar == true) { ?>    <!-- Si el booleano es true aparece el formulario, si es false no -->
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nombre <input type="text" name="nombre"><br /><br />
        Contraseña <input type="password" name="pass"><br /><br />
        <input type="submit" name="Entrar"><br /><br />
        <input type="hidden" name="contador" value="<?php echo $contador; ?>">  <!-- Se guarda el valor actual de los intentos -->
    </form>

    <?php } ?>

</body>
</html>