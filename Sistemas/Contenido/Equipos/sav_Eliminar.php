<?php
	
	include("../../conexion.php");

	$id = $_GET["id"];
	$activo = $_GET["activo"];
	$sql = "UPDATE _equipos SET activo = $activo WHERE id = $id";
	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		echo "TRUE";
	}

?>
