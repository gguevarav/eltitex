
function grabardatos(nombre,apellido,email,telefono){
	$.ajax({
		type:"POST",
		url:"../php/agregarDatos.php",
		data:"nombre="+ nombre + "&apellido=" + apellido + "&email=" + email + "&telefono=" + telefono,
		success:function(r){
			if(r==1){
				$('#tabla').load('../componentes/tabla.php');
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :( ");
			}
		}
	});
}

// FUNCION QUE LLENA EL FORMULARIO CUANDO SE ACTUALIZA UN KPI
function agregaformKPI(datos){
	
	d=datos.split('||');
	$('#idKPI').val(d[0]);
	$('#nombreu').val(d[1]);
}

//FUNCION QUE ACTUALIZA UN REGISTRO PARA UN KPI.
function actualizarDatosKPI(){
	id=$('#idKPI').val();
	nombre=$('#nombreu').val();

	cadena= "idKPI=" + id + 
			"&nombre_kpi=" + nombre;
	$.ajax({
		type:"POST",
		url:"../php/ActualizaDatosKPI.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tablakpi').load('../componentes/tabla_kpi.php');
				alertify.success("KPI actualizado con exito :)");
			}else{
				alertify.error("Fallo la conexion al servidor :( ");
			}
		}
	});
}

//FUNCION QUE CONFIRMA SI SE QUIERE ELIMINAR UN REGISTRO DE KPI
function preguntarSiNo(id){

	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
		     function(){ eliminarDatos(id) }
           , function(){ alertify.error('Cancel')});
}

//FUNCION QUE HACE LA ELIMINACION DEL REGISTRO DE KPI
function eliminarDatos(id){
	cadena="id=" + id;
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
