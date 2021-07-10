<?php 
include 'conexion.php';
	$id = $_POST['e_id'];
	$sql = "DELETE FROM users WHERE id = '$id'";
	echo mysqli_query($conexion,$sql);
 ?>