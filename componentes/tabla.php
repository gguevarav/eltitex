<?php 
	require_once "../php/conexion.php";
	$conexion=conexion();
?>
<div class="row">
	<div class="col-sm-12">
		<h2>Tabla Dinamica</h2>
		<caption>
			<button class="btn btn-success" data-toggle="modal" data-target="#ModalNuevo"> Agregar</button>
		</caption>
		<br>
		<br>
		<table class="table table1 table-hover table-condensed table-bordered table-sm">
			<tr>
				<td class="text-center"><h3>Nombre<h3></td>
				<td class="text-center"><h3>Apellido</h3></td>
				<td class="text-center"><h3>Email</h3></td>
				<td class="text-center"><h3>Telefono</h3></td>
				<td class="text-center"><h3>Editar</h3></td>
				<td class="text-center"><h3>Eliminar</h3></td>
			</tr>
			<?php 
				$sql="SELECT id,nombre,apellido,email,telefono FROM t_persona";
				$resultado= mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($resultado)){

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4];
			?>
			<tr>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
			
				<td class="text-center">
					<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalEditar" onclick="agregaform('<?php echo $datos ?>')">Editar
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