<?php 



include 'conexion.php';


	$id = $_POST['e_id'];

	$sql = " DELETE FROM evento WHERE ID_EVENTO = '$id' " ;
	echo mysqli_query($conexion,$sql);
 ?>