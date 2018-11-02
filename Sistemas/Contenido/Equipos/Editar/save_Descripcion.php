<?php 
	
	include("../../../conexion.php");

	$id 		= $_GET["id"];//
	$tipo 		= $_GET["tipo"];//
	$marca 		= mysql_real_escape_string($_GET["marca"]);//
	$modelo 	= mysql_real_escape_string($_GET["modelo"]);//
	$serie 		= mysql_real_escape_string($_GET["serie"]);//
	$usuario 	= $_GET["asignado"];
	$area 		= $_GET["area"];//
	$agencia 	= $_GET["agencia"];//
	$comentarios = mysql_real_escape_string($_GET["comentarios"]);//
	$fcompra	= $_GET["fcompra"];
	$garantia	= $_GET["garantia"];

	$sql = "UPDATE _equipos SET serie = '$serie',marca='$marca',modelo='$modelo',area=$area,agencia=$agencia,tipo=$tipo,comentarios='$comentarios',usuario=$usuario,fcompra='$fcompra',garantia=$garantia WHERE id = $id";

	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		echo "TRUE";
	}else{
		echo "FALSE";
	}

?>