<?php 

	include("../../conexion.php");

	$tipo 		= $_GET["tipo"];
	$marca 		= mysql_real_escape_string($_GET["marca"]);
	$modelo 	= mysql_real_escape_string($_GET["modelo"]);
	$serie 		= mysql_real_escape_string($_GET["serie"]);
	$usuario 	= $_GET["asignado"];
	$ip 		= $_GET["ip"];
	$mac 		= $_GET["mac"];
	$area 		= $_GET["area"];
	$agencia 	= $_GET["agencia"];
	$usr 		= mysql_real_escape_string($_GET["usr"]);
	$pwd 		= mysql_real_escape_string($_GET["pwd"]);
	$ext0 		= $_GET["ext0"];
	$ext1 		= $_GET["ext1"];
	$ext2 		= $_GET["ext2"];
	$ext3 		= $_GET["ext3"];
	$comentarios 		= mysql_real_escape_string($_GET["comentarios"]);

	$sql = "INSERT INTO _telefonosip 
	(mac,ip,usuarioacceso,contrasenaacceso,ext1,ext2,ext3,ext4,area,agencia,comentarios,tipo,marca,modelo,serie,usuario1) 
	VALUES 
	('$mac','$ip','$usr','$pwd','$ext0','$ext1','$ext2','$ext3',$area,$agencia,'$comentarios',$tipo,'$marca','$modelo','$serie',$usuario)";

	$res = mysql_query($sql,$conex) or die (mysql_error());
	if($res>0){
		header("location: Panel.php");
	}
?>