<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5</title>
    <script src="funciones.js"></script>
</head>
<body>

    <h1>Ejercicio 5</h1>
    <h2>Icono Eliminar</h2>

    <?php 
    
    // Llamar a función JS

    if (isset($_GET['eliminar_album'])) {

        $album = $_GET['album'];

        echo "<script>eliminar_album_js('" . $album . "');</script>";

    }

    // Volver de función JS

    if (isset($_GET['eliminar_album_ok'])) {
        
        eliminar_album($_GET['album']);

    }

    // Función para eliminar álbum

    function eliminar_album ($album) {

        $scandir_album = scandir("imagenes/" . $album);

        for ($i = 0; $i < count($scandir_album); $i++) {

            if (is_dir("imagenes/" . $album . "/" . $scandir_album[$i])) {

                $scandir_thumbs = scandir("imagenes/" . $album . "/" . $scandir_album[$i]);

                for ($x = 0; $x < count($scandir_thumbs); $x++) {

                    unlink("imagenes/" . $album . "/" . $scandir_album[$i] . "/" . $scandir_thumbs[$x]);

                    rmdir("imagenes/" . $album . "/" . $scandir_album[$i]);

                }

            }

            unlink("imagenes/" . $album . "/" . $scandir_album[$i]);

        }

        rmdir("imagenes/". $album);

        header("location:index.php");

    }

    ?>

    <?php 
    
    // Mi código

    echo "<ul>"; // Abrir lista

    $scandir_uno = scandir("imagenes");

    for ($i = 2; $i < count($scandir_uno); $i++) {

        echo "<li>";  // Abrir lista

        if (is_dir("imagenes/" . $scandir_uno[$i])) {

            echo "Contenido del álbum: <b>" . $scandir_uno[$i] ."</b>" . "<a href=\"index.php?eliminar_album&album=" . $scandir_uno[$i] . "\"><img src='eliminar.jpg' width=20 height=20/></a>"; // Botón Eliminar

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