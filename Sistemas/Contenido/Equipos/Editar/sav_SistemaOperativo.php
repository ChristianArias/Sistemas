<?php

	include("../../../conexion.php");

	$id 		= $_GET["id"];
	$so 		= mysql_real_escape_string($_GET["so"]);
	$winoem 	= mysql_real_escape_string($_GET["winoem"]);
	$wininst 	= mysql_real_escape_string($_GET["wininst"]);
	$servcpack 	= mysql_real_escape_string($_GET["servcpack"]);

	$sql = "UPDATE _equipos SET so='$so',winoem='$winoem',wininst='$wininst' WHERE id = $id";
	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		echo "TRUE";
	}else{
		echo "FALSE";
	}

?>