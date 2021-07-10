<?php 
   session_start();
   include "php/conexion.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Personas</title>
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link rel="stylesheet" type="text/css" href="css/stilo.css">
		<link rel="stylesheet" href="css/select.dataTables.min.css">
		<link rel="stylesheet" href="css/responsive.dataTables.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
		<?php if ($_SESSION['role'] == $rol['admin']||$_SESSION['role'] == $rol['operador']) {?>
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
			<nav class="blue">
				<div class="nav-wrapper ">
					<a href="#!" class="brand-logo"><?=$_SESSION['name']?></a>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li><a class="blue lighten-1" href="personas1.php">Personas</a></li>
						<li><a href="evento.php">Evento</a></li>
						<li><a class="dropdown-trigger" href="#" data-target="dropdown1">Reservacion<i class="material-icons right">arrow_drop_down</i></a></li>
						<li><a href="usuarios.php">Usuarios</a></li>
						<li><a href="visitas.php">Asistencia Diaria</a></li>
						<li><a class="red" href="php/logout.php">Cerra Sesion</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<!-- MENU EN RESPOSIVE -->
		<ul class="sidenav" id="mobile-demo">
			<li><a class="blue lighten-1" href="personas1.php">Personas</a></li>
			<li><a href="evento.php">Evento</a></li>
			<li><a class="dropdown-trigger" href="#" data-target="dropdown2">Reservacion<i class="material-icons right">arrow_drop_down</i></a></li>
			<li><a href="usuarios.php">Usuarios</a></li>
			<li><a href="visitas.php">Asistencia Diaria</a></li>
			<li><a class="red" href="php/logout.php">Cerra Sesion</a></li>
		</ul>
		<br>
		<br>
		<br>
		<!-- ///////////////BOTON DE ACCIONAR EL FOMRULARIO  ///////////////////////////////////////////////////////// -->
		<div class="container">
			<div class="row">
				<a class=" btn tooltipped btn-floating btn-large cyan pulse modal-trigger blue " data-position="bottom" data-tooltip="Agregar nuevo Registro" href="#modal2"><i class="material-icons">edit</i></a>
				<!--<a class="waves-effect waves-light btn modal-trigger blue" href="#modal2">Modal</a>-->
			</div>
		</div>


		<!--////////////////////////FORMULARIO DE REGISTRO (MODAL)/////////////////////////////// -->
		<div class="row" id="tabla_registro">
			<div id="modal2" class="modal modal-fixed-footer">
				<div class="col 14"> 
					<div class="modal-content ">
						<div class="container ">
							<div class="row">
								<div class="col s12 "></div>
						<h4 class="center-align"> Registro</h4></div></div>
						 <div class="divider"></div>
						<form id="frm_registrar" method="post" autocomplete="off">
							
							<div class="input-field col s6">
								<i class="material-icons prefix">person</i>
								<input type="text" name="nombres"  value="" id="nombres" class="validate">
								<label for="nombres">Nombre Completo</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">fingerprint</i>
								<input type="text" name="dni"  value="" id="dni" class="validate" maxlength="8">
								<label for="dni">D.N.I</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">call</i>
								<input type="text" name="telefono"  value="" id="telefono" class="validate" maxlength="10">
								<label for="telefono">Telefono</label>
							</div>
							
							<div class="input-field col s6">
								<i class="material-icons prefix">domain</i>
								<input type="text" name="barrio"  value="" id="barrio" class="validate">
								<label for="barrio">Barrio</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">navigation</i>
								<input type="text" name="calle"  value="" id="calle" class="validate">
								<label for="calle">Calle</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">store</i>
								<input type="text" name="ncasa"  value="" id="ncasa" class="validate">
								<label for="ncasa">N°Casa</label>
							</div>
						</div>
						<div class="modal-footer">
							<div class="input-field">
								<button type="submit" name="btn-registro" id="btn-registro" class="btn-small blue">Guardar</button>
								<a href="" class="modal-close waves-effect waves-green btn-flat red">Cancelar</a>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<!--///////////////////////////TABLA //////////////////////////////// -->
				<div class="row responsive-table  z-depth-2">
					<div class="container">
						<table class="display responsive nowrap" id="Tablasss" >
							<caption></caption>
							<thead>
								<tr>
									<th>ID</th>
									<th>Nombre Completo</th>
									<th>Telefono</th>
									<th>Barrio</th>
									<th>Calle</th>
									<th>N° Casa</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								include 'php/Personas-datos.php';
								while ($row = mysqli_fetch_array($resultado)) {
									$Dato = $row[0]."||".
								$row[1]."||".
								$row[2]."||".
								$row[3]."||".
								$row[4]."||".
								$row[5]."||".
								$row[6];




								$eli = $row[0]."||".$row[1];

								?>

								<tr>
									<td><?php echo $row[2]; ?></td>
									<td><?php echo $row[1]; ?></td>
									<td><?php echo $row[3]; ?></td>
									<td><?php echo $row[4]; ?></td>
									<td><?php echo $row[5]; ?></td>
									<td><?php echo $row[6]; ?></td>
									<td><button class="btn-small modal-trigger blue" data-target="modal1" id="ver_modal" onclick="actualizar('<?php echo $Dato ?>')">Editar<i class="material-icons">add</i></button></td>
									<td><button class="btn-small modal-trigger red" data-target="modal3" id="ver_modal" onclick="eliminar('<?php echo $eli ?>')">Eliminar<i class="material-icons">add</i></button></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>



<!-- FORMULARIO DE ACTUALIZACION DE REGISTRO -->
 <div id="modal1" class="modal ">
    		<div class="modal-content">
             
             <form id="frm_actualizar" method="post" autocomplete="off">

             		<div class="input-field">
						<input type="hidden" name="m_id"  value="" id="m_id" placeholder="">
						</div>
							<div class="input-field">
								<input type="text" name="m_nombre"  value="" id="m_nombre" placeholder="">
								<label for="m_nombre">Nombre Completo</label>
							</div>
							<div class="input-field">
								<input type="text" name="m_dni"  value="" id="m_dni" placeholder="">
								<label for="m_dni">D.N.I</label>
							</div>
							<div class="input-field">
								<input type="text" name="m_telefono"  value="" id="m_telefono" placeholder="">
								<label for="m_telefono">Telefono</label>
							</div>
							
							<div class="input-field">
								<input type="text" name="m_barrio"  value="" id="m_barrio" placeholder="">
								<label for="m_barrio">Barrio</label>
							</div>

							<div class="input-field">
								<input type="text" name="m_calle"  value="" id="m_calle" placeholder="">
								<label for="m_calle">Calle</label>
							</div>
							<div class="input-field">
								<input type="text" name="m_ncasa"  value="" id="m_ncasa" placeholder="">
								<label for="m_ncasa">N°Casa</label>
							</div>
						</div>
						<div class="modal-footer">
							<div class="input-field">
								<button type="submit" name="btn-actualizar" id="btn-actualizar" class="btn-small red">Guardar</button>
								<a href="" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
							</div>
						</form>
					</div>
				</div>
			</div>




<!-- FOMULARIO DE ELIMINACION DE REGISTRO -->
<div id="modal3" class="modal">
	<div class="modal-content">
		<h4>¿Desea Eliminar este Registro?</h4>
		<form id="eliminar_modal" method="post">
			<div class="input-field">
				<input type="hidden" name="e_id"  value="" id="e_id" placeholder="">
			</div>
	</div>
	<div class="modal-footer">
		<button type="submit" name="btn-eliminar" id="btn-eliminar" class="btn-small red">Eliminar</button>
		<a href="" class="waves-effect waves-green btn-flat modal-action modal-close ">Cancelar</a>
	</div>
	</form>
</div>

<?php } ?>

		</div>
		<!--/////////////////////////////COMPONENTES//////////////////////////////////////// -->
		<script  type="text/javascript" src="js/jquery-3.5.1.js" ></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script src="js/datatables.min.js"></script>
		<script src="js/dataTables.select.min.js"></script>
		<script src="js/dataTables.responsive.min.js"></script>
		<script type="text/Javascript" src="js/funciones.js"></script>
		<script>
			
    $('#Tablasss').DataTable({

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
		</script>
	</body>
</html>

	<?php }else{
	header("Location: index.php");
} ?>