<?php 
require_once "conexion.php";
$conexion=conexion();
$id=$_POST['idDEPARTAMENTO'];
$n=$_POST['nombre_DEPARTAMENTO'];
$sql="UPDATE DEPARTAMENTO SET DEPARTAMENTO='$n' WHERE idDEPARTAMENTO='$id'";
	echo $resultado=mysqli_query($conexion,$sql);
?>