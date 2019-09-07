<?php 
require_once "../php/conexion.php";
$conexion=conexion();

$n=$_POST['nombre'];

$sql="INSERT INTO PUESTO (PUESTO)
			VALUES('$n')";
	echo $resultado=mysqli_query($conexion,$sql);
?>