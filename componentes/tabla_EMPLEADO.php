<?php 
	require_once "../php/conexion.php";
	$conexion=conexion();
?>
<link href="../librerias/bootstrap/css/tabla.css" rel="stylesheet">
<head>
	<img id="logo" src="../librerias/img/fondos/logo1.png">
</head>
<body>
<div class="row">
	<div class="col-sm-12">
		<h2>TABLA EMPLEADO</h2>
		<caption>
			<button class="btn btn-success" data-toggle="modal" data-target="#ModalNuevoEMPLEADO"> AGREGAR EMPLEADO</button>
		</caption>
		<br>
		<br>
		<table class="table table-hover table-condensed table-bordered table-sm">
		<thead>
			<tr>
				<th class="text-center"><h5>NOMBRE<h5></th>
				<th class="text-center"><h5>APELLIDO<h5></th>
				<th class="text-center"><h5>DPI<h5></th>
				<th class="text-center"><h5>NIT<h5></th>
				<th class="text-center"><h5>DIRECCION<h5></th>
				<th class="text-center"><h5>PUESTO<h5></th>
				<th class="text-center"><h5>DEPTO<h5></th>
				<th class="text-center"><h5>EDITAR</h5></th>
				<th class="text-center"><h5>ELIMINAR</h5></th>
			</tr>
		</thead>
			<?php 
				$sql="SELECT idEMPLEADO, NOMBRE_EMP, APELLIDO_EMP, DPI_EMP, NIT_EMP, DIRECCION_EMP, PUESTO, DEPARTAMENTO FROM EMPLEADO E INNER JOIN PUESTO P ON E.idPUESTO = P.idPUESTO INNER JOIN DEPARTAMENTO D ON E.idDEPARTAMENTO= D.idDEPARTAMENTO";
				
				$resultado= mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($resultado)){
					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4]."||".
						   $ver[5]."||".
						   $ver[6]."||".
						   $ver[7];
				?>
			<tr>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
				<td><?php echo $ver[5] ?></td>
				<td><?php echo $ver[6] ?></td>
				<td><?php echo $ver[7] ?></td>
			
				<td class="text-center">
					<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalEditarEMPLEADO" onclick="agregarformEMPLEADO('<?php echo $datos ?>')">Editar
					</button>
				</td>
				<td class="text-center">
					<button class="btn btn-danger btn-sm" onclick="preguntarSiNo('<?php echo $ver[0] ?>')">Eliminar</button>
				</td>
			</tr>
			<?php 
			}
			?>
		</table>
	</div>
</div>
</body>