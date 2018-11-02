<?php

	include("../../../conexion.php");

	$tipo 		= $_GET["tipo"];
	$marca 		= mysql_real_escape_string($_GET["marca"]);
	$modelo 	= mysql_real_escape_string($_GET["modelo"]);
	$serie 		= mysql_real_escape_string($_GET["serie"]);
	$usuario 	= $_GET["asignado"];
	$area 		= $_GET["area"];
	$agencia 	= $_GET["agencia"];
	$comentarios = mysql_real_escape_string($_GET["comentarios"]);
	$procesador 		= mysql_real_escape_string($_GET["procesador"]);
	$arquitectura 		= mysql_real_escape_string($_GET["arquitectura"]);
	$memoria 		= mysql_real_escape_string($_GET["memoria"]);
	$slots 		= $_GET["slots"];
	$dd 		= mysql_real_escape_string($_GET["dd"]);
	$ddserie 		= mysql_real_escape_string($_GET["ddserie"]);
	$so 		= mysql_real_escape_string($_GET["so"]);
	$winoem 	= mysql_real_escape_string($_GET["winoem"]);
	$wininst 	= mysql_real_escape_string($_GET["wininst"]);
	$servcpack 	= mysql_real_escape_string($_GET["servcpack"]);
	$hostname 		= $_GET["hostname"];
	$ip 			= $_GET["ip"];
	$wifi 			= $_GET["wifi"];
	$ethernet 		= $_GET["ethernet"];
	$office 		= $_GET["office0"];
	$office1 		= $_GET["office1"];
	$office2 		= $_GET["office2"];
	$antivirus 		= $_GET["antivirus"];
	$fcompra		= $_GET["fcompra"];
	$garantia		= $_GET["garantia"];

	$sql = "INSERT INTO _equipos 	(serie,marca,modelo,area,agencia,tipo,comentarios,usuario,procesador,arquitectura,ram,discoduro,so,winoem,wininst,nombre,nombreRed,ip,ethernet,wifi,paq0,paq1,paq2,antivirus,activo,fcompra,garantia)
	VALUES	('$serie','$marca','$modelo',$area,$agencia,$tipo,'$comentarios',$usuario,'$procesador','$arquitectura','$memoria','$dd','$so','$winoem','$wininst','$hostname','$hostname','$ip',$ethernet,$wifi,$office,$office1,$office2,$antivirus,1,'$fcompra',$garantia)";

	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		header("location: ../Panel.php");
	}

?>