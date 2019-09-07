<?php 
require_once "../php/conexion.php";
$conexion=conexion();

$idp=$_POST['idPARAMETROu'];
$id=$_POST['idPROCESOu'];
$h=$_POST['horau'];
$m=$_POST['minutou'];
$s=$_POST['segundou'];
$p=$_POST['nombrepu'];
$tiempo=$h.$m.$s;

$c="SELECT idPROCESO FROM PROCESO WHERE NOMBRE_PROCESO='$id'";
$co=mysqli_query($conexion,$c);

while ($filas=mysqli_fetch_array($co))
	{$con=$filas;}

$sql="UPDATE PARAMETROS SET idPROCESO='$con[0]', TIEMPO_BASE='$tiempo', NOMBRE_PARAMETRO='$p' WHERE idPARAMETROS='$idp'";
	echo $resultado=mysqli_query($conexion,$sql);
?>