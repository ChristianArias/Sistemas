<?php 

	include("../../../conexion.php");

	$id 	= $_GET["id"];
	$date 	= $_GET["date"];
	$evento = $_GET["evento"];
	$asunto = $_GET["asunto"];
	$fin 	= ($_GET["fin"]=="true")?1:0;

	$sql = "INSERT INTO _equipos_reportes 
	(idEquipo,fecha,evento,status,asunto) VALUES 
	($id,'$date','$evento','$fin','$asunto')";

	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		header("location: Panel.php?id=".$id);
	}

?>