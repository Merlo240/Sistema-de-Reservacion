<?php 
include "conexion.php"; 

$id = $_POST ['m_id'];
$rol = $_POST['m_nombre'];
$usuario = $_POST['m_dni'];
$password = md5($_POST['m_telefono']);
$name = $_POST['m_barrio'];

$sql = "UPDATE users SET role ='$rol', username= '$usuario', password= '$password',name='$name' WHERE id = $id";

 echo mysqli_query($conexion,$sql);