<?php 
include "conexion.php"; 

$id = $_POST ['m_id'];
$descripcion = $_POST['m_nombre'];
$fecha = $_POST['m_dni'];
$hora = $_POST['m_telefono'];

$sql = " UPDATE evento SET DESCRIPCION ='$descripcion', FECHA= '$fecha', HORA= '$hora' WHERE ID_EVENTO = $id ";

 echo mysqli_query($conexion,$sql);