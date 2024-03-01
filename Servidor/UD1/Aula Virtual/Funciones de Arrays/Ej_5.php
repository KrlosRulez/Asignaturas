<?php 

    $numero=$_POST['numero'];

    $array_numero=str_split($numero);

    $numero_inverso=array_reverse($array_numero);
    
    $diferencia=array_diff_assoc($array_numero, $numero_inverso);

    if (count($diferencia) == 0) {
        echo "El número es palíndromo";
    } else {
        echo "El número no es palíndromo";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="numero">
        <input type="submit" name="enviar">
    </form>
</body>
</html>