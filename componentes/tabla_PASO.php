<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<title>INGRESO DE PROCESOS</title>
<?php 
	include_once "../librerias/estilos.php";
	include_once "../php/conexion.php";

	$conexion=conexion();
	$sql="SELECT * FROM KPI";
	$resultado=mysqli_query($conexion,$sql);
	$sql2="SELECT * FROM KPI";
	$resultado2=mysqli_query($conexion,$sql2);

?>	
</head>
<body>
	<!-- Aqui es donde se despliega la tabla creada en el archivo tabla.php -->
	<div class="container">
		<div id="tablaPROCESO"></div>
	</div>
	
<!-- Inicia MODAL para registros nuevos -->
<!-- Modal AGREGAR-->
<div class="modal fade" id="ModalNuevoPROCESO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR PROCESO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- <label>KPI</label> -->
        <select name="" id="idKPI" class="form-control input-sm">
        <option value="0">Kpi</option>
        <?php
            while ($filas=mysqli_fetch_array($resultado))
            {  
             echo '<option>'.$filas['idKPI'].'-'.$filas['NOMBRE_KPI'].'</option>';
            }
        ?>
    	</select>

        <!-- <label>PROCESO</label> -->
        <input type="text" name="" id="nombre" class="form-control input-sm" placeholder="Proceso" required />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success fa fa-circle" data-dismiss="modal" id="grabarPROCESO"> GRABAR</button>
      </div>
    </div>|
  </div>
</div>
<!-- TERMINA MODAL AGREGAR -->

<!-- Comienza MODAL Editar -->
<!-- Modal EDITAR-->
<div class="modal fade" id="ModalEditarPROCESO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR PROCESO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="number" hidden="" id="idPROCESOu" name="">

        <!-- <label>KPI</label> -->

        <select name="" id="idKPIu" class="form-control input-sm">
        <option value="0">Kpi</option>
        <?php
            while ($filas=mysqli_fetch_array($resultado2))
            {  
             echo '<option>'.$filas['NOMBRE_KPI'].'</option>';
            }
        ?>

<!--         <label>NOMBRE PROCESO</label>
 -->        <input type="text" name="" id="nombreu" class="form-control input-sm">
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning fa fa-circle" id="actualizaDatosPROCESO" data-dismiss="modal"> ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
<!-- TERMINA MODAL EDITAR -->

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaPROCESO').load('../componentes/tabla_PROCESO.php');
	});
</script>

<script type="text/javascript">

//FUNCION QUE CONFIRMA SI SE QUIERE ELIMINAR UN REGISTRO DE KPI
function preguntarSiNo(id){

	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
		     function(){ eliminarDatos(id) }
           , function(){ alertify.error('Cancel')});
}

//FUNCION QUE HACE LA ELIMINACION DEL REGISTRO DE KPI
function eliminarDatos(id){
	cadena="idPROCESO=" + id;
	$.ajax({
		type:"POST",
		url:"../php/eliminarDatosPROCESO.php",
		data:cadena,
		success:function(r){
			if (r==1){
				$('#tablaPROCESO').load('../componentes/tabla_PROCESO.php');
				alertify.success("PROCESO eliminado con Exito");
			}else{
				alertify.error("Fallo la conexion al servidor:(");
			}

		}
	});
}


// CARGA DATOS PARA ACTUALIZARLOS
function agregarformPROCESO(datos){
	d=datos.split('||');
	$('#idPROCESOu').val(d[0]);
	$('#idKPIu').val(d[1]);
	$('#nombreu').val(d[2]);
}

//FUNCION QUE ACTUALIZA UN REGISTRO PARA UN KPI.
function actualizaDatosPROCESO()
{
	idPROCESO=$('#idPROCESOu').val();	
		idKPI=$('#idKPIu').val();
	   nombre=$('#nombreu').val();
	$.ajax ({

		type:"POST",
		url:"../php/actualizaDatosPROCESO.php",
		data:"idPROCESOu=" + idPROCESO + "&idKPIu=" + idKPI + "&nombreu=" + nombre,


		success:function(r){
			if(r==1){
				$('#tablaPROCESO').load('../componentes/tabla_PROCESO.php');
				alertify.success("PROCESO actualizado con exito :)");
			}else{
				alertify.error("Fallo la conexion al servidor de PROCESO :( ");
			}
		}
	});
}

// GRABAR DATOS EN LA TABLA
function grabardatosPROCESO(idKPI,nombre){

	$.ajax({
		type:"POST",
		url:"../php/agregarPROCESO.php",
		data:"idKPI="+ idKPI+"&nombre="+ nombre,
		success:function(r){
			if(r==1){
				$('#tablaPROCESO').load('../componentes/tabla_PROCESO.php');
				alertify.success("PROCESO agregado con exito :)");
			}else{
				alertify.error("Fallo la conexion con el servidor :( ");
			}
		}
	});
}

$(document).ready(function(){
	$('#grabarPROCESO').click(function(){
		if ($('#idKPI').val()=="")
		{
			alertify.alert('ERRROR','El campo ID KPI es requerido');
			$("#idKPI").focus();
			return false;
		}else{idKPI=$('#idKPI').val();}

		if ($('#nombre').val()=="")
		{
			alertify.alert('ERRROR','El campo nombre es requerido');
			$("#nombre").focus();
			return false;
		}else{nombre=$('#nombre').val();}

		grabardatosPROCESO(idKPI,nombre);
	});
	// VALIDA DATOS ACTUALIZAR
	$('#actualizaDatosPROCESO').click(function(){
		if ($('#idKPIu').val()==0)
		{
		alertify.alert('ERRROR','El campo KPI es requerido');
		$("#idKPIu").focus();
		return false;
		}
		if ($('#nombreu').val()=="")
			{
				alertify.alert('ERRROR','El campo NOMBRE es requerido');
				$("#nombreu").focus();
				return false;
			}else{actualizaDatosPROCESO();}
	});
});
</script>
