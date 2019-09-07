<?php 
require_once "../php/conexion.php";
$conexion=conexion();
$id=$_POST['idKPI'];

$sql="DELETE FROM t_persona WHERE id='$id'";
echo $resultado=mysqli_query($conexion,$sql);
?>