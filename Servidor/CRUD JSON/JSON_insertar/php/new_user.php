<?php
include("conexion.php");
$conexion->set_charset('utf8');

$user=$_GET['user'];
$password=$_GET['password'];
$email=$_GET['email'];
$permissions=$_GET['permissions'];

$query= "INSERT INTO `users` (`user`, `password`, `email`, `permissions`) VALUES ('$user', '$password', '$email', '$permissions')";
$sql_insert=$conexion->query($query);

$sql=$conexion->query("SELECT * FROM users");
$jsonData=array();

while($row = mysqli_fetch_assoc($sql)){
 $jsonData[]=$row;
}

echo json_encode($jsonData);

$conexion->close();
?>

