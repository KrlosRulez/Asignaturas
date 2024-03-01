<?php 

    if (isset($_POST['renombrar'])) {

        $album = $_GET['album'];

        $imagen = $_POST['imagen'];

        $nuevo_nombre = $_POST['nuevo_nombre'];

        echo 
        "<script>
            renombrar_js('" . $album . "', '" . $imagen . "', '" . $nuevo_nombre . "');
        </script>";

    }

    if (isset($_GET['renombrar_ok'])) {

        renombrar_img($_GET['album'], $_GET['imagen'], $_GET['nuevo_nombre']);

    }

    function renombrar_img ($album, $imagen, $nuevo_nombre) {

        rename(
            "img/" . $album . "/" . $imagen,
            "img/" . $album . "/" . $nuevo_nombre
        );

        rename(
            "img/" . $album . "/thumbs/" . $imagen,
            "img/" . $album . "/thumbs/" . $nuevo_nombre
        );

        header("location:index.php?album=$album");

    }

?>