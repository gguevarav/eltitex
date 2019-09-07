<?php 
require_once "../php/conexion.php";
$conexion=conexion();

$i=$_POST['idCONTROL'];
$e=$_POST['empleado'];
$f=$_POST['fecha'];
$h=$_POST['hora'];
$m=$_POST['minuto'];
$s=$_POST['segundo'];
$p=$_POST['kpi'];
$tiempo=$h.$m.$s;


$kp="SELECT idKPI FROM KPI WHERE NOMBRE_KPI='$p'";
$ki=mysqli_query($conexion,$kp);
while ($filas1=mysqli_fetch_array($ki))
	{$k=$filas1;}


$c="SELECT idEMPLEADO FROM EMPLEADO WHERE CONCAT(NOMBRE_EMP,' ',APELLIDO_EMP)='$e'";
$co=mysqli_query($conexion,$c);
while ($filas=mysqli_fetch_array($co))
	{$con=$filas;}


$sql="UPDATE FORMULARIO_ENCA SET idEMPLEADO='$con[0]', FECHA_FORMULARIO='$f', HORA_FORMULARIO='$tiempo',idKPI='$k[0]' WHERE idFORMULARIO_ENCA='$i'";
	echo $resultado=mysqli_query($conexion,$sql);
?>