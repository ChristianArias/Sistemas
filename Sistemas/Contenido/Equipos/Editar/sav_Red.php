<?php 

	include("../../../conexion.php");

	$id 			= $_GET["id"];
	$hostname 		= $_GET["hostname"];
	$ip 			= $_GET["ip"];
	$wifi 			= $_GET["wifi"];
	$ethernet 		= $_GET["ethernet"];

	$sql = "UPDATE _equipos SET nombre='$hostname',nombreRed='$hostname',ip='$ip',ethernet=$ethernet,wifi=$wifi WHERE id = $id";
	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		echo "TRUE";
	}else{
		echo "FALSE";
	}

?>