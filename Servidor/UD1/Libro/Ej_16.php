<?php
    $color=$_POST['Color']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor=<?php echo $color; ?> >

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="color" name="Color">
    <input type="submit" name="Enviar">
</form>

</body>
</html>