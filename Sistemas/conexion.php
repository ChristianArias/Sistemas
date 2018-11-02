<?php
	$conex = mysql_connect("localhost","root","milenio")
		or die("No se pudo realizar la conexion");
	mysql_select_db("sistemas",$conex)
		or die("Error con la base de datos");
	mysql_set_charset('utf8');
	$con = "SET GLOBAL max_allowed_packet=268435456";
	mysql_query($con,$conex) or die (mysql_error());
?>