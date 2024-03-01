<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extra 1</title>
</head>
<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        Número de jugadores <input type="text" name="jugadores"><br />
        <input type="submit" name="Enviar"><br /><br />
    </form>

    <?php 
    
    if (isset($_POST['Enviar'])) {

        $num_jugadores = $_POST['jugadores'];

        $valor_dados = array();

        for ($i = 1; $i <= $num_jugadores; $i++) {

            $num_random = rand(1, 6);

            array_push($valor_dados, $num_random);

        }

        foreach ($valor_dados as $index => $valor) {

            echo "Tirada del jugador " . ($index + 1) . ": $valor" . "<br />";

        }

    }

    ?>

</body>
</html>