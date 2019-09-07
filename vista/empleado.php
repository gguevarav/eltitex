
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<title>INGRESO DE EMPLEADO</title>
<?php 
	include_once "../librerias/estilos.php";
	include_once "../php/conexion.php";
	$conexion=conexion();
	$p1="SELECT * FROM PUESTO";
	$p2="SELECT * FROM DEPARTAMENTO";
	$resultado1=mysqli_query($conexion,$p1);
	$resultado2=mysqli_query($conexion,$p2);
	// ACTUALIZAR
	$p3="SELECT * FROM PUESTO";
	$p4="SELECT * FROM DEPARTAMENTO";
	$resultado3=mysqli_query($conexion,$p3);
	$resultado4=mysqli_query($conexion,$p4);

?>	
</head>
<body>
	<!-- Aqui es donde se despliega la tabla creada en el archivo tabla.php -->
	<div class="container">
		<div id="tablaEMPLEADO"></div>
	</div>
	
<!-- Inicia MODAL para registros nuevos -->
<!-- Modal AGREGAR-->
<div class="modal fade" id="ModalNuevoEMPLEADO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR EMPLEADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <label>NOMBRE</label> -->
        <input type="text" name="" id="nombre" class="form-control input-sm" placeholder="Nombre" pattern="[A-Z]{1,15}">

        <!-- <label>APELLIDO</label> -->
        <input type="text" name="" id="apellido" class="form-control input-sm" placeholder="Apellido">

        <!-- <label>DPI</label> -->
        <input type="text" name="" id="dpi" class="form-control input-sm" placeholder="Dpi">

        <!-- <label>NIT</label> -->
        <input type="text" name="" id="nit" class="form-control input-sm" placeholder="Nit">

        <!-- <label>DIRECCION</label> -->
        <input type="text" name="" id="direccion" class="form-control input-sm" placeholder="Direccion">
        <!-- <label>PUESTO</label> -->
        <select name="" id="puesto" class="form-control input-sm">
        <option value="0">Puesto</option>
        <?php
            while ($filas=mysqli_fetch_array($resultado1))
            {  
             echo '<option>'.$filas['idPUESTO'].'-'.$filas['PUESTO'].'</option>';
            }
        ?>
    	</select>
        <!-- <label>DEPARTAMENTO</label> -->

        <select name="" id="departamento" class="form-control input-sm">
        <option value="0">Departamento</option>
        <?php
            while ($filas=mysqli_fetch_array($resultado2))
            {  
             echo '<option>'.$filas['idDEPARTAMENTO'].'-'.$filas['DEPARTAMENTO'].'</option>';
            }
        ?>
    	</select>

 	   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success fa fa-circle text-align center" data-dismiss="modal" id="grabarEMPLEADO"> GRABAR</button>
      </div>
    </div>|
  </div>
</div>
<!-- TERMINA MODAL AGREGAR -->

<!-- Comienza MODAL Editar -->
<!-- Modal EDITAR-->
<div class="modal fade" id="ModalEditarEMPLEADO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR EMPLEADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="text" hidden="" id="idEMPLEADO" name="">

        <label>NOMBRE EMPLEADO</label>
        <input type="text" name="" id="nombreu" class="form-control input-sm" placeholder="Nombre">

        <label>APELLIDO EMPLEADO</label>
        <input type="text" name="" id="apellidou" class="form-control input-sm" placeholder="Apellido">

        <label>DPI EMPLEADO</label>
        <input type="text" name="" id="dpiu" class="form-control input-sm" placeholder="Dpi">

        <label>NIT EMPLEADO</label>
        <input type="text" name="" id="nitu" class="form-control input-sm" placeholder="Nit">

        <label>DIRECCION</label>
        <input type="text" name="" id="direccionu" class="form-control input-sm" placeholder="direccion">

        <!-- <label>PUESTO</label> -->
        <select name="" id="puestou" class="form-control input-sm">
        <option value="0">Puesto</option>
        <?php
            while ($filas=mysqli_fetch_array($resultado3))
            {  
             echo '<option>'.$filas['PUESTO'].'</option>';
            }
        ?>
    	</select>
        <!-- <label>DEPARTAMENTO</label> -->
        <select name="" id="departamentou" class="form-control input-sm">
        <option value="0">Departamento</option>
        <?php
            while ($filas2=mysqli_fetch_array($resultado4))
            {  
             echo '<option>'.$filas2['DEPARTAMENTO'].'</option>';
            }
        ?>
    	</select>


	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning fa fa-circle" id="actualizaDatosEMPLEADO" data-dismiss="modal"> ACTUALIZAR </button>
      </div>
    </div>
  </div>
