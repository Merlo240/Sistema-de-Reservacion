<?php 
   session_start();
   include'php/conexion.php';
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Usuarios</title>
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link rel="stylesheet" type="text/css" href="css/stilo.css">
		<link rel="stylesheet" href="css/select.dataTables.min.css">
		<link rel="stylesheet" href="css/responsive.dataTables.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<?php if ($_SESSION['role'] == $rol['admin']) {?>
	<body id="tabla_registro">
		<ul id="dropdown1" class="dropdown-content">
  <li><a href="reservacion1.php">Registrar Reservacion</a></li>
  <li class="divider"></li>
  <li><a href="reservacion2.php">Reservaciones para hoy</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
  <li><a href="reservacion1.php">Registrar Reservacion</a></li>
  <li class="divider"></li>
  <li><a href="reservacion2.php">Reservaciones para hoy</a></li>
</ul>

		<div class="navbar-fixed blue">
			<nav class="yellow darken-4">
				<div class="nav-wrapper ">
					<a href="" class="brand-logo"><?=$_SESSION['name']?></a>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="personas1.php">Persona</a></li>
						<li><a href="evento.php">Evento</a></li>
						<li><a class="dropdown-trigger" href="#" data-target="dropdown1">Reservacion<i class="material-icons right">arrow_drop_down</i></a></li>
						<li><a class="yellow darken-3" href="usuarios.php">Usuarios</a></li>
						<li><a href="visitas.php">Asistencia Diaria</a></li>
						<li><a class="red" href="php/logout.php">Cerra Sesion</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<ul class="sidenav" id="mobile-demo">
			<li><a href="personas1.php">Persona</a></li>
			<li><a href="evento.php">Evento</a></li>
			<li><a class="dropdown-trigger" href="#" data-target="dropdown2">Reservacion<i class="material-icons right">arrow_drop_down</i></a></li>
			<li><a class="yellow darken-3" href="usuarios.php">Usuarios</a></li>
			<li><a href="visitas.php">Asistencia Diaria</a></li>
			<li><a class="red" href="php/logout.php">Cerra Sesion</a></li>
		</ul>
		<br>
		<br>
		
		<!-- ///////////////  ///////////////////////////////////////////////////////// -->
		
		<div class="container">
			<div class="row">
				<a class=" btn tooltipped btn-floating btn-large cyan pulse modal-trigger yellow " data-position="bottom" data-tooltip="Agregar nuevo evento" href="#modal2"><i class="material-icons">edit</i></a>
				<!--<a class="waves-effect waves-light btn modal-trigger blue" href="#modal2">Modal</a>-->
			</div>
		</div>
		<!--/////////////////////////////////////////////////////// -->
		<div class="row" id="tabla_registro">
			<div id="modal2" class="modal bottom-sheet">
				<div class="col 14">
					<div class="modal-content ">
						<div class="container ">
							<div class="row">
								<div class="col s12 m4 1 "></div>
							<h4 class="aaa"> Usuario</h4></div></div>
							<div class="divider"></div>
							<form id="frm_usuario" method="post">
								
								<div class="input-field col s6">
									<i class="material-icons prefix">person_outline</i>
									<input type="text" name="usuario"  value="" id="usuario" class="validate" required>
									<label for="usuario">Usuario</label>
								</div>
								<div class="input-field col s6">
									<i class="material-icons prefix">person</i>
									<input type="text" name="clave"  id="clave" class="validate" required>
									<label for="clave">Clave</label>
								</div>
								<div class="input-field col s6">
									<i class="material-icons prefix">person_outline</i>
									<input type="text" name="nombres"  value="" id="nombres" class="validate" required>
									<label for="nombres">Nombre de Usuario</label>
								</div>
								<div class="input-field col s6">
									<i class="material-icons prefix">person</i>
										<select name="rol"  id="rol"  required >
											<option value="">Rol</option>}
											<?php
											include'php/conexion.php';
											$a= mysqli_query($conexion,"SELECT * FROM rol");
											while ($fila=mysqli_fetch_row($a)){
											?>
											<option value="<?php echo $fila[0] ?>">  <?php echo $fila[1]?></option>
											<?php    } ?>
										</select>
									</div>
							</div>
							<div class="modal-footer">
								<div class="input-field col s6">
									<button type="submit" name="btn-usuario" id="btn-usuario" class="btn-small yellow">Guardar</button>
									<a href="" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<!--/////////////////////////////////////////////////////////// -->
				<div class="row responsive-table z-depth-2">
					<div class="container">
						<table class="display responsive nowrap" id="Tablass">
							<thead>
								<tr>
									<th>ID</th>
									<th>Rol</th>
									<th>USUARIO</th>
									<th>Clave</th>
									<th>Nombre Completo</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								include 'php/Usuarios-Datos.php';
								while ($row = mysqli_fetch_array($resultado)) {
									$Dato = $row[0]."||".
								$row[1]."||".
								$row[2]."||".
								$row[3]."||".
								$row[4];
								$eli = $row[0]."||".$row[1];
								?>
								<tr>
									<td><?php echo $row[0]; ?></td>
									<td><?php echo $row[1]; ?></td>
									<td><?php echo $row[2]; ?></td>
									<td><?php echo $row[3]; ?></td>
									<td><?php echo $row[4]; ?></td>
									<td><button class="btn-small modal-trigger yellow" data-target="modal1" id="ver_modal" onclick="actualizar('<?php echo $Dato ?>')">Editar<i class="material-icons">add</i></button></td>
									<td><button class="btn-small modal-trigger red" data-target="modal3" id="ver_modal" onclick="eliminar('<?php echo $eli ?>')">Eliminar<i class="material-icons">add</i></button></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div id="modal1" class="modal ">
						<div class="modal-content">
							<h4 class="center-align"> Actualizar</h4>
							<div class="divider"></div>
							<form id="frm_actualizar_usuario" method="post">
								<div class="input-field">
									<input type="hidden" name="m_id"  value="" id="m_id" >
								</div>
								
								<div class="input-field">
									<select name="m_nombre"  id="m_nombre"  required >
											<option value="">Rol</option>}
											<?php
											include'php/conexion.php';
											$a= mysqli_query($conexion,"SELECT * FROM rol");
											while ($fila=mysqli_fetch_row($a)){
											?>
											<option value="<?php echo $fila[0] ?>">  <?php echo $fila[1]?></option>
											<?php    } ?>
										</select>
									<label for="m_nombre">Rol </label>
								</div>
								<div class="input-field">
									<input type="text" name="m_dni"  value="" id="m_dni" placeholder="" required >
									<label for="m_dni">Usuario</label>
								</div>
								<div class="input-field">
									<input type="text" name="m_telefono"  value="" id="m_telefono" placeholder="" required >
									<label for="m_telefono">Clave</label>
								</div>
								<div class="input-field">
									<input type="text" name="m_barrio"  value="" id="m_barrio" placeholder="" required >
									<label for="m_barrio">Nombre de Usuario</label>
								</div>
							</div>
							<div class="modal-footer">
								<div class="input-field">
									<button type="submit" name="btn-actualizar-evento" id="btn-actualizar-usuario" class="btn-small yellow">Guardar</button>
									<a href="" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Modal Structure -->
				<div id="modal3" class="modal">
					<div class="modal-content">
						<h4>¿Desea Eliminar este Registro?</h4>
						<form id="eliminar_usuario" method="post">
							<div class="input-field">
								<input type="hidden" name="e_id"  value="" id="e_id" placeholder="">
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" name="btn-eliminar-usuario" id="btn-eliminar-usuario" class="btn-small red">Eliminar</button>
							<a href="" class="waves-effect waves-green btn-flat modal-action modal-close">Agree</a>
						</div>
					</form>
				</div>
			</div>


			<?php } else{

				echo "<script> alert('No tienes Asignado ese Rol');
					;window.history.go(-1);</script>";

			}?>
			<!--///////////////////////////////////////////////////////////////////// -->
			<script  type="text/javascript" src="js/jquery-3.5.1.js" ></script>
			<script type="text/javascript" src="js/materialize.js"></script>
			<script src="js/datatables.min.js"></script>
			<script src="js/dataTables.select.min.js"></script>
			<script src="js/dataTables.responsive.min.js"></script>
			<script type="text/Javascript" src="js/funciones.js"></script>
			<script>
				
			$('#Tablass').DataTable({
			"responsive": true,
				"order": [[1, "asc"]],
					"language":{
					"lengthMenu": "Mostrar _MENU_ registros por pagina",
					"info": "Mostrando pagina _PAGE_ de _PAGES_",
					"infoEmpty": "No hay registros disponibles",
					"infoFiltered": "(filtrada de _MAX_ registros)",
					"loadingRecords": "Cargando...",
					"processing":     "Procesando...",
					"search": "Buscar:",
					"zeroRecords":    "No se encontraron registros coincidentes",
					"paginate": {
						"next":       "Siguiente",
						"previous":   "Anterior"
										},
				}
			});


				$(document).ready(function(){

					$('select').formSelect();
				});
			</script>
		</body>
	</html>

	<?php }else{
	header("Location: index.php");
} ?>