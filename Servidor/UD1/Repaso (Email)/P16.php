<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 16</title>
</head>
<body>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nombre <input type="text" name="nombre"><br /><br />
        Dirección <input type="text" name="direccion"><br /><br />
        Jamón y Queso <input type="checkbox" name="cbox[]" value="Jamón_y_Queso"><br /><br />
        Cantidad <input type="number" name="cantidad_Jamón_y_Queso"><br /><br />
        Napolitana <input type="checkbox" name="cbox[]" value="Napolitana"><br /><br />
        Cantidad <input type="number" name="cantidad_Napolitana"><br /><br />
        Mozarella <input type="checkbox" name="cbox[]" value="Mozarella"><br /><br />
        Cantidad <input type="number" name="cantidad_Mozarella"><br /><br />
        <input type="submit" name="Enviar"><br /><br />
    </form>

    <?php 
    
    if (isset($_POST['Enviar'])) {

        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];

        $sabores_elegidos = $_POST['cbox'];

        foreach ($sabores_elegidos as $sabor) {

            $cantidad_sabor = "cantidad_" . $sabor;
            $cantidad = $_POST[$cantidad_sabor];

            echo "Sabor Elegido: " . $sabor . " - Cantidad: " . $cantidad . "<br />";
        }

    }
    
    ?>

</body>
</html>