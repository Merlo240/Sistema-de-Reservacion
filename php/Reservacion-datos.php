<?php 
require'conexion.php';

$sql= "SELECT reserva.ID_RESERVA, clientes.NOMBRE_COMPLETO,clientes.DNI, evento.FECHA , evento.HORA,evento.DESCRIPCION ,reserva.ID_USUARIO FROM reserva INNER JOIN clientes ON reserva.ID_CLIENTES =clientes.ID_CLIENTES INNER JOIN evento ON reserva.ID_EVENTO = evento.ID_EVENTO";
$resultado = $conexion->query($sql)
 ?>
