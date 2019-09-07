<?php 
require_once "../php/conexion.php";
$conexion=conexion();
$id=$_POST['idPUESTO'];

$sql="DELETE FROM PUESTO WHERE idPUESTO='$id'";
echo $resultado=mysqli_query($conexion,$sql);
?>