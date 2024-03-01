<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extra 2</title>
</head>
<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        Número de jugadores <input type="number" name="jugadores"><br />
        Valor a conseguir <input type="number" name="valor"><br />
        <input type="submit" name="Enviar"><br /><br />
    </form>

    <?php 
    
    if (isset($_POST['Enviar'])) {

        $num_jugadores = $_POST['jugadores'];
        $valor_objetivo = $_POST['valor'];

        echo "Número de jugadores: " . $num_jugadores . "<br />";
        echo "Valor a conseguir: " . $valor_objetivo . "<br />";

        $valor_dados = array();

        for ($i = 1; $i <= $num_jugadores; $i++) {

            $num_random = rand(1, 6);

            array_push($valor_dados, $num_random);

        }

        foreach ($valor_dados as $index => $valor) {

            echo "Tirada del jugador " . ($index + 1) . ": $valor" . "<br />";

        }

        if ((array_sum($valor_dados)) >= ($valor_objetivo)) {
            echo "CONSEGUIDO" . "<br />";
        } else {
            echo "NO CONSEGUIDO, LARGO DE AQUÍ" . "<br />";
        }

            echo "FIN DEL JUEGO";

    }

    ?>

</body>
</html>