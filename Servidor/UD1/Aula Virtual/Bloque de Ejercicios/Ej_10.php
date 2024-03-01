<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
</head>
<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Mostrar Fecha y Hora en Formato Español <input type="checkbox" name="cbox[]" value="fecha"><br />
        Mostrar Primos entre 1 y 100 y su suma <input type="checkbox" name="cbox[]" value="primos"><br />
        Mostrar Impares entre 1 y 20 y suma <input type="checkbox" name="cbox[]" value="impares"><br />
        <input type="submit" name="Enviar"><br />
    </form>

    <?php 

    if (isset($_POST['Enviar'])) {

        $cbox_1 = false;
        $cbox_2 = false;
        $cbox_3 = false;

        $check = $_POST['cbox'];

        foreach ($check as $valor) {

            if ($valor == "fecha") {
                $cbox_1 = true;
            }

            if ($valor == "primos") {
                $cbox_2 = true;
            }

            if ($valor == "impares") {
                $cbox_3 = true;
            }

        }

        function funcionBoss($cbox_1, $cbox_2, $cbox_3) {

            function mostrarFechaYhora() {

                $fecha_hoy = date('d/M/y h:m:s'); 
                echo "Fecha y hora Actual: " . $fecha_hoy . "<br /><br />";       
        
            }
        
            function mostrarPrimos() {
        
                $suma = 0;
        
                for ($i = 2; $i <= 100; $i++) {
        
                    $primo = true;
        
                    for ($x = ($i - 1); $x > 1; $x--) {
        
                        if ($i % $x == 0) {
                            $primo = false;
                            break;
                        }
        
                    }
        
                    if ($primo == true) {
                        echo $i . "<br />";
                        $suma += $i;
                    }
        
                }
        
                echo "Suma de primos entre 1 y 100: " . $suma . "<br /><br />";
        
            }
        
            function mostrarImpares() {
        
                $suma = 0;
        
                for ($i = 1; $i <= 20; $i++) {
        
                    if ($i % 2 == 1) {
                        echo $i . "<br />";
                        $suma += $i;
                    }
        
                }
        
                echo "Suma: " . $suma . "<br />";
                
                if ($suma % 2 == 0) {
                    echo "La suma es par";
                } else {
                    echo "La suma es impar";
                }
        
            }

            if ($cbox_1 == true) {
                mostrarFechaYhora();
            }

            if ($cbox_2 == true) {
                mostrarPrimos();
            }

            if ($cbox_3 == true) {
                mostrarImpares();
            }

        }

        funcionBoss($cbox_1, $cbox_2, $cbox_3);
    }
    
    ?>

</body>
</html>