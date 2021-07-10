<?php 



include 'conexion.php';




	$id = $_POST['e_id'];

	$sql = "DELETE FROM clientes WHERE ID_CLIENTES = '$id' ";
	echo mysqli_query($conexion,$sql);






 ?>