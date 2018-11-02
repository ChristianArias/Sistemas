<?php
	
	include("../../conexion.php");
	$id 			= $_GET["id"];
	$nombre 		= mysql_real_escape_string($_GET["nombre"]);
	$comentarios 	= mysql_real_escape_string($_GET["comentarios"]);

	$sql = "UPDATE _dispositivos SET _dispositivos_nombre = '$nombre',comentario = '$comentarios',fecha_creacion = now() WHERE id = $id";

	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		header("location: Panel.php");
	}
	
?>