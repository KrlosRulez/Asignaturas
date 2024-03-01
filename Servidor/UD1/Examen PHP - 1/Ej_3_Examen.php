<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>

    <?php 
    
    $nombre = "Carlos";
    $apellido_1 = "Nieto";
    $apellido_2 = "Fresneda";
    $curso = "segundo";
    $ciclo = "DAW";
    $centro = "Solvam";

    if (isset($_GET['enlace'])) {

        $enlace = $_GET['enlace'];

        switch ($enlace) {
            case 1:
                echo "Bienvenido, " . $nombre . "<br />";
                break;
            case 2:
                echo "Mi primer apellido es " . $apellido_1 . " y mi segundo apellido es " . $apellido_2 . "<br />";
                break;
            case 3:
                echo "Estudio " . $curso . " de " . $ciclo . " en " . $centro . "<br />";
                break;
            default:
                echo "Error 404" . "<br />";
                break;
        }

    ?>

        <a href="Ej_3_Examen.php">Volver</a>

    <?php

    } else {

    ?>

        <a href="Ej_3_Examen.php?enlace=1">Mensaje de Bienvenida</a><br/><br/>
        <a href="Ej_3_Examen.php?enlace=2">Mis Apellidos</a><br/><br/>
        <a href="Ej_3_Examen.php?enlace=3">Dónde Estudio</a><br/><br/>

    <?php

    } 

    ?>

</body>
</html>