<?php 
require_once "../php/conexion.php";
$conexion=conexion();
$id=$_POST['idDEPARTAMENTO'];

$sql="DELETE FROM DEPARTAMENTO WHERE idDEPARTAMENTO='$id'";
echo $resultado=mysqli_query($conexion,$sql);
?>