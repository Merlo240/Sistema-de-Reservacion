<?php 



include "conexion.php";


$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];


$sql = "INSERT INTO evento (DESCRIPCION,FECHA,HORA ) VALUES ('$descripcion','$fecha','$hora')";
echo mysqli_query($conexion,$sql);




 ?>