<?php 
require_once "../php/conexion.php";
$conexion=conexion();

$idp=$_POST['idPROCESOu'];
$id=$_POST['idKPIu'];
$n=$_POST['nombreu'];

$c="SELECT idKPI FROM KPI WHERE NOMBRE_KPI='$id'";
$co=mysqli_query($conexion,$c);

while ($filas=mysqli_fetch_array($co))
	{$con=$filas;}


$sql="UPDATE PROCESO SET idKPI='$con[0]', nombre_PROCESO='$n' WHERE idPROCESO='$idp'";
	echo $resultado=mysqli_query($conexion,$sql);
?>