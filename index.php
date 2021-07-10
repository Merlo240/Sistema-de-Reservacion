<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Iniciar Sesion</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/stilo.css">
	</head>
	<body id="Fondo">
		<div class="container d-flex justify-content-center align-items-center cuerpo">
			<form class="border shadow p-3 rounded"action="php/login.php" method="post" style="width: 450px;" autocomplete="off">
				<h1 class="text-center p-3 text-white">Iniciar Sesion</h1>
				<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
					<?=$_GET['error']?>
				</div>
				<?php } ?>
				<div class="mb-3">
					<label for="username" class="form-label text-white tamaño-letra"><strong>Usuario</strong></label><input type="text" class="form-control" name="username" id="username" required>
				</div>
				<div class="mb-3">
					<label for="password" class="form-label text-white tamaño-letra"><strong> Clave </strong></label>
					<input type="password" name="password" class="form-control" id="password" required=>
				</div>
				<div class="mb-1">
					<label class="form-label text-white tamaño-letra"> <strong> Selecione su rol :</strong></label>
				</div>
				<select class="form-select mb-3"
					name="role"
					required >
					<option value="">Rol</option>}
					<?php
					include'php/conexion.php';
					$a= mysqli_query($conexion,"SELECT * FROM rol");
					while ($fila=mysqli_fetch_row($a)){
					?>
					<option value="<?php echo $fila[0] ?>">  <?php echo $fila[1]?></option>
					<?php    } ?>
				</select>
				
				<button type="submit"
				class="btn btn-primary btm-lg btn-block">Entrar</button>
			</form>
		</div>
	</body>
</html>
<?php }else{
echo "<script> alert('No tiene Acceso');
window.location ='personas1.php'</script>";
} ?>