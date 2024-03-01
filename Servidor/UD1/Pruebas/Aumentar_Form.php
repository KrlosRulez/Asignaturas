<?php 

    $suma = $_POST['Valor'];

    if (isset($_POST['Aumentar'])) {
        $suma += 1;
    } else if (isset($_POST['Reducir'])) {
        $suma -= 1;
    } else if (isset($_POST['Resetear'])) {
        $suma = 0;
    } else {
        $suma = 0;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aumentar</title>
</head>
<body>

    <?php echo $suma . "<br />"; ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="submit" name="Aumentar" value="Aumentar"><br />
        <input type="submit" name="Reducir" value="Reducir"><br />
        <input type="submit" name="Resetear" value="Resetear"><br />
        <input type="hidden" name="Valor" value="<?php echo $suma ?>">
    </form>
    
</body>
</html>