<?php 

require ("CrudCategorias.php");

$dataBase = new Categorias();
$cat = $dataBase->showCategorias();


if (isset($_POST["nueva_categoria"])){
    $categoria = $_POST["categoria"];

	$data = array($categoria);
	$dataBase = new Categorias();
	$dataBase->addCategoria($data);
	header("location:Categorias.php");
	
}

if (isset($_GET["eliminar"])){
    $id_categoria = $_GET["id_categoria"];
   
	$data = array($id_categoria); 
					
	$dataBase = new Categorias();
	$dataBase->deleteCategoria($data); 
	header("location:Categorias.php");
	
}

if (isset($_GET["editar"])){
    $id_categoria= $_GET["id_categoria"];
   
	$data = array($id_categoria); 
					
	$dataBase = new Categorias();
	$categorias_editar = $dataBase->CategoriaById($data);

    foreach ($categorias_editar as $cat_editar){
        $categoria = $cat_editar["categoria"];
    }
    
}

if (isset($_POST["editar_categoria"])){
    $id_categoria= $_POST["id_categoria"];
    $categoria = $_POST["categoria"];
   
	$data = array($id_categoria,$categoria); 
					
	$dataBase = new Categorias();
    $dataBase->editCategoria($data);

    header("location:Categorias.php");
 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORIAS</title>
</head>
<body>
<h1>Backend - Gestión de la Librería</h1>
    <?php include ("menu.php"); ?>
    
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" 
        name="id_categoria" value="<?php echo (isset($_GET['editar'])) ? $id_categoria : '';?>">
        <label>CATEGORIA</label>
        <input type="text" 
        name="categoria" value="<?php echo (isset($_GET['editar'])) ? $categoria : '';?>">
        <br>
        <input type="submit" 
        name="<?php echo (isset($_GET['editar'])) ? 'editar_categoria' : 'nueva_categoria';?>">
        <br>
    </form>
<br><br>
    <table border="1">
        <tr>
            <td>ID_CATEGORIA</td>
            <td>CATEGORIA</td>            
            <td>EDITAR</td>
            <td>ELIMINAR</td>
        </tr>
        <?php
        foreach ($cat as $categoria) {?>
        <tr>
            <td><?php echo $categoria["id_categoria"];?></td>
            <td><?php echo $categoria["categoria"];?></td>
            <td><a href="Categorias.php?id_categoria=<?php echo $categoria[0];?>&editar">Editar</td>
            <td><a href="Categorias.php?id_categoria=<?php echo $categoria[0];?>&eliminar">Eliminar</td>
        </tr>
    <?php
    }//END FOREACH
    ?>
    </table>
</body>
</html>
<?php  



?>
