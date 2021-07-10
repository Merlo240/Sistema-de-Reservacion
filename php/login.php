<?php  
session_start();
include "conexion.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);

	if (empty($username)) {
		header("Location: ../index.php?error=Usuario es Requerido");
	}else if (empty($password)) {
		header("Location: ../index.php?error=Contraseña es Requerido");
	}else {

		// password verifica
		$password = md5($password);
        
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($result) === 1) {
        	// usuarios por nombre y rol
        	$row = mysqli_fetch_assoc($result);
        	if ($row['password'] === $password && $row['role'] == $role) {
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['id'];
        		$_SESSION['role'] = $row['role'];
        		$_SESSION['username'] = $row['username'];

        		header("Location: ../personas1.php");

        	}else {
        		header("Location: ../index.php?error=Es Incorrecto el Usuario y Contraseña");
        	}
        }else {
        	header("Location: ../index.php?error=Incorrecto Usuario o Contraseña");
        }

	}
	
}else {
	header("Location: ../index.php");
}