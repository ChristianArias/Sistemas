<?php

	include("../../conexion.php");

	$nombre = $_GET["nombre"];
	$srvr = mysql_real_escape_string($_GET["srvr"]);
	$usr = mysql_real_escape_string($_GET["usr"]);
	$pwd = mysql_real_escape_string($_GET["pwd"]);
	$comentarios = mysql_real_escape_string($_GET["comentarios"]);

	$sql = "INSERT INTO _usuariosremoto (nombre,servidores,usuario,contrasena,comentario) VALUES ($nombre,'$srvr','$usr','$pwd','$comentarios')";
		
	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		echo "TRUE";
	}

?>