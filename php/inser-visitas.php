<?php 

include "conexion.php";

$personas = $_POST['clientet'];
$usuario = $_POST['id_usuario'];



$sql = "INSERT INTO visitas_diarias (ID_CLIENTES ,FECHA ,ID_USUARIO ) VALUES ('$personas',CURRENT_TIMESTAMP,'$usuario')";
echo mysqli_query($conexion,$sql);
 ?>