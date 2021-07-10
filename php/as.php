<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
		<div class="container ">
				<div class="row responsive-table ">
						<table class="display responsive nowrap" id="Tablas" >
							<caption></caption>
							<thead>
								<tr>
									<th>ID</th>
									<th>Nombre Completo</th>
									<th>D.N.I</th>
									<th>Fecha</th>
									<th>Hora</th>
									<th>Descripcion</th>
									<th>Usuario</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								<?php
								include 'Reservacion-datoshoy.php';
								while ($row = mysqli_fetch_array($resultado)) {
									$Dato = $row[0]."||".
								$row[1]."||".
								$row[2]."||".
								$row[3];




								$eli = $row[0]."||".$row[1];

								?>

								<tr>
									<td><?php echo $row[0]; ?></td>
									<td><?php echo $row[1]; ?></td>
									<td><?php echo $row[2]; ?></td>
									<td><?php echo $row[3]; ?></td>
									<td><?php echo $row[4]; ?></td>
									<td><?php echo $row[5]; ?></td>
									<td><?php echo $row[6]; ?></td>
									<td><button class="btn-small modal-trigger red" data-target="modal3" id="ver_modal" onclick="eliminar('<?php echo $eli ?>')">Eliminar<i class="material-icons">add</i></button></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
</div>

	
</body>
</html>