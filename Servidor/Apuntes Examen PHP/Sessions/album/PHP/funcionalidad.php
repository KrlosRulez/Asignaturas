<?php

// Al enviar el formulario, guardar la foto original y la miniatura

if (isset($_POST['enviar'])) {

    enviar($_GET['album'], $_FILES["foto"]["name"]);

}

// Ver estructura 

if (isset($_GET['estructura'])) {

    ver_estructura();

}

// Cambiar nombre del álbum

if (isset($_GET['cambiar_album'])) {

    cambiar_album($_GET['album'], $_GET['nuevo_nombre']);

}

// Eliminar álbum

if (isset($_GET['eliminar_album'])) {

    eliminar_album($_GET['album']);

}

// Eliminar foto y redirigir

if (isset($_GET['eliminar'])) {

    eliminar_foto($_GET['album'], $_GET['img']);

}

// Mover imagen y miniatura a nuevo álbum

if (isset($_POST["mover_js"])) {

    mover_js($_POST['album'], $_POST['nuevo_album'], $_POST['img']);

}

if (isset($_GET['mover'])) {

    mover($_GET['album'], $_GET['nuevo_album'], $_GET['img']);

}

// Renombrar imagen

if (isset($_GET['renombrar'])) {

    renombrar($_GET['album'], $_GET['img'], $_GET['nuevo_nombre']);

}

// Crear nuevo álbum

if (isset($_POST['crear'])) {

    crear($_POST["nombre"]);

}

// FUNCIONES #######################################################

// Al enviar el formulario, guardar la foto original y la miniatura

function enviar($album, $nombre_foto) {

    move_uploaded_file($_FILES["foto"]["tmp_name"],
    "albumes/$album/" . $nombre_foto);
    
    $resizeObj = new resize('albumes/' . $album . '/' . $nombre_foto);
    
    $resizeObj -> resizeImage(150, 100, 'crop');
    
    $resizeObj -> saveImage('albumes/' . $album . '/thumbs/' . $nombre_foto, 100);
    
    header("location:privada.php?album=$album");

}

// Ver estructura 

function ver_estructura() {

    echo "<br />";

    echo "<h3>&nbsp;Estructura de los álbumes</h3>";

    $scan_albumes = scandir("albumes");

    for ($i = 2; $i < count($scan_albumes); $i++) {

        echo "&nbsp;&nbsp;&nbsp;" . $scan_albumes[$i] . "<br />";

        if (is_dir("albumes/" . $scan_albumes[$i])) {

            $scan_interno = scandir("albumes/" . $scan_albumes[$i]);

            for ($x = 2; $x < count($scan_interno); $x++) {

                if (is_file("albumes/" . $scan_albumes[$i] . "/" . $scan_interno[$x])) {

                    echo "&nbsp;&nbsp;&nbsp;" . "|------" . $scan_interno[$x] . "<br />";

                }

                if (is_dir("albumes/" . $scan_albumes[$i] . "/" . $scan_interno[$x])) {

                    echo "&nbsp;&nbsp;&nbsp;" . "|------" . $scan_interno[$x] . " (dir)" . "<br />";

                    $scan_thumbs = scandir("albumes/" . $scan_albumes[$i] . "/" . $scan_interno[$x]);

                    for ($y = 2; $y < count($scan_thumbs); $y++) {

                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                |------" . $scan_thumbs[$y] . "<br />";

                    }

                }

            }

        }

    }

    echo "<br /><br />";

}

// Cambiar nombre del álbum

function cambiar_album($nombre, $nuevo_nombre) {

    rename(
        "albumes/$nombre",
        "albumes/$nuevo_nombre"
    );

    header("location:privada.php?album=$nuevo_nombre");

}

// Eliminar álbum

function eliminar_album($album_borrar) {

    $num_fotos = scandir("albumes/$album_borrar");

    for ($i = 0; $i < count($num_fotos); $i++) {

        if (is_file("albumes/$album_borrar/" . $num_fotos[$i])) {

            unlink("albumes/$album_borrar/" . $num_fotos[$i]);

        } else if (is_dir("albumes/$album_borrar/" . $num_fotos[$i])) {

            $scandir_interno = scandir("albumes/$album_borrar/" . $num_fotos[$i]);

            for ($x = 0; $x < count($scandir_interno); $x++) {

                unlink("albumes/$album_borrar/" . $num_fotos[$i] . "/" . $scandir_interno[$x]);

            }

            rmdir("albumes/$album_borrar/" . $num_fotos[$i]);

        }

    }

    if (rmdir("albumes/" . $album_borrar) == false) {

        echo '<script>aviso_eliminar();</script>';

    } else {

        header("location:privada.php");

    }

}

// Eliminar foto y redirigir

function eliminar_foto($album, $imagen) {

    unlink('albumes/' . $album . "/" . $imagen);
    unlink('albumes/' . $album . "/thumbs/" . $imagen);

    header("location:privada.php?album=$album");

}

// Mover imagen y miniatura a nuevo álbum

function mover_js($album_js, $nuevo_album_js, $imagen_js) {

    echo "<script>mover_imagen('" . $nuevo_album_js . "', '" . $imagen_js . "', '" . $album_js . "');</script>";

}

function mover($album, $nuevo_album, $imagen) {

    rename(
        "albumes/$album/" . $imagen,
        "albumes/$nuevo_album/" . $imagen
    );

    rename(
        "albumes/$album/thumbs/" . $imagen,
        "albumes/$nuevo_album/thumbs/" . $imagen
    );

    header("location:privada.php?album=$album");

}

// Renombrar imagen

function renombrar($album, $imagen, $nuevo_nombre) {

    rename(
        "albumes/$album/" . $imagen,
        "albumes/$album/" . $nuevo_nombre
    );

    rename(
        "albumes/$album/thumbs/" . $imagen,
        "albumes/$album/thumbs/" . $nuevo_nombre
    );

    header("location:privada.php?album=$album");

}

// Crear nuevo álbum

function crear($nombre) {

    mkdir("albumes/" . $nombre);
    mkdir("albumes/" . $nombre . "/thumbs");

    header("location:privada.php?album=" . $nombre);

}

?>