<?php

	include("../../conexion.php");
	$bool 	= false;
	$nombre = mysql_real_escape_string($_GET["nombre"]);

	$con = "SELECT * FROM _dispositivos WHERE _dispositivos_nombre = '$nombre'";
	$res = mysql_query($con,$conex) or die (mysql_error());
	while($row = mysql_fetch_array($res)){
		$bool = true;
		echo "TRUE|Ya existe";
	}if(!$bool){
		echo "FALSE|No existe";
	}

?>