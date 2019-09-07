<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<title>INGRESO DE PUESTO</title>
<?php 
	include_once "../librerias/estilos.php";
?>	
</head>
<body>
	<!-- Aqui es donde se despliega la tabla creada en el archivo tabla.php -->
	<div class="container">
		<div id="tablaPUESTO"></div>
	</div>
	
<!-- Inicia MODAL para registros nuevos -->
<!-- Modal AGREGAR-->
<div class="modal fade" id="ModalNuevoPUESTO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR PUESTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <label>Nombre PUESTO</label> -->
        <input type="text" name="" id="nombre" class="form-control input-sm" placeholder="Nombre" required />
 	      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success fa fa-circle" data-dismiss="modal" id="grabarPUESTO"> GRABAR</button>
      </div>
    </div>|
  </div>
</div>
<!-- TERMINA MODAL AGREGAR -->

<!-- Comienza MODAL Editar -->
<!-- Modal EDITAR-->
<div class="modal fade" id="ModalEditarPUESTO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR PUESTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="text" hidden="" id="idPUESTO" name="">

        <label>PUESTO</label>
        <input type="text" name="" id="nombreu" class="form-control input-sm">
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning fa fa-circle" id="actualizaDatosPUESTO" data-dismiss="modal"> ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
<!-- TERMINA MODAL EDITAR -->

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaPUESTO').load('../componentes/tabla_PUESTO.php');
	});
</script>

<script type="text/javascript">

//FUNCION QUE CONFIRMA SI SE QUIERE ELIMINAR UN REGISTRO DE PUESTO
function preguntarSiNo(id){

	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
		     function(){ eliminarDatos(id) }
           , function(){ alertify.error('Cancel')});
}

//FUNCION QUE HACE LA ELIMINACION DEL REGISTRO DE PUESTO
function eliminarDatos(id){
	cadena="idPUESTO=" + id;
	$.ajax({
		type:"POST",
		url:"../php/eliminarDatosPUESTO.php",
		data:cadena,
		success:function(r){
			if (r==1){
				$('#tablaPUESTO').load('../componentes/tabla_PUESTO.php');
				alertify.success("PUESTO eliminado con Exito");
			}else{
				alertify.error("Fallo la conexion al servidor:(");
			}

		}
	});
}


// CARGA DATOS PARA ACTUALIZARLOS
function agregarformPUESTO(datos){
	d=datos.split('||');
	$('#idPUESTO').val(d[0]);
	$('#nombreu').val(d[1]);
}

//FUNCION QUE ACTUALIZA UN REGISTRO PARA UN PUESTO.
function actualizaDatosPUESTO()
{
	id=$('#idPUESTO').val();

	nombre=$('#nombreu').val();

	cadena= "idPUESTO=" + id + 
			"&nombre_PUESTO=" + nombre;
	$.ajax ({

		type:"POST",
		url:"../php/actualizaDatosPUESTO.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tablaPUESTO').load('../componentes/tabla_PUESTO.php');
				alertify.success("PUESTO actualizado con exito :)");
			}else{
				alertify.error("Fallo la conexion al servidor de PUESTO :( ");
			}
		}
	});
}

// GRABAR DATOS EN LA TABLA
function grabardatosPUESTO(nombre){
	$.ajax({
		type:"POST",
		url:"../php/agregarPUESTO.php",
		data:"nombre="+ nombre,
		success:function(r){
			if(r==1){
				$('#tablaPUESTO').load('../componentes/tabla_PUESTO.php');
				alertify.success("PUESTO agregado con exito :)");
			}else{
				alertify.error("Fallo la conexion con el servidor :( ");
			}
		}
	});
}

$(document).ready(function(){
	$('#grabarPUESTO').click(function(){
		if ($('#nombre').val()=="")
		{
			alertify.alert('ERRROR','El campo NOMBRE es requerido');
			$("#nombre").focus();
			return false;
		}else{nombre=$('#nombre').val();}
			grabardatosPUESTO(nombre);
	});
	// VALIDA ACTUALIZA DATOS PUESTO
	$('#actualizaDatosPUESTO').click(function(){
		if ($('#nombreu').val()=="")
		{
			alertify.alert('ERRROR','El campo NOMBRE es requerido');
			$("#nombreu").focus();
			return false;
		}else{actualizaDatosPUESTO();}
			
	});
});
</script>
