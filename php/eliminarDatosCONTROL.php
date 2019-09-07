<?php 
require_once "../php/conexion.php";
$conexion=conexion();
$id=$_POST['idCONTROL'];

$sql="DELETE FROM FORMULARIO_ENCA WHERE idFORMULARIO_ENCA='$id'";
echo $resultado=mysqli_query($conexion,$sql);
?>