</div>
<!-- TERMINA MODAL EDITAR -->

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaEMPLEADO').load('../componentes/tabla_EMPLEADO.php');
	});
</script>

<script type="text/javascript">

//FUNCION QUE CONFIRMA SI SE QUIERE ELIMINAR UN REGISTRO DE EMPLEADO
function preguntarSiNo(id){

	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
		     function(){ eliminarDatos(id) }
           , function(){ alertify.error('Cancel')});
}

//FUNCION QUE HACE LA ELIMINACION DEL REGISTRO DE EMPLEADO
function eliminarDatos(id){
	cadena="idEMPLEADO=" + id;
	$.ajax({
		type:"POST",
		url:"../php/eliminarDatosEMPLEADO.php",
		data:cadena,
		success:function(r){
			if (r==1){
				$('#tablaEMPLEADO').load('../componentes/tabla_EMPLEADO.php');
				alertify.success("EMPLEADO eliminado con Exito");
			}else{
				alertify.error("Fallo la conexion al servidor:(");
			}

		}
	});
}


// CARGA DATOS PARA ACTUALIZARLOS
function agregarformEMPLEADO(datos){
	d=datos.split('||');
	$('#idEMPLEADO').val(d[0]);
	$('#nombreu').val(d[1]);
	$('#apellidou').val(d[2]);
	$('#dpiu').val(d[3]);
	$('#nitu').val(d[4]);
	$('#direccionu').val(d[5]);
	$('#puestou').val(d[6]);
	$('#departamentou').val(d[7]);

}

//FUNCION QUE ACTUALIZA UN REGISTRO PARA UN EMPLEADO.
function actualizaDatosEMPLEADO()
{
		id=$('#idEMPLEADO').val();
	nombre=$('#nombreu').val();
  apellido=$('#apellidou').val();
	   dpi=$('#dpiu').val();
	   nit=$('#nitu').val();
 direccion=$('#direccionu').val();
	puesto=$('#puestou').val();
	 depto=$('#departamentou').val();

	$.ajax ({

		type:"POST",
		url:"../php/actualizaDatosEMPLEADO.php",

		data:"idEMPLEADO="+id+"&nombreu="+nombre+"&apellidou="+apellido+"&dpiu="+dpi+"&nitu="+nit+"&direccionu="+direccion+"&puestou="+puesto+"&departamentou="+depto,

		success:function(r){
			if(r==1){
				$('#tablaEMPLEADO').load('../componentes/tabla_EMPLEADO.php');
				alertify.success("EMPLEADO actualizado con exito :)");
			}else{
				alertify.error("Fallo la conexion al servidor de EMPLEADO :( ");
			}
		}
	});
}

// GRABAR DATOS EN LA TABLA
function grabardatosEMPLEADO(nombre,apellido,dpi,nit,direccion,puesto,departamento){
	$.ajax({
		type:"POST",
		url:"../php/agregarEMPLEADO.php",
		data: "nombre=" + nombre +
			  "&apellido=" + apellido +
			  "&dpi=" + dpi +
			  "&nit=" + nit +
			  "&direccion=" + direccion +
			  "&puesto=" + puesto +
			  "&departamento=" + departamento,

		success:function(r){
			if(r==1){
				$('#tablaEMPLEADO').load('../componentes/tabla_EMPLEADO.php');
				alertify.success("EMPLEADO agregado con exito :)");
			}else{
				alertify.error("Fallo la conexion con el servidor :( ");
			}
		}
	});
}

