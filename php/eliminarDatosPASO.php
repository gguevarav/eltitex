<?php 
require_once "../php/conexion.php";
$conexion=conexion();
$id=$_POST['idPROCESO'];

$sql="DELETE FROM PROCESO WHERE idPROCESO='$id'";
echo $resultado=mysqli_query($conexion,$sql);
?>