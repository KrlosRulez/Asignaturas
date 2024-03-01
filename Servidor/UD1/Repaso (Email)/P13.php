<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 13</title>
</head>
<body>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nombre <input type="text" name="nombre"><br /><br />
        <select name="ganancias">
            <option value="1">1-1000</option>
            <option value="2">1001-3000</option>
            <option value="3">+3000</option>
        </select><br /><br />
        <input type="submit" name="Enviar"><br /><br />
    </form>

    <?php 
    
    if (isset($_POST['Enviar'])) {

        $ganacias = $_POST['ganancias'];

        // echo $ganacias . "<br />";

        if ($ganacias == "3") {
            echo "Debes pagar impuestos";
        } else {
            echo "#Andorra4Life";
        }

    }

    ?>

</body>
</html>