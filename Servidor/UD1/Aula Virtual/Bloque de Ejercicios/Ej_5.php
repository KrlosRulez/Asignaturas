<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Número <input type="number" name="num">
        <input type="submit" name="enviar">
    </form>

    <?php 
    
    if (isset($_POST['num'])) {

        $num = $_POST['num'];

        if ($num % 2 == 0) {
            echo "$num es número par";
        } else {
            echo "$num es número impar";
        }

    }

    ?>

</body>
</html>