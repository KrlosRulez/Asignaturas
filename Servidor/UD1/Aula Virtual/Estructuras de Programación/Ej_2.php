<?php 

    $fruta=$_POST['fruta'];

    switch ($fruta) {
        case "sandía":
            echo "Me gusta la sandía";
            break;
        case "manzana":
            echo "Me gusta la manzana";
            break;
        default:
            echo "No me gusta la fruta";
            break;
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
        <input type="text" name="fruta">
        <input type="submit" name="enviar">
    </form>
</body>
</html>