<?php 

	include("../../../conexion.php");

	$id 		= $_GET["id"];
	$office 		= $_GET["office0"];
	$office1 		= $_GET["office1"];
	$office2 		= $_GET["office2"];
	$antivirus 		= $_GET["antivirus"];

	$sql = "UPDATE _equipos SET paq0=$office,paq1=$office1,paq2=$office2,antivirus=$antivirus WHERE id = $id";
	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		echo "TRUE";
	}else{
		echo "FALSE";
	}

?>