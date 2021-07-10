
<?php 

require'conexion.php';

$sql= "SELECT users.id , rol.ROL, users.username, users.password,users.name FROM users INNER JOIN rol ON users.role =rol.ID_ROL";
$resultado = $conexion->query($sql)
 ?>
