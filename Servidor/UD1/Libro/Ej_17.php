<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    
    $marcas_uno=array("Adidas","Nike","Puma");
    echo $marcas_uno[0]."<br />";
    $marcas_dos=array("Reebok","Nike","Hacendado");
    echo $marcas_dos[2]."<br />";
    $comparar=array_intersect($marcas_uno,$marcas_dos);
    for ($i;$i<2;$i++) {
        echo $comparar[$i];
        echo "<br />";
    }
    
    ?>

</body>
</html>