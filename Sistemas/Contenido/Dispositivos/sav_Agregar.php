<?php

	include("../../conexion.php");
	$nombre 		= mysql_real_escape_string($_GET["nombre"]);
	$comentarios 	= mysql_real_escape_string($_GET["comentarios"]);

	$sql = "INSERT INTO _dispositivos (_dispositivos_nombre,comentario,fecha_creacion) VALUES ('$nombre','$comentarios',now())";

	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		header("location: Panel.php");
	}

?>