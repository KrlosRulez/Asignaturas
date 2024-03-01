<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Número 1 <input type="number" name="num1"><br />
        Número 2 <input type="number" name="num2"><br />
        Operación
        <select name="operador">
            <option value="sumar">sumar</option>
            <option value="restar">restar</option>
            <option value="multiplicar">multiplicar</option>
            <option value="dividir">dividir</option>
        </select><br />
        <input type="submit" name="Enviar">
    </form>

    <?php 
    
    if (isset($_POST['Enviar'])) {

        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        $operador = $_POST['operador'];
        
        function realizarOperacion($num1, $num2, $operador) {

            switch ($operador) {
                case "sumar":
                    echo "La suma de " . $num1 . " + " . $num2 . " = " . ($num1+$num2);
                    break;
                case "restar":
                    echo "La resta de " . $num1 . " - " . $num2 . " = " . ($num1-$num2);
                    break;
                case "multiplicar":
                    echo "La multiplicación de " . $num1 . " * " . $num2 . " = " . ($num1*$num2);
                    break;
                case "dividir":
                    echo "La división de " . $num1 . " / " . $num2 . " = " . ($num1/$num2);
                    break;
                default:
                    echo "Sin definir";
                    break;
            }

        }

        realizarOperacion($num1, $num2, $operador);
        
    }

    ?>

</body>
</html>