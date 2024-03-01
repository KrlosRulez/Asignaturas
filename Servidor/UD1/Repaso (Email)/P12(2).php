<?php 
    
    if (isset($_POST['Enviar'])) {

        $nombre = $_POST['nombre'];

        $deportes_elegidos = $_POST['cbox'];

        foreach ($deportes_elegidos as $valor) {
            echo "$nombre le va al $valor" . "<br />";
        }

    }

?>