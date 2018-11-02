<?php 

	include("../../conexion.php");
	session_start();

	$id 			= $_SESSION['sis_id'];
	$tipo 			= $_GET["tipo"];
	$titulo 		= mysql_real_escape_string($_GET["titulo"]);
	$ubicacion 		= mysql_real_escape_string($_GET["ubicacion"]);
	$inicio 		= $_GET["inicio"];
	$final 			= $_GET["final"];
	$comentarios 	= mysql_real_escape_string($_GET["comentarios"]);
	$compartircon 	= $_GET["compartircon"];

	$sql = "INSERT INTO _eventoscalendario (tipo,titulo,ubicacion,inicio,fin,comentarios,compartir,creador,creacion,editable) VALUES ($tipo,'$titulo','$ubicacion','$inicio','$final','$comentarios','$compartircon',$id,now(),true)";	
	$res = mysql_query($sql,$conex) or die (mysql_error());
	$lastid = mysql_insert_id();

	if($res>0){
		if(strlen($compartircon)>0){
			$compartir = split (",", $compartircon);
			for($c = 0;$c < count($compartir);$c++){
				$usuario = $compartir[$c];
				$sql = "INSERT INTO _eventoscalendariodata (usuario,evento) VALUES ($usuario,$lastid)";
				$res = mysql_query($sql,$conex) or die (mysql_error());
			}
			$sql = "INSERT INTO _eventoscalendariodata (usuario,evento) VALUES ($id,$lastid)";
			$res = mysql_query($sql,$conex) or die (mysql_error());
		}else{
			$sql = "INSERT INTO _eventoscalendariodata (usuario,evento) VALUES ($id,$lastid)";
			$res = mysql_query($sql,$conex) or die (mysql_error());
		}
		header("location: calendario.php?ano=".date("Y")."&mes=".date("m"));
	}

?>