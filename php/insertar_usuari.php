<?php 

include "conexion.php";

$rol = $_POST['rol'];
$usuario = $_POST['usuario'];
$password = md5($_POST['clave']);
$name = $_POST['nombres'];

$sql = "INSERT INTO users (role, username, password, name) VALUES ('$rol','$usuario','$password','$name')";
echo mysqli_query($conexion,$sql);

 ?>