<?php

	include("../../conexion.php");
	
	$id = $_GET["id"];
	$nombre = $_GET["nombre"];
	$srvr = mysql_real_escape_string($_GET["srvr"]);
	$usr = mysql_real_escape_string($_GET["usr"]);
	$pwd = mysql_real_escape_string($_GET["pwd"]);
	$comentarios = mysql_real_escape_string($_GET["comentarios"]);

	$sql = "UPDATE _usuariosremoto SET nombre = $nombre,servidores = '$srvr',usuario = '$usr',contrasena = '$pwd',comentario = '$comentarios' WHERE id = $id";
		
	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		echo "TRUE";
	}

?>