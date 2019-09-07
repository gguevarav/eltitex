<?php 
require_once "../php/conexion.php";
$conexion=conexion();

$n=$_POST['nombre'];
$a=$_POST['apellido'];
$e=$_POST['email'];
$t=$_POST['telefono'];

$sql="INSERT INTO t_persona (nombre,apellido,email,telefono)
			VALUES('$n','$a','$e','$t')";
	echo $resultado=mysqli_query($conexion,$sql);
?>