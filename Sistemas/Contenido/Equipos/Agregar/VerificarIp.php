<?php 

	include("../../../conexion.php");

	$bool = false;

	$ip = mysql_real_escape_string($_GET["ip"]);
	$con = "SELECT * FROM lista WHERE ip = '$ip'";
	$res = mysql_query($con,$conex) or die (mysql_error());
	while($row = mysql_fetch_array($res)){
		$bool = true;
		echo "TRUE|".$row["_tipo"]." '".$row["nombre"]."' [".$row["_area"].",".$row["_agencia"]."]";
	}if(!$bool){
		echo "FALSE|No existe";
	}

?>