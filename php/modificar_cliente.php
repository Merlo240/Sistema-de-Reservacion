<?php 
include "conexion.php"; 

$id = $_POST ['m_id'];
$nombre = $_POST['m_nombre'];
$dni = $_POST['m_dni'];
$telefono = $_POST['m_telefono'];
$barrio = $_POST['m_barrio'];
$calle = $_POST['m_calle'];
$ncasa = $_POST['m_ncasa'];

$sql = " UPDATE clientes SET  NOMBRE_COMPLETO= '$nombre', DNI= '$dni', TELEFONO = '$telefono', BARRIO = '$barrio', CALLE = '$calle', N_CASA = '$ncasa' WHERE ID_CLIENTES = $id ";

 echo mysqli_query($conexion,$sql);