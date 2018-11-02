<?php 

	include("../../conexion.php");

	$servicio 		= mysql_real_escape_string($_GET["servicio"]);
	$usuario 		= mysql_real_escape_string($_GET["usuario"]);
	$contrasena 	= base64_encode($_GET["contrasena"]);
	$fecha 			= mysql_real_escape_string($_GET["modificacion"]);
	$link 			= mysql_real_escape_string($_GET["link"]);
	$dominio 		= mysql_real_escape_string($_GET["dominio"]);
	$observaciones 	= mysql_real_escape_string($_GET["observaciones"]);

	$sql = "INSERT INTO _contrasenas (servicio,usuario,contrasena,actualizado,link,dominio,observaciones) VALUES ('$servicio','$usuario','$contrasena','$fecha','$link','$dominio','$observaciones') ";

	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		echo "$servicio agregado";
	}

?>