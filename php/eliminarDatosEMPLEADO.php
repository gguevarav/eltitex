<?php 
require_once "../php/conexion.php";
$conexion=conexion();
$id=$_POST['idEMPLEADO'];

$sql="DELETE FROM EMPLEADO WHERE idEMPLEADO='$id'";
echo $resultado=mysqli_query($conexion,$sql);
?>