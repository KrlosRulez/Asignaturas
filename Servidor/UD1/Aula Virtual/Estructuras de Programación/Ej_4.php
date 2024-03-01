<?php 

    $nombres=array("Jose", "Lola", "Lorenzo", "Isabel", "Mariluz", "Maria Jose");

    $input=$_POST['nombre'];

    $longitud=(count($nombres) - 1);

    $encontrado=false;

    for ($i=0; $i<=$longitud; $i++) {

        if ($input==$nombres[$i]) {
            echo "Nombre encontrado";
            $encontrado=true;
        }

    }

    if ($encontrado==false) {
        echo $input . " no es profesor";
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
        <input type="text" name="nombre">
        <input type="submit" name="enviar">
    </form>
    
</body>
</html>