<?php

	include("../../../conexion.php");

	$id 		= $_GET["id"];
	$procesador 		= mysql_real_escape_string($_GET["procesador"]);
	$arquitectura 		= mysql_real_escape_string($_GET["arquitectura"]);
	$memoria 		= mysql_real_escape_string($_GET["memoria"]);
	$slots 		= $_GET["slots"];
	$dd 		= mysql_real_escape_string($_GET["dd"]);
	$ddserie 		= mysql_real_escape_string($_GET["ddserie"]);

	$sql = "UPDATE _equipos SET procesador='$procesador',arquitectura='$arquitectura',ram='$memoria',discoduro='$dd' WHERE id = $id";
	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		echo "TRUE";
	}else{
		echo "FALSE";
	}

?>