<?php 
require_once "../php/conexion.php";
$conexion=conexion();

$n=$_POST['nombre'];
$a=$_POST['apellido'];
$d=$_POST['dpi'];
$i=$_POST['nit'];
$r=$_POST['direccion'];
$p=$_POST['puesto'];
$t=$_POST['departamento'];

$sql="INSERT INTO EMPLEADO (NOMBRE_EMP, APELLIDO_EMP, DPI_EMP, NIT_EMP, DIRECCION_EMP, idPUESTO, idDEPARTAMENTO) VALUES('$n','$a','$d','$i','$r','$p','$t')";
	echo $resultado=mysqli_query($conexion,$sql);

?>