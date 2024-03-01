<?php
include("conexion.php");
$conexion->set_charset('utf8');

$codigo=$_GET['cod_user'];

$delete_query="DELETE FROM users WHERE codigo=$codigo";
$conexion->query($delete_query);


$sql=$conexion->query("SELECT * FROM users");
$jsonData=array();

while($row = mysqli_fetch_assoc($sql)){
 $jsonData[]=$row;
}

echo json_encode($jsonData);

$conexion->close();

?>

