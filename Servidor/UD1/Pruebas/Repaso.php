<?php 

    $contra_real = "1234";

    if (isset($_POST['Enviar'])) {

        $contador = $_POST['contador'];

        if (isset($_POST['contra'])) {
            $contra = $_POST['contra'];
    
            if ($contra == $contra_real) {
                echo "Coincide";
            } else {
                echo "No coincide";
                $contador--;

                if ($contador == 0) {
                    header("location:fallo.php");
                }

            }
    
        }
    } else {
        $contador = 2;
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
        <input type="password" name="contra">
        <input type="submit" name="Enviar">
        <input type="hidden" name="contador" value="<?php echo $contador ?>">
    </form>

</body>
</html>