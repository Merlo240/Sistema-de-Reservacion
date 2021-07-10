
	$(document).ready(function(){

	M.AutoInit(); 

	$('timepicker').timepicker({
			twelveHour:false
	});

	$('.datepicker').datepicker();

	 $('.tooltipped').tooltip();

	$('.sidenav').sidenav();	


    $('#Tabla').DataTable({

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

 $("#btn-registro").on("click",function(e){
   e.preventDefault();
   if($("#nombres").val() === "" || $("#dni").val() === "" || $("#telefono").val() === "" || $("#barrio").val() === "" ||  $("#calle").val() === "" || $("#ncasa").val() === ""){
	M.toast({html:"Algunos campos faltan completar",classes:' red darken-1 ' });
  }else{
	agregar_datos();
  }
    //agregar_datos();
    });

    $("#btn-actualizar").on('click',function(e){
     e.preventDefault();
    actulizar_datos();

    });

    $("#btn-eliminar").on('click',function(e){
     e.preventDefault();
   		eliminar_datos();

    });
//////////////////////////////////////////////////////////////////////////////////////////////////    

$("#btn-eliminar-evento").on('click',function(e){
     e.preventDefault();
   		eliminar_event();

    });


$("#btn-evento").on('click',function(e){
     e.preventDefault();
	 if($("#descripcion").val() === "" || $("#fecha").val() === "" || $("#hora").val() === "" ){
		M.toast({html:"Algunos campos faltan completar",classes:' red darken-1 ' });
	  }else{	
	 agregar_evento();
	  }
    });

$("#btn-actualizar-evento").on('click',function(e){
     e.preventDefault();
   		actulizar_evento();

    });

/////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////    

$("#btn-registrosss").on('click',function(e){
     e.preventDefault();
   		agregar_datos_reserva();

    });

$("#btn-eliminarReserva").on('click',function(e){
     e.preventDefault();
   		eliminar_reservas();

    });

/////////////////////////////////////////////////////////////////////////////////////////////////  

$("#btn-asist").on('click',function(e){
     e.preventDefault();
   		agregar_visita();

    });

$("#btn-eliminarvisitas").on('click',function(e){
     e.preventDefault();
   		eliminar_visita();

    });

/////////////////////////////////////////////////////////////////////////////////////////////////

$("#btn-usuario").on('click',function(e){
     e.preventDefault();
	 if($("#usuario").val() === "" || $("#clave").val() === "" || $("#nombres").val() === "" || $("#rol").val() === ""){
		M.toast({html:"Algunos campos faltan completar" ,classes:' red darken-1 ' });
	  }else{
   		agregar_usuario();
	  }
    });

$("#btn-actualizar-usuario").on('click',function(e){
     e.preventDefault();
   		actualizar_usuario();

    });


$("#btn-eliminar-usuario").on('click',function(e){
     e.preventDefault();
   		eliminar_usuarios();

    });

//////////////////////////////////////// FUNCION DE AGREGAR A LAS PERSONAS  //////////////////////////////////////////////////////////
function agregar_datos(){
	var datos = $("#frm_registrar").serialize();
	$.ajax({
		method:"post",
		url:"/templo-sistema/php/insertar_cliente.php",
		data: datos,
		success: function(e){

				if (e==1) {
					M.toast({html: 'Procesando...', completeCallback: function(){M.toast({html: "Se ha Registrado con Exito!  <img src='/final24/images/iconmonstr-check-mark-14.svg'> ",classes:' green darken-1 ' })}})
					$("#tabla_registro").load ('/templo-sistema/personas1.php');
				}else{
					alert("El Registro ya existe");
				}

		}
	});	
	
	return false;
}



function actulizar_datos(){
	var datos = $("#frm_actualizar").serialize();
		$. ajax({
		method:"post",
		url:"/templo-sistema/php/modificar_cliente.php",
		data: datos,
		success: function(e){

				if (e==1) {
					M.toast({html: 'Procesando..', completeCallback: function(){M.toast({html: "Registro Actualizado!  <img src='/final24/images/iconmonstr-check-mark-14.svg'>",classes:' green darken-1 '})}})


					$("#tabla_registro").load ('/templo-sistema/personas1.php');

				}else{
					alert("Ups Hubo un Problema en la Actualizacion Intentelo otra vez");
				}

		}
	});	
	
	return false;

}


function eliminar_datos(){

	var datos = $("#eliminar_modal").serialize();
		$. ajax({
		method:"post",
		url:"/templo-sistema/php/eliminar_cliente.php",
		data: datos,
		success: function(e){


				if (e==1) {
					M.toast({html:"Eliminado..."});

					$("#tabla_registro").load ('/templo-sistema/personas1.php');

				}else{
					alert("Ups, Hubo un Problema en Eliminar este registro, esto es debido a que se encuentra ocupado en la reservacion");
				}

		}
	});		
		return false;
}


///////////////////////////////FUNCION DE AGREGAR EL EVENTO ////////////////////////////////////////////

function eliminar_event(){

	var datos = $("#eliminar_eventos").serialize();
		$. ajax({
		method:"post",
		url:"/templo-sistema/php/eliminar_evento.php",
		data: datos,
		success: function(e){


				if (e==1) {
					M.toast({html:"Eliminado..."});

					$("#tabla_registro").load ('/templo-sistema/evento.php');

				}else{
					alert("Ups, Hubo un Problema en Eliminar esta reserva");
				}

		}
	});		
		return false;
}



function agregar_evento(){
	var datos = $("#frm_evento").serialize();
	$.ajax({
		method:"post",
		url:"/templo-sistema/php/insertar_evento.php",
		data: datos,
		success: function(e){

				if (e==1) {
					 M.toast({html: 'Procesando..', completeCallback: function(){M.toast({html:"Se ha Registrado con Exito ! <img src='/final24/images/iconmonstr-check-mark-14.svg'> ",classes:' green darken-1 ' })}})
					$("#tabla_registro").load ('/templo-sistema/evento.php');
				}else{
					alert("No se ha podido registrar");
				}

		}
	});	
	
	return false;
}



function actulizar_evento(){
	var datos = $("#frm_actualizar_evento").serialize();
		$. ajax({
		method:"post",
		url:"/templo-sistema/php/modificar_evento.php",
		data: datos,
		success: function(e){

				if (e==1) {
					M.toast({html: 'Procesando..', completeCallback: function(){M.toast({html: "Evento Actualizado!  <img src='/final24/images/iconmonstr-check-mark-14.svg'> ",classes:' green darken-1 ' })}})
					$("#tabla_registro").load ('/templo-sistema/evento.php');

				}else{
					alert("Ups Hubo un Problema en la Actualizacion Intentelo otra vez");
				}

		}
	});	
	
	return false;

}

///////////////////////////////////FUNCION DE AGREGAR LA RESERVACION //////////////////////////////////////////////

function agregar_datos_reserva(){
	var datos = $("#frm_registrarr").serialize();
	$.ajax({
		method:"post",
		url:"/templo-sistema/php/inser-reserva.php",
		data: datos,
		success: function(e){

				if (e==1) {
					M.toast({html: 'Procesando..', completeCallback: function(){M.toast({html: "Se ha Registrado con Exito!  <img src='/final24/images/iconmonstr-check-mark-14.svg'> ",classes:' green darken-1 '})}})

					$("#tabla_registro").load ('/templo-sistema/reservacion1.php');
				}else{
					alert("Ups, Hubo un Problema en la Reservacion Intentelo otra vez");
				}

		}
	});	
	
	return false;
}


function eliminar_reservas(){

	var datos = $("#eliminar_reserva").serialize();
		$. ajax({
		method:"post",
		url:"/templo-sistema/php/eliminar_reserva.php",
		data: datos,
		success: function(e){


				if (e==1) {
					M.toast({html:"Eliminado..."});

					$("#tabla_registro").load ('/templo-sistema/reservacion1.php');

				}else{
					alert("Ups, Hubo un Problema en Eliminar esta reserva");
				}

		}
	});		
		return false;
}

///////////////////////////////////////FUNCION DE AGREGAR VISITAS AL TEMPLO////////////////////////////////////////////////

function agregar_visita(){
	var datos = $("#frm_asist").serialize();
	$.ajax({
		method:"post",
		url:"/templo-sistema/php/inser-visitas.php",
		data: datos,
		success: function(e){

				if (e==1) {
					 M.toast({html: 'Procesando...', completeCallback: function(){M.toast({html: "Se ha Registrado su visita !  <img src='/final24/images/iconmonstr-check-mark-14.svg'> ",classes:' green darken-1 '})}})
					$("#tabla_registro").load ('/templo-sistema/visitas.php');
				}else{
					alert("Ups, hubo un problema ");
				}

		}
	});	
	
	return false;
}


function eliminar_visita(){

	var datos = $("#eliminar_visitas").serialize();
		$. ajax({
		method:"post",
		url:"/templo-sistema/php/eliminar_visitasS.php",
		data: datos,
		success: function(e){


				if (e==1) {
					M.toast({html:"Eliminado..."});

					$("#tabla_registro").load ('/templo-sistema/visitas.php');

				}else{
					alert("Ups, Hubo un problema al eliminar este registro");
				}

		}
	});		
		return false;
}


////////////////////////////////////////////////FUNCION DE AGREGAR AL USUARIO DEL SISTEMA (SOLO PARA LOS ADMIN)////////////////////////////////////////////////////////////////////////////////////

function agregar_usuario(){
	var datos = $("#frm_usuario").serialize();
	$.ajax({
		method:"post",
		url:"/templo-sistema/php/insertar_usuari.php",
		data: datos,
		success: function(e){

				if (e==1) {
					 M.toast({html: 'Procesando', completeCallback: function(){M.toast({html: "Se ha Registrado con Exito!  <img src='/final24/images/iconmonstr-check-mark-14.svg'> ",classes:' green darken-1 '})}})
					$("#tabla_registro").load ('/templo-sistema/usuarios.php');
				}else{
					alert("Ups, no hubo un problema");
				}

		}
	});	
	
	return false;
}


function actualizar_usuario(){

	var datos = $("#frm_actualizar_usuario").serialize();
		$. ajax({
		method:"post",
		url:"/templo-sistema/php/modificar_usuario.php",
		data: datos,
		success: function(e){


				if (e==1) {
					M.toast({html: 'Procesando', completeCallback: function(){M.toast({html: "Usuario Actualizado <img src='/final24/images/iconmonstr-check-mark-14.svg'> ",classes:' green darken-1 '})}})


					$("#tabla_registro").load ('/templo-sistema/usuarios.php');

				}else{
					alert("Ups Hubo un Problema en la Actualizacion Intentelo otra vez");
				}

		}
	});		
		return false;
}

function eliminar_usuarios(){

	var datos = $("#eliminar_usuario").serialize();
		$. ajax({
		method:"post",
		url:"/templo-sistema/php/eliminar_usuario.php",
		data: datos,
		success: function(e){


				if (e==1) {
					M.toast({html:"Eliminado..."});

					$("#tabla_registro").load ('/templo-sistema/usuarios.php');

				}else{
					alert("Ups, Hubo un problema al eliminar este registro");
				}

		}
	});		
		return false;
}







  });

// FUNCION PARA MOSTRAR LOS DATOS PARA SER ACTUALIZADOS 
 function actualizar(Dato){
   d = Dato.split('||');

   $("#m_id").val(d[0]);
   $("#m_nombre").val(d[1]);
   $("#m_dni").val(d[2]);
   $("#m_telefono").val(d[3]);
   $("#m_barrio").val(d[4]);
   $("#m_calle").val(d[5]);
   $("#m_ncasa").val(d[6]);

};


 function eliminar(eli){
   b = eli.split('||');;

   $("#e_id").val(b[0]);

};

function eliminar_evento(elieve){
   b = elieve.split('||');;

   $("#v_id").val(b[0]);

};
