<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<title>INGRESO DE KPI</title>
<?php 
	include_once "../librerias/estilos.php";
?>	
</head>
<body>
	<!-- Aqui es donde se despliega la tabla creada en el archivo tabla.php -->
	<div class="container">
		<div id="tablaKPI"></div>
	</div>
	
<!-- Inicia MODAL para registros nuevos -->
<!-- Modal AGREGAR-->
<div class="modal fade" id="ModalNuevoKPI" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR KPI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <label>Nombre KPI</label> -->
        <input type="text" name="" id="nombre" class="form-control input-sm" placeholder="Kpi" required />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success fa fa-circle" data-dismiss="modal" id="grabarKPI"> GRABAR</button>
      </div>
    </div>|
  </div>
</div>
<!-- TERMINA MODAL AGREGAR -->

<!-- Comienza MODAL Editar -->
<!-- Modal EDITAR-->
<div class="modal fade" id="ModalEditarKPI" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR KPI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="text" hidden="" id="idKPI" name="">

        <!-- <label>NOMBRE KPI</label> -->
        <input type="text" name="" id="nombreu" class="form-control input-sm">
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning fa fa-circle" data-dismiss="modal" id="actualizaDatosKPI" > ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
<!-- TERMINA MODAL EDITAR -->

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaKPI').load('../componentes/tabla_KPI.php');
	});
</script>

<!-- FUNCION QUE CONFIRMA SI SE QUIERE ELIMINAR UN REGISTRO DE KPI -->
<script type="text/javascript">
function preguntarSiNo(id){

	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
		     function(){ eliminarDatos(id) }
           , function(){ alertify.error('Cancel')});
}

//FUNCION QUE HACE LA ELIMINACION DEL REGISTRO DE KPI
function eliminarDatos(id){
	cadena="idKPI=" + id;
	$.ajax({
		type:"POST",
		url:"../php/eliminarDatosKPI.php",
		data:cadena,
		success:function(r){
			if (r==1){
				$('#tablaKPI').load('../componentes/tabla_KPI.php');
				alertify.success("KPI eliminado con Exito");
			}else{
				alertify.error("Fallo la conexion al servidor:(");
			}

		}
	});
}


// CARGA DATOS PARA ACTUALIZARLOS
function agregarformKPI(datos){
	d=datos.split('||');
	$('#idKPI').val(d[0]);
	$('#nombreu').val(d[1]);
}

//FUNCION QUE ACTUALIZA UN REGISTRO PARA UN KPI.
function actualizaDatosKPI()
{
	id=$('#idKPI').val();

	nombre=$('#nombreu').val();

	cadena= "idKPI=" + id + 
			"&nombre_kpi=" + nombre;
	$.ajax ({

		type:"POST",
		url:"../php/actualizaDatosKPI.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tablaKPI').load('../componentes/tabla_KPI.php');
				alertify.success("KPI actualizado con exito :)");
			}else{
				alertify.error("Fallo la conexion al servidor de kpi :( ");
			}
		}
	});
}

// GRABAR DATOS EN LA TABLA
function grabardatosKPI(nombre){
	$.ajax({
		type:"POST",
		url:"../php/agregarKPI.php",
		data:"nombre=" + nombre,
		success:function(r){
			if(r==1){
				$('#tablaKPI').load('../componentes/tabla_KPI.php');
				alertify.success("KPI agregado con exito :)");
			}else{
				alertify.error("Fallo la conexion con el servidor :( ");
			}
		}
	});
}

$(document).ready(function(){
	$('#grabarKPI').click(function(){
		if ($('#nombre').val()=="")
		{
			alertify.alert('ERRROR','El campo NOMBRE es requerido');
			$("#nombre").focus();
			return false;
		}else{nombre=$('#nombre').val();}
			grabardatosKPI(nombre);
	});

	$('#actualizaDatosKPI').click(function(){
		if ($('#nombreu').val()=="")
		{
			alertify.alert('ERRROR','El campo NOMBRE es requerido');
			$("#nombreu").focus();
			return false;
		}else{actualizaDatosKPI();}
	});

});

</script>
