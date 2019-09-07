<?php 
require_once "conexion.php";
$conexion=conexion();

$id=$_POST['idPUESTO'];
$n=$_POST['nombre_PUESTO'];

$sql="UPDATE PUESTO SET PUESTO='$n' WHERE idPUESTO='$id'";
	echo $resultado=mysqli_query($conexion,$sql);
?>