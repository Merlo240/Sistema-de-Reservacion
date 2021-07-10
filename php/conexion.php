<?php 

$servidor = "localhost";
$username = "root";
$password = "";
$bd="establecimiento1";

$conexion = new mysqli($servidor, $username, $password,$bd);

$rol = ["admin" => 3, "operador" => 4];
 ?>
