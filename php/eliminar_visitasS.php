<?php 



include 'conexion.php';


	$id = $_POST['e_id'];

	$sql = " DELETE FROM visitas_diarias WHERE ID_VISITA  = '$id' " ;
	echo mysqli_query($conexion,$sql);


 ?>