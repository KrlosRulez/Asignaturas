<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

    // Modifica el codi anterior de forma que es puga fer la mateixa funció d'una altra forma
    // per exemple, passant els nombres com a paràmetres, amb o sense return
    function sumar ($num1, $num2) {

        $suma=($num1+$num2);

        return $suma;
    }

    $num1 = 4;
    $num2 = 7;

    $suma=sumar($num1, $num2);

    echo "La suma de $num1 + $num2 és: $suma";

    ?>
</body>
</html>