<?php 
	function conexion(){
		$servidor="localhost";
		$usuario="ferreteria";
		$password="Umg123123";
		$bd="pruebas";
		$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
		return $conexion;
	}
?>