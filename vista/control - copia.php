<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<title>FORMULARIO DE CONTROL</title>
<?php 
	include_once "../librerias/estilos.php";
	include_once "../php/conexion.php";
	$conexion=conexion();
	// AGREGAR
	$sql1="select * from empleado";
	$emp=mysqli_query($conexion,$sql1);
	$sql2="select * from kpi";
	$kpi=mysqli_query($conexion,$sql2);
	// ACTUALIZAR
	$sql3="select * from empleado";
	$emp2=mysqli_query($conexion,$sql3);
	$sql4="select * from kpi";
	$kpi2=mysqli_query($conexion,$sql4);


    date_default_timezone_set('America/Mexico_city');
    $fecha=date("Y-m-d");
    $tiempo=time(); 
    $hora=date("H", $tiempo);
    $minuto=date("i", $tiempo);
    $segundo=date("s", $tiempo);
?>	
</head>
<body>
	<!-- Aqui es donde se despliega la tabla creada en el archivo tabla.php -->
	<div class="container">
		<div id="tablaCONTROL"></div>
	</div>
	
<!-- Inicia MODAL para registros nuevos -->
<!-- Modal AGREGAR-->
<div class="modal fade" id="ModalNuevoCONTROL" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document" style="min-width:700px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<!-- EMPLEADO -->
    <div class="row">
      	<div class="col-6">
        <select name="" id="empleado" class="form-control input-sm">
        <option value="0">Empleado</option>
        <?php
            while ($filas=mysqli_fetch_array($emp))
            {  
             echo '<option>'.$filas['idEMPLEADO'].' - '.$filas['NOMBRE_EMP'].' '.$filas['APELLIDO_EMP'].'</option>';
            }
        ?>
    	</select>
    	</div>
    	<!-- FECHA -->
    	<div class="col-6">
	    	<input type="date" name="" id="fecha" class="form-control input-sm" value="<?= $fecha; ?>">
		</div>
	</div>

        <div class="row">
	    <!-- KPI -->
			<div class="col-6 mt-2 mb-2">
	        <select name="" id="kpi" class="form-control input-sm">
	        <option value="0">Kpi</option>
	        <?php
	            while ($filas=mysqli_fetch_array($kpi))
	            {  
	             echo '<option>'.$filas['idKPI'].' - '.$filas['NOMBRE_KPI'].'</option>';
	            }
	        ?>
	    	</select>
			</div>
	    <!-- HORA -->
    		<div class="col-2 mt-2 mb-2 margin-left">
		        <select name="" id="hora" class="form-control input-sm">
    			<option class="text-center"><?=$hora?></option>	        	
			        <?php
			            for ($i=0; $i<24; $i++) {
			            	if ($i < 10){$h='0'.$i;            	}
			            	else{$h=$i;}
							echo '<option>'.$h.'</option>';
						}?>
    			</select>
    		</div>
    	<!-- MINUTO -->
    		<div class="col-2 mt-2 mb-2">
		        <select name="" id="minuto" class="form-control input-sm mb-0">
		        <option class="text-center"><?=$minuto?></option>
			        <?php
			            for ($j=0; $j<60; $j++) {
			            	if ($j < 10){$m='0'.$j;            	}
			            	else{$m=$j;}
							echo '<option>'.$m.'</option>';
						}?>
				</select>
			</div>
		<!-- SEGUNDO -->
    		<div class="col-2 mt-2 mb-2">
		        <select name="" id="segundo" class="form-control input-sm mb-0">
       			<option class="text-center"><?=$segundo?></option>

			        <?php
			            for ($k=0; $k<60; $k++) {
			            	if ($k < 10){$s='0'.$k;            	}
			            	else{$s=$k;}
							echo '<option>'.$s.'</option>';
						}?>
				</select>
			</div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success fa fa-circle" data-dismiss="modal" id="grabarCONTROL"> GRABAR</button>
      </div>
    </div>|
  </div>
</div>
<!-- TERMINA MODAL AGREGAR -->

<!-- Comienza MODAL Editar -->
<!-- Modal EDITAR-->
<div class="modal fade" id="ModalEditarCONTROL" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR CONTROL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="text" hidden="" id="idCONTROL" name="">
      	<!-- EMPLEADO -->
        <select name="" id="empleadou" class="form-control input-sm">
        <option value="0">Empleado</option>
        <?php
            while ($filas=mysqli_fetch_array($emp2))
            {  
             echo '<option>'.$filas['NOMBRE_EMP'].' '.$filas['APELLIDO_EMP'].'</option>';
            }
        ?>
    	</select>
    	<!-- FECHA -->

	    <input type="date" name="" id="fechau" class="form-control input-sm">
	    <!-- HORA -->
        <!-- <label>Hora</label> -->
        <div class="row">
    		<div class="col-4 mt-2 mb-2 margin-left">
		        <select name="" id="horau" class="form-control input-sm">
    			<option class="text-center"></option>	        	
			        <?php
			            for ($i=0; $i<24; $i++) {
			            	if ($i < 10){$h='0'.$i;            	}
			            	else{$h=$i;}
							echo '<option>'.$h.'</option>';
						}?>
    			</select>
    		</div>
    		<div class="col-4 mt-2 mb-2">
		        <select name="" id="minutou" class="form-control input-sm mb-0">
		        <option class="text-center"><?=$minuto?></option>
			        <?php
			            for ($j=0; $j<60; $j++) {
			            	if ($j < 10){$m='0'.$j;            	}
			            	else{$m=$j;}
							echo '<option>'.$m.'</option>';
						}?>
				</select>
			</div>
    		<div class="col-4 mt-2 mb-2">
		        <select name="" id="segundou" class="form-control input-sm mb-0">
       			<option class="text-center"><?=$segundo?></option>

			        <?php
			            for ($k=0; $k<60; $k++) {
			            	if ($k < 10){$s='0'.$k;            	}
			            	else{$s=$k;}
							echo '<option>'.$s.'</option>';
						}?>
				</select>
			</div>
        </div>
	    <!-- KPI -->
        <select name="" id="kpiu" class="form-control input-sm">
        <option value="0">Kpi</option>
        <?php
            while ($filas=mysqli_fetch_array($kpi2))
            {  
             echo '<option>'.$filas['NOMBRE_KPI'].'</option>';
            }
        ?>
    	</select>
	  </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-warning fa fa-circle" id="actualizaDatosCONTROL" data-dismiss="modal"> ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