$(document).ready(function(){
	$('#grabarEMPLEADO').click(function(){
// NOMBRE
		if ($('#nombre').val()==""){
			alertify.alert('ERRROR','El campo NOMBRE es requerido');
			$("#nombre").focus();
			return false;
		}else{nombre=$('#nombre').val();}
// APELLIDO
		if ($('#apellido').val()==""){
			alertify.alert('ERRROR','El campo APELLDIO es requerido');
			$("#apellido").focus();
			return false;
		}else{apellido=$('#apellido').val();}
// DPI
		// if($('#dpi').keypress()){
			// if (e.charCode < 48 || e.charCode > 57){
				// alertify.alert('CARACTER NO ACEPTADO');
				// return false;
			// } 
		// });

		if ($('#dpi').val()=="" || isNaN($('#dpi').val()) || $('#dpi').val().length != 13)
		{
			alertify.alert('ERRROR','El campo DPI es requerido con 13 digitos');
			$("#dpi").focus();
			return false;
		}
// NIT
		if ($('#nit').val()==""){
			alertify.alert('ERRROR','El campo NIT es requerido');
			$("#nit").focus();
			return false;
		}else{nit=$('#nit').val();}
// DIRECCION
		if ($('#direccion').val()==""){
			alertify.alert('ERRROR','El campo DIRECCION es requerido');
			$("#direccion").focus();
			return false;
		}else{direccion=$('#direccion').val();}
// PUESTO
		if ($('#puesto').val()==""){
			alertify.alert('ERRROR','El campo PUESTO es requerido');
			$("#puesto").focus();
			return false;
		}else{puesto=$('#puesto').val();}
// DEPARTAMENTO
		if ($('#departamento').val()==""){
			alertify.alert('ERRROR','El campo DEPARTAMENTO es requerido');
			$("#departamento").focus();
			return false;
		}else{departamento=$('#departamento').val();}

		grabardatosEMPLEADO(nombre,apellido,dpi,nit,direccion,puesto,departamento);
	});

// **********VALIDA ACTUALIZACION DE REGISTROS EMPLEADO 	
	$('#actualizaDatosEMPLEADO').click(function(){
// NOMBRE
		if ($('#nombreu').val()==""){
			alertify.alert('ERRROR','El campo NOMBRE es requerido');
			$("#nombreu").focus();
			return false;
		}
		// }else{nombre=$('#nombreu').val();}
// APELLIDO
		if ($('#apellidou').val()==""){
			alertify.alert('ERRROR','El campo APELLDIO es requerido');
			$("#apellidou").focus();
			return false;
		}
		// else{apellido=$('#apellidou').val();}

		if ($('#dpiu').val()=="" || isNaN($('#dpiu').val()) || $('#dpiu').val().length != 13)
		{
			alertify.alert('ERRROR','El campo DPI es requerido con 13 digitos');
			$("#dpiu").focus();
			return false;
		}
// NIT
		if ($('#nitu').val()==""){
			alertify.alert('ERRROR','El campo NIT es requerido');
			$("#nitu").focus();
			return false;
		}
		// else{nit=$('#nitu').val();}
// DIRECCION
		if ($('#direccionu').val()==""){
			alertify.alert('ERRROR','El campo DIRECCION es requerido');
			$("#direccionu").focus();
			return false;
		}
		// else{direccion=$('#direccionu').val();}
// PUESTO
		if ($('#puestou').val()==0){
			alertify.alert('ERRROR','El campo PUESTO es requerido');
			$("#puestou").focus();
			return false;
		}
		// else{puesto=$('#puestou').val();}
// DEPARTAMENTO
		if ($('#departamentou').val()==0){
			alertify.alert('ERRROR','El campo DEPARTAMENTO es requerido');
			$("#departamentou").focus();
			return false;
		}
		else{actualizaDatosEMPLEADO();}
			// departamento=$('#departamentou').val();}

		
	});
});
</script>