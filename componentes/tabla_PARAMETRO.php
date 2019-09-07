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
		<h2>TABLA PARAMETROS</h2>
		<caption>
			<button class="btn btn-success" data-toggle="modal" data-target="#ModalNuevoPARAMETRO"> AGREGAR PARAMETRO</button>
		</caption>
		<br>
		<br>
		<table class="table table-hover table-condensed table-bordered table-sm">
		<thead>
			<tr>
				<th class="text-center"><h3>PROCESO<h3></th>
				<th class="text-center"><h3>TIEMPO_BASE<h3></th>
				<th class="text-center"><h3>NOMBRE_PARAMETRO<h3></th>					
				<th class="text-center"><h3>EDITAR</h3></th>
				<th class="text-center"><h3>ELIMINAR</h3></th>
			</tr>
		</thead>
			<?php 
				$sql="SELECT idPARAMETROS, NOMBRE_PROCESO, TIEMPO_BASE, NOMBRE_PARAMETRO FROM PARAMETROS P INNER JOIN PROCESO K ON P.idPROCESO = K.idPROCESO";
				$resultado= mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($resultado)){
					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3];
				?>
			<tr>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
			
				<td class="text-center">
					<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalEditarPARAMETRO" onclick="agregarformPARAMETRO('<?php echo $datos ?>')">EDITAR
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