<?php 
	require_once "../php/conexion.php";
	$conexion=conexion();
?>
<link href="../librerias/bootstrap/css/tabla.css" rel="stylesheet">
<head>
	<img id="logo" src="../librerias/img/fondos/logo1.png">
</head>
<body>
<div id="main-container" class="row ">
	<div class="col-sm-12">
		<h2>TABLA CONTROL</h2>
		<caption>
			<button class="btn btn-success" data-toggle="modal" data-target="#ModalNuevoCONTROL"> AGREGAR</button>
		</caption>
		<br>
		<br>
		<table class="table table-hover table-condensed table-bordered table-sm">
		<thead>
			<tr>
				<th class="text-center"><h6>NOMBRE<h6></th>
				<th class="text-center"><h6>APELLIDO<h6></th>
				<th class="text-center"><h6>FECHA<h6></th>
				<th class="text-center"><h6>HORA<h6></th>
				<th class="text-center"><h6>KPI<h6></th>
				<th class="text-center"><h6>EDITAR</h6></th>
				<th class="text-center"><h6>ELIMINAR</h6></th>
				<th class="text-center"><h6>DETALLE</h6></th>
			</tr>
		</thead>
			<?php 
				$sql="SELECT idFORMULARIO_ENCA, NOMBRE_EMP, APELLIDO_EMP, FECHA_FORMULARIO, HORA_FORMULARIO, NOMBRE_KPI FROM FORMULARIO_ENCA F INNER JOIN EMPLEADO E ON F.IdEMPLEADO= E.IdEMPLEADO INNER JOIN KPI K ON F.idKPI = K.idKPI";
				$resultado=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($resultado)){
					$datos=$ver[0]."||".
					       $ver[1]."||".
					       $ver[2]."||".
					       $ver[3]."||".
					       $ver[4]."||".
						   $ver[5];
			?>
			<tr>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
			    <td><?php echo $ver[5] ?></td>
				<td class="text-center">
					<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalEditarCONTROL" onclick="agregarformCONTROL('<?php echo $datos ?>')">Editar
					</button>
				</td>
				<td class="text-center">
					<button class="btn btn-danger btn-sm" onclick="preguntarSiNo('<?php echo $ver[0] ?>')">Eliminar</button>
				</td>

				<td class="text-center">
					<button class="btn btn-danger btn-sm" onclick="preguntarSiNo('<?php echo $ver[0] ?>')">Detalle</button>
				</td>

			</tr>
			<?php 
			}
			?>
		</table>
	</div>
</div>
</body>