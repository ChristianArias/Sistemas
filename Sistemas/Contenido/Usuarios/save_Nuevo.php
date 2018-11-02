<?php
	include("../../conexion.php");
	
	$nombre 	= mysql_real_escape_string($_POST['nombre']);
	$puesto 	= mysql_real_escape_string($_POST['puesto']);
	$area 		= mysql_real_escape_string($_POST['area']);
	$comentario = mysql_real_escape_string($_POST['comentario']);
	$correo 	= mysql_real_escape_string($_POST['correo']);
	$no 		= mysql_real_escape_string($_POST['no']);
	$agencia	= mysql_real_escape_string($_POST['agencia']);
	$fi 		= $_POST['fi'];
	
	$bool = false;
	
	$con = "SELECT * FROM _usuario WHERE _usuario_nombre = '$nombre'";
	$pst = mysql_query($con,$conex) or die (mysql_error());
	while($res = mysql_fetch_array($pst)){
		$bool = true;
		echo	"$nombre ya existe";
	}if(!$bool){
		$con = "INSERT INTO _usuario 
			(_usuario_nombre,puesto,fechacreacion,comentario,area,correo,novendedor,fi,agencia) 
				VALUES 
			('$nombre','$puesto',now(),'$comentario','$area','$correo','$no',$fi,$agencia)";
		mysql_query($con,$conex) or die (mysql_error());
		echo "OK";
	}

?>