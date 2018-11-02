<?php 
	
	include("../../conexion.php");
	
	$id			= $_POST["id"];
	$nombre 	= mysql_real_escape_string($_POST['nombre']);
	$puesto 	= mysql_real_escape_string($_POST['puesto']);
	$area 		= mysql_real_escape_string($_POST['area']);
	$comentario = mysql_real_escape_string($_POST['comentario']);
	$correo 	= mysql_real_escape_string($_POST['correo']);
	$no 		= mysql_real_escape_string($_POST['no']);
	$agencia	= mysql_real_escape_string($_POST['agencia']);
	$fi 		= $_POST['fi'];

	$con = 		"UPDATE _usuario SET
					_usuario_nombre = '$nombre',
					puesto = '$puesto',
					comentario = '$comentario',
					area = $area,
					correo = '$correo',
					novendedor = '$no',
					fi = $fi,
					agencia = $agencia
				WHERE id = $id";

	mysql_query($con,$conex) or die (mysql_error());
	echo "OK";

?>