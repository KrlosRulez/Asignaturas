<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Número 1 <input type="number" name="num1"><br /><br />
        Número 2 <input type="number" name="num2"><br /><br />
        <input type="submit" name="enviar" value="Comparar"><br /><br />
    </form>

    <?php 
    
    if (isset($_POST['enviar'])) {

        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        if ($num1 == $num2) {
            echo "Los números son iguales";
        } else if ($num1 > $num2) {
            echo "Número mayor: " . $num1;
        } else {
            echo "Número mayor: " . $num2;
        }

    }

    ?>

</body>
</html>