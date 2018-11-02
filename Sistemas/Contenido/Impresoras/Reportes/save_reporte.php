<?php 
	
	include("../../../conexion.php");

	$id = $_GET["id"];
	$numero 	= mysql_real_escape_string($_GET['numero']);
	$fecha 		= mysql_real_escape_string($_GET['fecha']);
	$falla 		= mysql_real_escape_string($_GET['falla']);
	$trabajo 	= mysql_real_escape_string($_GET['trabajo']);
	
	$con = "INSERT INTO _impresoras_reportes (idImpresora,idReporte,fecha,fallaReportada,trabajoEfectuado) 
			VALUES ($id,'$numero','$fecha','$falla','$trabajo')";

	mysql_query($con,$conex) or die (mysql_error());

	header('Location:../Panel.php');

?>