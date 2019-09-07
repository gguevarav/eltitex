<?php 
require_once "../php/conexion.php";
$conexion=conexion();

$i=$_POST['idKPI'];
$n=$_POST['nombre'];

$sql="INSERT INTO proceso (idKPI,nombre_PROCESO) VALUES ('$i','$n')";
	echo $resultado=mysqli_query($conexion,$sql);
?>

