<?php 



include 'conexion.php';



	$id = $_POST['e_id'];

	$sql = " DELETE FROM reserva WHERE ID_RESERVA  = '$id' " ;
	echo mysqli_query($conexion,$sql);


 ?>