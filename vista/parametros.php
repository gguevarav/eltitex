<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<title>INGRESO DE PARAMETROS</title>
<?php 
	include_once "../librerias/estilos.php";
	include_once "../php/conexion.php";

	$conexion=conexion();
	$sql="SELECT * FROM PROCESO";
	$resultado=mysqli_query($conexion,$sql);
	$sql2="SELECT * FROM PROCESO";
	$resultado2=mysqli_query($conexion,$sql2);

?>
</head>
<body>
	<!-- Aqui es donde se despliega la tabla creada en el archivo tabla.php -->
	<div class="container">
		<div id="tablaPARAMETRO"></div>
	</div>
	
<!-- Inicia MODAL para registros nuevos -->
<!-- Modal AGREGAR-->
<div class="modal fade" id="ModalNuevoPARAMETRO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR PARAMETRO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- <label>PROCESO</label> -->
        <select name="" id="idPROCESO" class="form-control input-sm">
        <option value="0">Proceso</option>
        <?php
            while ($filas=mysqli_fetch_array($resultado))
            {  
             echo '<option>'.$filas['idPROCESO'].'-'.$filas['NOMBRE_PROCESO'].'</option>';
            }
        ?>
    	</select>

        <!-- <label>Hora</label> -->
        <div class="row">
    		<div class="col-4 mt-2 mb-2 margin-left">
    			<option class="text-center">hh</option>
		        <select name="" id="hora" class="form-control input-sm">
			        <?php
			            for ($i=0; $i<24; $i++) {
			            	if ($i < 10){$h='0'.$i;            	}
			            	else{$h=$i;}
							echo '<option>'.$h.'</option>';
						}?>
    			</select>

				</div>
    		<div class="col-4 mt-2 mb-2">
    			<option class="text-center">mm</option>
		        <select name="" id="minuto" class="form-control input-sm mb-0">
			        <?php
			            for ($j=0; $j<60; $j++) {
			            	if ($j < 10){$m='0'.$j;            	}
			            	else{$m=$j;}
							echo '<option>'.$m.'</option>';
						}?>
				</select>
			</div>
    		<div class="col-4 mt-2 mb-2">
    			<option class="text-center">ss</option>
		        <select name="" id="segundo" class="form-control input-sm mb-0">
			        <?php
			            for ($k=0; $k<60; $k++) {
			            	if ($k < 10){$s='0'.$k;            	}
			            	else{$s=$k;}
							echo '<option>'.$s.'</option>';
						}?>
				</select>
			</div>
        </div>
    <div>
        <input type="text" name="" id="nombre_parametro" class="form-control input-sm mb-0" placeholder="Nombre"> 
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
<div class="modal fade" id="ModalEditarPARAMETRO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">ACTUALIZAR PARAMETRO</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="number" hidden="" id="idPARAMETROu" name="">
        <!-- <label>PARAMETRO</label> -->
 
	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning fa fa-circle" id="actualizaDatosPARAMETRO" data-dismiss="modal"> ACTUALIZAR</button>
	      </div>  
    </div>
  </div>
</div>
</div>
<!-- TERMINA MODAL EDITAR -->

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaPARAMETRO').load('../componentes/tabla_PARAMETRO.php');
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
	cadena="idPARAMETRO=" + id;
	$.ajax({
		type:"POST",
		url:"../php/eliminarDatosPARAMETRO.php",
		data:cadena,
		success:function(r){
			if (r==1){
				$('#tablaPARAMETRO').load('../componentes/tabla_PARAMETRO.php');
				alertify.success("PARAMETRO eliminado con Exito");
			}else{
				alertify.error("Fallo la conexion al servidor :( ");
			}
		}
	});
}


// CARGA DATOS PARA ACTUALIZARLOS
function agregarformPARAMETRO(datos){
	d=datos.split('||');
	e=d[2].split(':');
	$('#idPARAMETROu').val(d[0]);
	$('#idPROCESOu').val(d[1]);
	$('#horau').val(e[0]);
	$('#minutou').val(e[1]);
	$('#segundou').val(e[2]);
	$('#nombrepu').val(d[3]);

}

//FUNCION QUE ACTUALIZA UN REGISTRO PARA UN KPI.
function actualizaDatosPARAMETRO()
{
	 idPARAMETRO=$('#idPARAMETROu').val();	
	   idPROCESO=$('#idPROCESOu').val();
	   hora=$('#horau').val();
   	   minuto=$('#minutou').val();
	   segundo=$('#segundou').val();
	   nombre=$('#nombrepu').val();

	$.ajax ({

		type:"POST",
		url:"../php/actualizaDatosPARAMETRO.php",
		data:"idPARAMETROu="+idPARAMETRO+"&idPROCESOu="+idPROCESO+"&horau="+hora+"&minutou="+minuto+"&segundou="+segundo+"&nombrepu="+nombre,
		success:function(r){
			if(r==1){
				$('#tablaPARAMETRO').load('../componentes/tabla_PARAMETRO.php');
				alertify.success("PARAMETRO actualizado con exito :)");
			}else{
				alertify.error("Fallo la conexion al servidor de PARAMETRO :( ");
			}
		}
	});
}

// GRABAR DATOS EN LA TABLA
function grabardatosPROCESO(idPROCESO,hora,minuto,segundo,nombre){

	$.ajax({
		type:"POST",
		url:"../php/agregarPARAMETRO.php",
		data:"idPROCESO="+ idPROCESO+"&hora="+ hora+"&minuto="+minuto+"&segundo="+segundo+"&nombre_parametro="+nombre ,
		success:function(r){
			if(r==1){
				$('#tablaPARAMETRO').load('../componentes/tabla_PARAMETRO.php');
				alertify.success("PARAMETRO agregado con exito :)");
			}else{
				alertify.error("Fallo la conexion al servidor de PROCESO :( ");
			}
		}
	});
}

$(document).ready(function(){
	$('#grabarPROCESO').click(function(){
		if ($('#idPROCESO').val()==0)
		{
			alertify.alert('ERRROR','El campo PROCESO es requerido');
			$("#idPROCESO").focus();
			return false;
		}else{idPROCESO=$('#idPROCESO').val();}

		var tiempo=parseFloat($('#hora').val())+parseFloat($('#minuto').val())+parseFloat($('#segundo').val());
		// console.log(fecha);

		if (tiempo==0)
		{
			alertify.alert('ERRROR','El campo HH:MM:SS  es requerido');
			$("#hora").focus();
			return false;
		}else{
			hora=$('#hora').val();
			minuto=$('#minuto').val();
			segundo=$('#segundo').val();
		}


		if ($('#nombre_parametro').val()==0)
		{
			alertify.alert('ERRROR','El campo NOMBRE es requerido');
			$("#nombre_parametro").focus();
			return false;
		}else{nombre=$('#nombre_parametro').val();}

		grabardatosPROCESO(idPROCESO,hora,minuto,segundo,nombre);
	});

	// VALIDA ACTUALIZA PARAMETRO
	$('#actualizaDatosPARAMETRO').click(function()
	{
		actualizaDatosPARAMETRO();
	});
});
</script>
