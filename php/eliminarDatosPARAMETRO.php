<?php 
require_once "../php/conexion.php";
$conexion=conexion();
$id=$_POST['idPARAMETRO'];

$sql="DELETE FROM PARAMETROS WHERE idPARAMETROS ='$id'";
echo $resultado=mysqli_query($conexion,$sql);
?>