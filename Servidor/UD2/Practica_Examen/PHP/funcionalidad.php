<?php 

    // Eliminar Imagen

    if (isset($_GET['eliminar_imagen'])) {

        eliminar_imagen($_GET['album'], $_GET['imagen']);

    }

    function eliminar_imagen ($album, $imagen) {

        unlink("albumes/" . $album ."/". $imagen);
        unlink("albumes/" . $album ."/thumbs/". $imagen);

        header("location:index.php?album=$album");

    }

    // Renombrar Imagen

    if (isset($_GET['renombrar_imagen'])) {

        renombrar_imagen($_GET['album'], $_GET['imagen'], $_GET['nuevo_nombre']);

    }

    function renombrar_imagen ($album, $imagen, $nuevo_nombre) {

        rename(
            "albumes/$album/$imagen",
            "albumes/$album/$nuevo_nombre"
        );

        rename(
            "albumes/$album/thumbs/$imagen",
            "albumes/$album/thumbs/$nuevo_nombre"
        );

        header("location:index.php?album=$album");

    }

    // Mover Imagen

    if (isset($_POST['mover_imagen'])) {

        mover_imagen($_POST['album'], $_POST['imagen'], $_POST['nuevo_album']);

    }

    function mover_imagen ($album, $imagen, $nuevo_album) {

        echo "<script>mover_imagen_js('$album', '$imagen', '$nuevo_album');</script>";

    }

    if (isset($_GET['mover_imagen_ok'])) {

        mover_imagen_ok($_GET['album'], $_GET['imagen'], $_GET['nuevo_album']);

    }

    function mover_imagen_ok ($album, $imagen, $nuevo_album) {

        rename(
            "albumes/$album/$imagen",
            "albumes/$nuevo_album/$imagen"
        );

        rename(
            "albumes/$album/thumbs/$imagen",
            "albumes/$nuevo_album/thumbs/$imagen"
        );

        header("location:index.php?album=$album");

    }

    // Subir imagen al álbum

    if (isset($_POST['subir_imagen'])) {

        subir_imagen($_GET['album'], $_FILES["foto"]["name"]);

    }

    function subir_imagen ($album, $imagen) {

        move_uploaded_file($_FILES["foto"]["tmp_name"],
        "albumes/$album/" . $imagen);

        header("location:index.php?album=$album");

    }

    // Cambiar nombre del álbum

    if (isset($_GET['cambiar_album'])) {

        cambiar_album($_GET['album'], $_GET['nuevo_nombre']);

    }

    function cambiar_album ($album, $nuevo_nombre) {

        rename(
            "albumes/$album",
            "albumes/$nuevo_nombre"
        );

        header("location:index.php?album=$nuevo_nombre");

    }

    // Eliminar álbum

    if (isset($_GET['eliminar_album'])) {

        $album = $_GET['album'];

        $scandir_album = scandir("albumes/$album");

        for ($x = 0; $x < count($scandir_album); $x++) {

            unlink("albumes/$album/" . $scandir_album[$x]);

        }

        rmdir("albumes/$album");

        header("location:index.php");

    }

    // Crear álbum

    if (isset($_POST['crear_album'])) {
        
        crear_album($_POST['nombre']);

    }

    function crear_album ($nombre_album) {

        mkdir("albumes/$nombre_album");

        header("location:index.php?album=$nombre_album");

    }

    // Ver estructura

    if (isset($_GET['estructura'])) {

        $scandir_uno = scandir('albumes');

        for ($x = 2; $x < count($scandir_uno); $x++) {

            echo $scandir_uno[$x] . "<br />";

            if (is_dir("albumes/" . $scandir_uno[$x])) {

                $scandir_dos = scandir("albumes/" . $scandir_uno[$x]);

                for ($y = 2; $y < count($scandir_dos); $y++) {

                    echo "|------" . $scandir_dos[$y] . "<br />";

                }

            }

        }

        echo "<br /><br />";

    }

?>