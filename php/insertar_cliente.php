<?php 

include "conexion.php";

$nombre = $_POST['nombres'];
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$barrio = $_POST['barrio'];
$calle = $_POST['calle']; 
$ncasa = $_POST['ncasa'];
//validancion 
$validacion ="SELECT * FROM clientes WHERE DNI ='$dni'";
$resultado =$conexion->query($validacion);
$row=mysqli_num_rows($resultado);
if ($row ==0) {
    $sql = "INSERT INTO clientes (NOMBRE_COMPLETO,DNI,TELEFONO,BARRIO,CALLE,N_CASA ) VALUES ('$nombre','$dni','$telefono','$barrio','$calle','$ncasa')";
    mysqli_query($conexion,$sql);
    echo 1;
}else{
    echo 0;
}



 ?>