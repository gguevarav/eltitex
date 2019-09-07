<?php 
require_once "../php/conexion.php";
$conexion=conexion();
$id=$_POST['idKPI'];

$sql="DELETE FROM KPI WHERE idKPI='$id'";
echo $resultado=mysqli_query($conexion,$sql);
?>