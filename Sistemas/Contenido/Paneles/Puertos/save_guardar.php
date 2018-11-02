<?php

	include("../../../conexion.php");

	$id = $_GET["id"];
	$panel = $_GET["panel"];
	$puerto = $_GET["puerto"];
	$valor = mysql_real_escape_string($_GET["valor"]);
	$comentarios = mysql_real_escape_string($_GET["comentarios"]);

	$con = "INSERT INTO _paneles_valores (idPuerto,idPanel,valor,comentarios) VALUES ($puerto,$panel,'$valor','$comentarios')";

	mysql_query($con,$conex) or die (mysql_error());

	echo "OK";
?>