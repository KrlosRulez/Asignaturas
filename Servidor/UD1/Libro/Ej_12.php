<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    echo htmlentities($_SERVER['PHP_SELF']); echo "<br />";
    echo htmlentities($_SERVER['SERVER_NAME']); echo "<br />";
    echo htmlentities($_SERVER['HTTP_HOST']); echo "<br />";
    echo htmlentities($_SERVER['HTTP_REFERER']); echo "<br />";
    echo htmlentities($_SERVER['HTTP_USER_AGENT']); echo "<br />";
    echo htmlentities($_SERVER['SCRIPT_NAME']); echo "<br />"; 
    
    ?>
</body>
</html>