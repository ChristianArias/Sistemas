<?php

	include("../../../conexion.php");
	
	$id 		=  $_GET['id'];
	$numero 	= mysql_real_escape_string($_GET['numero']);
	$fecha 		= mysql_real_escape_string($_GET['fecha']);
	$falla 		= mysql_real_escape_string($_GET['falla']);
	$trabajo 	= mysql_real_escape_string($_GET['trabajo']);
	
	$con = "UPDATE _impresoras_reportes SET 
	idReporte = '$numero',fecha = '$fecha',fallaReportada = '$falla',trabajoEfectuado = '$trabajo' WHERE id = $id";
	
	mysql_query($con,$conex) or die (mysql_error());

	header('Location:../Panel.php');
	
	
?>