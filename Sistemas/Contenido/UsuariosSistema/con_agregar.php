<?php
	
	include("../../conexion.php");
	
	$nombre = $_GET["nombre"];
	$apellido = $_GET["apellido"];
	$usuario = $_GET["usuario"];
	$contrasena = base64_encode($_GET["contrasena"]);
	$correo = $_GET["correo"];
	$telefono = $_GET["telefono"];
	$comentarios = $_GET["comentarios"];

	$bool = false;
	$sql = "SELECT * FROM _usuarios WHERE usuarios_usuario LIKE '%$usuario%'";
	$res = mysql_query($sql,$conex) or die (mysql_error());

	while($row = mysql_fetch_array($res)){
		
		$bool = true;
		echo "usuario ya existe";
		
	}if(!$bool){
		
		$sql = "INSERT INTO _usuarios(usuarios_nombre,usuarios_apellido,usuarios_usuario,usuarios_contrasena,usuarios_correo,usuarios_telefono,usuarios_comentarios,usuarios_bloqueado)values('$nombre','$apellido','$usuario','$contrasena','$correo','$telefono','$comentarios',1)";
		mysql_query($sql,$conex) or die (mysql_error());
		echo "OK";
		
	}
?>