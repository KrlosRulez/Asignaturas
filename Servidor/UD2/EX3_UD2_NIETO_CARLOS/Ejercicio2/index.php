<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>
<body>

    <h1>Ejercicio 2</h1>
    <h2>Mostrar contenido diractorio "imagenes"</h2>

    <?php 
    
    // Mi código

    echo "<ul>"; // Abrir lista

    $scandir_uno = scandir("imagenes");

    for ($i = 2; $i < count($scandir_uno); $i++) {

        echo "<li>";  // Abrir lista

        if (is_dir("imagenes/" . $scandir_uno[$i])) {

            echo "Contenido del álbum: <b>" . $scandir_uno[$i] ."</b>";

            echo "<ul>"; // Abrir lista

            $scandir_dos = scandir("imagenes/" . $scandir_uno[$i]);

            for ($x = 2; $x < count($scandir_dos); $x++) {

                echo "<li>"; // Abrir lista

                if (is_dir("imagenes/" . $scandir_uno[$i] . "/" . $scandir_dos[$x])) {

                    echo "Contenido de <b>" . $scandir_dos[$x] . "</b>";

                    echo "<ul>"; // Abrir lista

                    $scandir_tres = scandir("imagenes/" . $scandir_uno[$i] . "/" . $scandir_dos[$x]);

                    for ($y = 2; $y < count($scandir_tres); $y++) {

                        echo "<li>";

                        echo $scandir_tres[$y];

                        echo "</li>";
                        
                    }

                    echo "</ul>"; // Cerrar lista

                } else {

                    echo $scandir_dos[$x];

                }

                echo "</li>";  // Cerrar lista

            }

            echo "</ul>"; // Cerrar lista

        } else {

            echo $scandir_uno[$i];

        }

        echo "</li>";  // Cerrar lista

        echo "<br />";

    }

    echo "</ul>";  // Cerrar lista

    ?>
    
</body>
</html>