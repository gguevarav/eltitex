<?php 
	require_once "../php/conexion.php";
	$conexion=conexion();
?>
<link href="../librerias/bootstrap/css/tabla.css" rel="stylesheet">
<head>
	<img id="logo" src="../librerias/img/fondos/logo1.png">
</head>
<div class="row">
	<div class="col-sm-12">
		<h2>TABLA DEPARTAMENTOS</h2>
		<caption>
			<button class="btn btn-success" data-toggle="modal" data-target="#ModalNuevoDEPARTAMENTO"> AGREGAR DEPARTAMENTO</button>
		</caption>
		<br>
		<br>
		<table class="table table-hover table-condensed table-bordered table-sm">
		<thead>
			<tr>
				<th class="text-center"><h3>Nombre<h3></th>
				<th class="text-center"><h3>Editar</h3></th>
				<th class="text-center"><h3>Eliminar</h3></th>
			</tr>
		</thead>	
			<?php 
				$sql="SELECT idDEPARTAMENTO, DEPARTAMENTO FROM DEPARTAMENTO";
				$resultado= mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($resultado)){
					$datos=$ver[0]."||".
						   $ver[1];
				?>
			<tr>
				<td><?php echo $ver[1] ?></td>
			
				<td class="text-center">
					<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalEditarDEPARTAMENTO" onclick="agregarformDEPARTAMENTO('<?php echo $datos ?>')">Editar
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