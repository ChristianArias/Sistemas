<?php 

	include("../../conexion.php");

	$id 			= $_GET["id"];
	$servicio 		= mysql_real_escape_string($_GET["servicio"]);
	$usuario 		= mysql_real_escape_string($_GET["usuario"]);
	$contrasena 	= base64_encode($_GET["contrasena"]);
	$fecha 			= mysql_real_escape_string($_GET["modificacion"]);
	$link 			= mysql_real_escape_string($_GET["link"]);
	$dominio 		= mysql_real_escape_string($_GET["dominio"]);
	$observaciones 	= mysql_real_escape_string($_GET["observaciones"]);

	$sql = "UPDATE _contrasenas SET servicio='$servicio',usuario='$usuario',contrasena='$contrasena',actualizado='$fecha',link='$link',dominio='$dominio',observaciones='$observaciones' WHERE id = $id ";

	mysql_query($sql,$conex) or die (mysql_error());
	
	echo "$servicio actualizado";

?>