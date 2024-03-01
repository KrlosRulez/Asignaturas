<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    
    $nombre = $_GET['Nombre'];
    $apellido = $_GET['Apellido'];

    echo "Me llamo " . $nombre . $apellido;
    
    ?>

</body>
</html>