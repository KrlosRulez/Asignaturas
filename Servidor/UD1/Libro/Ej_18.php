<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    
    $primero=array("Escalada"=>"8.4","Tiro al plato Vendado"=>"9.6","Waterpolo Inverso"=>"7.9");
    echo $primero['Escalada']."<br />";
    $segundo=array("Escalada"=>"8.4","Repartir Hostias"=>"9.9","Waterpolo Inverso"=>"7.9");
    ksort($segundo);

    foreach ($segundo as $i=>$i_valor) {
        echo "Index = " . $i . " Valor = " . $i_valor;
        echo "<br />";
    }

    $comparar=array_diff_assoc($primero,$segundo);

    foreach ($comparar as $i=>$i_valor) {
        echo "Index = " . $i . " Valor = " . $i_valor;
        echo "<br />";
    }

    ?>

</body>
</html>