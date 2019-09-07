<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<title>INGRESO DE DEPARTAMENTO</title>
<?php 
	include_once "../librerias/estilos.php";
?>	
<link href="../librerias/bootstrap/css/tabla.css" rel="stylesheet">
</head>
<body>
	<!-- Aqui es donde se despliega la tabla creada en el archivo tabla.php -->
	<div class="container">
		<div id="tablaDEPARTAMENTO"></div>
	</div>
	
<!-- Inicia MODAL para registros nuevos -->
<!-- Modal AGREGAR-->
<div class="modal fade" id="ModalNuevoDEPARTAMENTO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR DEPARTAMENTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <label>NOMBRE DEPARTAMENTO</label> -->
        <input type="text" name="" id="nombre" class="form-control input-sm" placeholder="nombre" required />
 	      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success fa fa-circle" data-dismiss="modal" id="grabarDEPARTAMENTO"> GRABAR</button>
      </div>
    </div>|
  </div>
</div>
<!-- TERMINA MODAL AGREGAR -->

<!-- Comienza MODAL Editar -->
<!-- Modal EDITAR-->
<div class="modal fade" id="ModalEditarDEPARTAMENTO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR DEPARTAMENTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="text" hidden="" id="idDEPARTAMENTO" name="">

        <label>NOMBRE DEPARTAMENTO</label>
        <input type="text" name="" id="nombreu" class="form-control input-sm">
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning fa fa-circle" id="actualizaDatosDEPARTAMENTO" data-dismiss="modal"> ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
<!-- TERMINA MODAL EDITAR -->

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDEPARTAMENTO').load('../componentes/tabla_DEPARTAMENTO.php');
	});
</script>

<script type="text/javascript">

//FUNCION QUE CONFIRMA SI SE QUIERE ELIMINAR UN REGISTRO DE DEPARTAMENTO
function preguntarSiNo(id){

	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
		     function(){ eliminarDatos(id) }
           , function(){ alertify.error('Cancel')});
}

//FUNCION QUE HACE LA ELIMINACION DEL REGISTRO DE DEPARTAMENTO
function eliminarDatos(id){
	cadena="idDEPARTAMENTO=" + id;
	$.ajax({
		type:"POST",
		url:"../php/eliminarDatosDEPARTAMENTO.php",
		data:cadena,
		success:function(r){
			if (r==1){
				$('#tablaDEPARTAMENTO').load('../componentes/tabla_DEPARTAMENTO.php');
				alertify.success("DEPARTAMENTO eliminado con Exito");
			}else{
				alertify.error("Fallo la conexion al servidor:(");
			}

		}
	});
}


// CARGA DATOS PARA ACTUALIZARLOS
function agregarformDEPARTAMENTO(datos){
	d=datos.split('||');
	$('#idDEPARTAMENTO').val(d[0]);
	$('#nombreu').val(d[1]);
}

//FUNCION QUE ACTUALIZA UN REGISTRO PARA UN DEPARTAMENTO.
function actualizaDatosDEPARTAMENTO()
{
	id=$('#idDEPARTAMENTO').val();

	nombre=$('#nombreu').val();

	cadena= "idDEPARTAMENTO=" + id + 
			"&nombre_DEPARTAMENTO=" + nombre;
	$.ajax ({

		type:"POST",
		url:"../php/actualizaDatosDEPARTAMENTO.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tablaDEPARTAMENTO').load('../componentes/tabla_DEPARTAMENTO.php');
				alertify.success("DEPARTAMENTO actualizado con exito :)");
			}else{
				alertify.error("Fallo la conexion al servidor de DEPARTAMENTO :( ");
			}
		}
	});
}

// GRABAR DATOS EN LA TABLA
function grabardatosDEPARTAMENTO(nombre){
	$.ajax({
		type:"POST",
		url:"../php/agregarDEPARTAMENTO.php",
		data:"nombre="+ nombre,
		success:function(r){
			if(r==1){
				$('#tablaDEPARTAMENTO').load('../componentes/tabla_DEPARTAMENTO.php');
				alertify.success("DEPARTAMENTO agregado con exito :)");
			}else{
				alertify.error("Fallo la conexion con el servidor :( ");
			}
		}
	});
}

$(document).ready(function(){
	$('#grabarDEPARTAMENTO').click(function(){
		if ($('#nombre').val()=="")
		{
			alertify.alert('ERRROR','El campo NOMBRE es requerido');
			$("#nombre").focus();
			return false;
		}else{nombre=$('#nombre').val();}
			grabardatosDEPARTAMENTO(nombre);
	});
	$('#actualizaDatosDEPARTAMENTO').click(function(){
		if ($('#nombreu').val()=="")
		{
			alertify.alert('ERRROR','El campo NOMBRE es requerido');
			$("#nombreu").focus();
			return false;
		}else{actualizaDatosDEPARTAMENTO();}
	});
});
</script>
