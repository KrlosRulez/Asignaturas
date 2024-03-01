<html>
    <head>

    </head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nombre: <input type="text" name="nombre">
        <input type="submit">
        </form>
        <?php 
        
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            echo $nombre;
        }
        
        ?>
    </body>
</html>