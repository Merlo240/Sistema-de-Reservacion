<?php 
   session_start();
   include'php/conexion.php';
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Reservacion</title>
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link rel="stylesheet" type="text/css" href="css/stilo.css">
		<link rel="stylesheet" href="css/select.dataTables.min.css">
		<link rel="stylesheet" href="css/responsive.dataTables.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	</head>
<?php if ($_SESSION['role'] == $rol['admin'] || $_SESSION['role'] == $rol['operador']) {?>
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
			<nav class="cyan">
				<div class="nav-wrapper ">
					<a href="" class="brand-logo"><?=$_SESSION['name']?></a>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="personas1.php">Persona</a></li>
						<li><a href="evento.php">Evento</a></li>
						<!-- <li><a href="reservacion1.php">Reservacion</a></li> -->
						 <li><a class="dropdown-trigger cyan darken-2" href="#" data-target="dropdown1">Reservacion<i class="material-icons right">arrow_drop_down</i></a></li>
						<li><a href="usuarios.php">Usuarios</a></li>
						<li><a href="visitas.php">Asistencia Diaria</a></li>
						<li><a class="red" href="php/logout.php">Cerra Sesion</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<ul class="sidenav" id="mobile-demo">
			<li><a href="personas1.php">Persona</a></li>
			<li><a href="evento.php">Evento</a></li>
			<!-- <li><a href="reservacion1.php">Reservacion</a></li> -->
			<li><a href="usuarios.php">Usuarios</a></li>
			 <li><a class="dropdown-trigger cyan darken-2" href="#" data-target="dropdown2">Reservacion<i class="material-icons right">arrow_drop_down</i></a></li>
			<li><a href="visitas.php">Asistencia Diaria</a></li>
			<li><a class="red" href="php/logout.php">Cerra Sesion</a></li>
		</ul>
		<br>
		<br>
		<br>
		
		<!-- ///////////////  ///////////////////////////////////////////////////////// -->
		<div class="row " id="tabla_registro">
		<div class="container">
			        <h5 class="blue-text"> Formulario de Reservacion</h5><br><br>
        <form id="frm_registrarr" method="post" autocomplete="off">
                <div class="input-field col s3">
                  <select name="clientet" id="clientet"  class="js-example-basic-single"  required >
                    <option value="">Personas</option>}
                    <?php
                    include'php/conexion.php';
                    $a= mysqli_query($conexion,"SELECT * FROM CLIENTES");
                    while ($fila=mysqli_fetch_row($a)){
                    ?>
                    <option value="<?php echo $fila[0] ?>">  <?php echo $fila[1] ." " . $fila[2]; ?></option>
                    <?php    } ?>
                  </select>               </div>
                  <div class="input-field col s3">
                    <select name="eventos"  id="eventos" class="js-example-basic-single" required >
                      <option value="">evento</option>}
                      <?php
                      include'php/conexion.php';
                      $a= mysqli_query($conexion,"SELECT * FROM evento");
                      while ($fila=mysqli_fetch_row($a)){
                      ?>
                      <option value="<?php echo $fila[0] ?>">  <?php echo $fila[1] ." --" . $fila[2]?></option>
                      <?php    } ?>
                    </select>
                  </div>
                  <div class="input-field col s3">
                    <input id="id_usuario" name="id_usuario" type="hidden" value="<?=$_SESSION['name']?>" class="validate">
                  </div>
                  
                  </div>
            <div class="input-field">
             <button type="submit" name="btn-registrosss" id="btn-registrosss"class="btn waves-effect waves-light cyan">Guardar
                    <i class="material-icons right">send</i>
                    </button>
            </div>
          </form>

		</div>

		<!--/////////////////////////////////////////////////////// -->
			<!--/////////////////////////////////////////////////////////// -->
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
								include 'php/Reservacion-datos.php';
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

<!-- Modal Structure -->
<div id="modal3" class="modal">
	<div class="modal-content">
		<h4>¿Desea Eliminar este Registro?</h4>
		<form id="eliminar_reserva" method="post">
			<div class="input-field">
				<input type="hidden" name="e_id"  value="" id="e_id" placeholder="">
			</div>
	</div>
	<div class="modal-footer">
		<button type="submit" name="btn-eliminarReserva" id="btn-eliminarReserva" class="btn-small red">Eliminar</button>
		<a href="" class="waves-effect waves-green btn-flat modal-action modal-close">Cancelar</a>
	</div>
	</form>
</div>




</div>



<?php } else{

				echo "<script> alert('No tienes Asignado ese Rol');
					;window.history.go(-1);</script>";

			}?>


















		</div>

		<!--///////////////////////////////////////////////////////////////////// -->
		<script  type="text/javascript" src="js/jquery-3.5.1.js" ></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script src="js/datatables.min.js"></script>
		<script src="js/dataTables.select.min.js"></script>
		<script src="js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/datatables.min.js"></script>
		<script type="text/Javascript" src="js/funciones.js"></script>
		<script src="js/select2.min.js"></script>
		
		<script>
			
			$('#Tablas').DataTable({
				"dom": 'Bfrtip',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf','print'
        ],
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
	$(document).ready(function() {
    $('.js-example-basic-single').select2({
        minimumInputLength: 2
    });


});
		</script>
	</body>
</html>

<?php }else{
	header("Location: index.php");
} ?>