<?php 
require_once "../php/conexion.php";
$conexion=conexion();

$e=$_POST['empleado'];
$f=$_POST['fecha'];
$h=$_POST['hora'];
$m=$_POST['minuto'];
$s=$_POST['segundo'];
$k=$_POST['kpi'];

$t=$h.$h.$s;

$sql="INSERT INTO FORMULARIO_ENCA (idEMPLEADO,FECHA_FORMULARIO,HORA_FORMULARIO, idKPI) VALUES ('$e','$f','$t','$k')";
	echo $resultado=mysqli_query($conexion,$sql);
?>