<!-- TERMINA MODAL EDITAR -->

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaCONTROL').load('../componentes/tabla_CONTROL.php');
	});
</script>

<script type="text/javascript">

//FUNCION QUE CONFIRMA SI SE QUIERE ELIMINAR UN REGISTRO DE CONTROL
function preguntarSiNo(id){

	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
		     function(){ eliminarDatos(id) }
           , function(){ alertify.error('Cancel')});
}

//FUNCION QUE HACE LA ELIMINACION DEL REGISTRO DE CONTROL
function eliminarDatos(id){
	cadena="idCONTROL=" + id;
	$.ajax({
		type:"POST",
		url:"../php/eliminarDatosCONTROL.php",
		data:cadena,
		success:function(r){
			if (r==1){
				$('#tablaCONTROL').load('../componentes/tabla_CONTROL.php');
				alertify.success("CONTROL eliminado con Exito");
			}else{
				alertify.error("Fallo la conexion al servidor:(");
			}

		}
	});
}


// CARGA DATOS PARA ACTUALIZARLOS
function agregarformCONTROL(datos){
	d=datos.split('||');
	e=d[4].split(':');
	nom=d[1];
	$('#idCONTROL').val(d[0]);
	$('#empleadou').val(d[1]+' '+d[2]);
	$('#fechau').val(d[3]);
	$('#horau').val(e[0]);
	$('#minutou').val(e[1]);
	$('#segundou').val(e[2]);
	$('#kpiu').val(d[5]);
}

//FUNCION QUE ACTUALIZA UN REGISTRO PARA UN CONTROL.
function actualizaDatosCONTROL()
{
	id=$('#idCONTROL').val();

	nombre=$('#empleadou').val();
	empleado=$('#empleadou').val();
	fecha=$('#fechau').val();
	hora=$('#horau').val();
	minuto=$('#minutou').val();
	segundo=$('#segundou').val();
	kpi=$('#kpiu').val();


	cadena= "idCONTROL=" + id + 
			"&empleado=" + empleado+
			"&fecha=" + fecha+
			"&hora=" + hora+
			"&minuto=" + minuto+
			"&segundo=" + segundo+
			"&kpi=" + kpi,
	$.ajax ({

		type:"POST",
		url:"../php/actualizaDatosCONTROL.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tablaCONTROL').load('../componentes/tabla_CONTROL.php');
				alertify.success("FORMULARIO actualizado con exito :)");
			}else{
				alertify.error("Fallo la conexion al servidor de CONTROL :( ");
			}
		}
	});
}

// GRABAR DATOS EN LA TABLA
function grabardatosCONTROL(empleado,fecha,hora,minuto,segundo,kpi){
	$.ajax({
		type:"POST",
		url:"../php/agregarCONTROL.php",
		data:"empleado="+empleado+"&fecha="+fecha+"&hora="+hora+"&minuto="+minuto+"&segundo="+segundo+"&kpi="+kpi,
		success:function(r){
			if(r==1){
				$('#tablaCONTROL').load('../componentes/tabla_CONTROL.php');
				alertify.success("ENCABEZADO agregado con exito :)");
			}else{
				alertify.error("Fallo la conexion con el servidor :( ");
			}
		}
	});
}

$(document).ready(function(){
	$('#grabarCONTROL').click(function(){

		if ($('#empleado').val()==0)
		{
			alertify.alert('ERRROR','El campo Empleado es requerido');
			$("#empleado").focus();
			return false;
		}else{	
				empleado=$('#empleado').val();
				fecha=$('#fecha').val();
			 }
		

		var tiempo=parseFloat($('#hora').val())+parseFloat($('#minuto').val())+parseFloat($('#segundo').val());
		console.log(fecha);

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

		if ($('#kpi').val()==0)
		{
			alertify.alert('ERRROR','El campo KPI es requerido');
			$("#kpi").focus();
			return false;
		}else{kpi=$('#kpi').val();}


			grabardatosCONTROL(empleado,fecha,hora,minuto,segundo,kpi);
	});
	$('#actualizaDatosCONTROL').click(function(){actualizaDatosCONTROL();});
});
</script>
