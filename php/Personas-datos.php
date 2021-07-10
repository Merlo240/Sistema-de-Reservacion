<?php 
require'conexion.php';
include "php/conexion.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
$sql="SELECT * FROM clientes";
$resultado = $conexion->query($sql);
 }
 else{
	header("Location: ../index.php");
};
 ?>
