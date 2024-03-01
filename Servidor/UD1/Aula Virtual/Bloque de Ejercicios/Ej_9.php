<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Cantidad de Entradas
        <select name="cantidad">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select><br />
        <input type="submit" name="Comprar"><br /><br />
    </form>

    <?php 
    
    if (isset($_POST['Comprar'])) {

        $precio_entrada = 10;

        $cantidad = $_POST['cantidad'];

        $descuento = 0;

        if ($cantidad >= 5 && $cantidad < 8) {
            $descuento = 10;
        } else if ($cantidad >= 8 && $cantidad < 10) {
            $descuento = 15;
        } else if ($cantidad == 10) {
            $descuento = 20;
        }

        $precio_sin_descuento = ($cantidad * $precio_entrada);
        $precio_con_descuento = ($precio_sin_descuento - (($precio_sin_descuento * $descuento) / 100));

        echo "Precio sin descuento: " . $precio_sin_descuento. "<br />";
        echo "Precio Final: " . $precio_con_descuento;

    }

    ?>

</body>
</html>