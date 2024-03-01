<?php 

    if ($_FILES["foto"]["error"] > 0) {
        echo "Error: " . $_FILES["foto"]["error"] . "<br />";
    } else {
        echo "Nom de la imatge: " . $_FILES["foto"]["name"] . "<br />";
        echo "Tipus de la imatge: " . $_FILES["foto"]["type"] . "<br />";
        echo "Mida de la imatge: " . $_FILES["foto"]["size"] . "<br />";
        echo "Emmagatzemada en: " . $_FILES["foto"]["tmp_name"] . "<br />";
    }

    if (file_exists("upload/" . $_FILES["foto"]["name"])) {

        echo $_FILES["foto"]["name"] . " ja existeix.";

    } else {
        move_uploaded_file($_FILES["foto"]["tmp_name"],
        "upload/" . $_FILES["foto"]["name"]);
        echo "Imatge emmagatzemada en: " . "upload/" . $_FILES["foto"]["name"];
    }

?>