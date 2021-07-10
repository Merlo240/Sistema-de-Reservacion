
<?php 
require'conexion.php';

$sql= "SELECT visitas_diarias.ID_VISITA, clientes.NOMBRE_COMPLETO, visitas_diarias.FECHA, visitas_diarias.ID_USUARIO FROM visitas_diarias INNER JOIN clientes ON visitas_diarias.ID_CLIENTES =clientes.ID_CLIENTES";
$resultado = $conexion->query($sql)
 ?>
