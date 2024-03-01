<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

    // Crea la funció que sume 2 nombres i retorne el resultat
    function sumar () {
        global $num1;
        global $num2;
        $num1 = 4;
        $num2 = 7;

        $suma=($num1+$num2);

        return $suma;
    }

    // Definix les variables pels dos nombre i assigna'ls un valor

    // Definix una variable que cride a la funció
    $suma=sumar();

    /* Mostra per pantalla un missatge tipus "La suma de 3 + 6 és : 9" 
    Els 3 nombres han de ser variables */
    echo "La suma de $num1 + $num2 és: $suma";

    ?>
</body>
</html>