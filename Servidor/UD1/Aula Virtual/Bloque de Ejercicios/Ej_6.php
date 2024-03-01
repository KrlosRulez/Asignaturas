<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Número 1 <input type="number" name="num1"><br />
        Número 2 <input type="number" name="num2"><br />
        Número 3 <input type="number" name="num3"><br />
        Número 4 <input type="number" name="num4"><br />
        <input type="submit" name="enviar"><br /><br />
    </form>

    <?php 
    
    if (isset($_POST['enviar'])) {

        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $num3 = $_POST['num3'];
        $num4 = $_POST['num4'];

        echo "Número 1: " . $num1 . "<br />";
        echo "Número 2: " . $num2 . "<br />";
        echo "Número 3: " . $num3 . "<br />";
        echo "Número 4: " . $num4 . "<br /><br />";

        $array_numeros = array($num1, $num2, $num3, $num4);

        $entre_15_y_30 = 0;
        $mayor_de_30 = 0;
        $menor_de_25 = 0;

        foreach ($array_numeros as $valor) {

            if ($valor >= 15 && $valor <= 30) {
                $entre_15_y_30++;
            }

            if ($valor > 30) {
                $mayor_de_30++;
            }

            if ($valor < 25) {
                $menor_de_25++;
            }

        }

        echo "Números entre 15 y 30: " . $entre_15_y_30 . "<br />";
        echo "Números mayores de 30: " . $mayor_de_30 . "<br />";
        echo "Números menores de 25: " . $menor_de_25 . "<br />";

    }

    ?>

</body>
</html>