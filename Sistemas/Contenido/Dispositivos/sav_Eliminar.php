<?php

	include("../../conexion.php");
	$id = $_GET["id"];

	$sql = "DELETE FROM _dispositivos WHERE id = $id";
	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		header("location: Panel.php");
	}

?>