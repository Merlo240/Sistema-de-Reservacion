<?php 
include "conexion.php";


$personas = $_POST['clientet'];
$evento = $_POST['eventos'];
$usuario = $_POST['id_usuario'];



$sql = "INSERT INTO reserva (ID_CLIENTES ,ID_EVENTO ,ID_USUARIO ) VALUES ('$personas','$evento','$usuario')";
echo mysqli_query($conexion,$sql);
 ?>