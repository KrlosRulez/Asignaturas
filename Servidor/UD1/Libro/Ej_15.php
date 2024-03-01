<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Texto: <input type="text" name="texto"><br />
        Numero: <input type="number" name="numero"><br />
        Oculto: <input type="hidden" name="oculto"><br />
        <select name="desplegable">
            <option value="España">España</option>
            <option value="Pedro Sánchez">Pedro Sánchez</option>
            <option value="Betis">Betis</option>
        </select><br />
        Radio: <br />
        Uno <input type="radio" name="radio" value="uno"><br />
        Dos <input type="radio" name="radio" value="dos"><br />
        Tres <input type="radio" name="radio" value="tres"><br />
        CheckBox <br />
        Uno <input type="checkbox" name="cbox" value="uno"><br />
        Dos <input type="checkbox" name="cbox" value="dos"><br />
        Textarea <textarea name="textarea" rows="10" cols="30">Escribe aki</textarea><br />   
        Color <input type="color" name="color"><br />
        Enviar <input type="submit" name="enviar">
    </form>

    <?php 
    
    if (isset($_POST['enviar'])) {
        $texto = $_POST['texto'];
        $numero = $_POST['numero'];
        $oculto = $_POST['oculto'];
        $desplegable = $_POST['desplegable'];
        $radio = $_POST['radio'];
        // Hacer Array (cbox[]) y pintar con un for each
        $cbox = $_POST['cbox'];
        $textarea = $_POST['textarea'];
        $color = $_POST['color'];

        echo $texto."<br />";
        echo $numero."<br />";
        echo $oculto."<br />";
        echo $desplegable."<br />";
        echo $radio."<br />";
        echo $cbox."<br />";
        echo $textarea."<br />";
        echo $color."<br />";
    }
    
    ?>

</body>
</html>