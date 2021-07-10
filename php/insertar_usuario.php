<?php 

include "conexion.php";


$usuario = $_POST['usuario'];
$usuario_hash_password = password_hash($_POST['clave'], PASSWORD_DEFAULT);
$rol = $_POST['rol'];


$sql = "INSERT INTO usuarios (CLAVE, USUARIO, ROL) VALUES ('$usuario_hash_password','$usuario','$rol')";
echo mysqli_query($conexion,$sql);

 ?>