<?php 

if (isset($_GET['reset'])) {
    $suma = 0;
} else if (isset($_GET['suma'])) {
    $suma = $_GET['suma'];
    $suma += 1;
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
    <a href="Aumentar.php?suma=<?php echo $suma; ?>">Aumentar</a>
    <a href="Aumentar.php?reset">Resetear</a>
    
</body>
</html>