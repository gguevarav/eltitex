<?php 
require_once "../php/conexion.php";
$conexion=conexion();
$id=$_POST['idKPI'];
$n=$_POST['nombreu'];

$sql="UPDATE KPI SET nombre_kpi='$n'
		WHERE idKPI='$id'";
	echo $resultado=mysqli_query($conexion,$sql);
?>