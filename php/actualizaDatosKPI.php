<?php 
require_once "conexion.php";
$conexion=conexion();
$id=$_POST['idKPI'];
$n=$_POST['nombre_kpi'];

$sql="UPDATE KPI SET nombre_kpi='$n' WHERE idKPI='$id'";
	echo $resultado=mysqli_query($conexion,$sql);
?>