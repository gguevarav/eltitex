 <?php 
require_once "../php/conexion.php";
$conexion=conexion();

$i=$_POST['idPROCESO'];
$h=$_POST['hora'];
$m=$_POST['minuto'];
$s=$_POST['segundo'];
$p=$_POST['nombre_parametro'];

$n=$h.$m.$s;
$sql="INSERT INTO PARAMETROS (idPROCESO,TIEMPO_BASE,NOMBRE_PARAMETRO) VALUES ('$i','$n','$p')";
	echo $resultado=mysqli_query($conexion,$sql);
?>

