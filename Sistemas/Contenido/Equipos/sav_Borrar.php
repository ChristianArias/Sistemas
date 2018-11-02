<?php
	
	include("../../conexion.php");

	$id = $_GET["id"];
	$sql = "DELETE FROM _equipos WHERE id = $id";
	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		echo "TRUE";
	}

?>
