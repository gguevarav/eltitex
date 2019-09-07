<?php 
require_once "../php/conexion.php";
$conexion=conexion();

$id=$_POST['idEMPLEADO'];
$n=$_POST['nombreu'];
$a=$_POST['apellidou'];
$d=$_POST['dpiu'];
$i=$_POST['nitu'];
$r=$_POST['direccionu'];
$p=$_POST['puestou'];
$t=$_POST['departamentou'];

$c="SELECT idPUESTO FROM PUESTO WHERE PUESTO='$p'";
$co=mysqli_query($conexion,$c);
while ($filas=mysqli_fetch_array($co))
	{$con=$filas;}

$c1="SELECT idDEPARTAMENTO FROM DEPARTAMENTO WHERE DEPARTAMENTO='$t'";
$co1=mysqli_query($conexion,$c1);
while ($filas1=mysqli_fetch_array($co1))
	{$con1=$filas1;}


$sql="UPDATE EMPLEADO SET NOMBRE_EMP='$n', APELLIDO_EMP='$a', DPI_EMP='$d' , NIT_EMP='$i',DIRECCION_EMP='$r',idPUESTO='$con[0]', idDEPARTAMENTO='$con1[0]' WHERE idEMPLEADO='$id'";

echo $resultado=mysqli_query($conexion,$sql);
?>