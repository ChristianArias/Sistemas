<?php
	
	include("../../conexion.php");
	
	$id = $_GET["id"];
	$nombre = $_GET["nombre"];
	$apellido = $_GET["apellido"];
	$usuario = $_GET["usuario"];
	$contrasena = base64_encode($_GET["contrasena"]);
	$correo = $_GET["correo"];
	$telefono = $_GET["telefono"];
	$comentarios = $_GET["comentarios"];
	$activo = $_GET["activo"];

	$sql = "UPDATE _usuarios SET usuarios_nombre = '$nombre',usuarios_apellido = '$apellido',usuarios_usuario = '$usuario',usuarios_contrasena = '$contrasena',usuarios_bloqueado = $activo,usuarios_correo = '$correo',usuarios_telefono = '$telefono',usuarios_comentarios = '$comentarios' WHERE usuarios_id = $id";
	mysql_query($sql,$conex) or die (mysql_error());
	echo "OK";
?>