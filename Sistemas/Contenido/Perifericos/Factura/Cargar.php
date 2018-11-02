<?php

	include("../../../conexion.php");

	$id = $_GET["id"];
	$serie = $_GET["serie"];

	$carpeta = ("C:/Users/Administrador/Documents/Compartidos/Sistemas/Perifericos/Facturas/");

	opendir($carpeta);

	$name = $_FILES["factura"]["name"];
	$size =	$_FILES["factura"]["size"];

	$ext = end(explode(".", $name));
	$destino = $carpeta."fac_".$serie.".".$ext;

	/*if($size>500000){
		echo '<LINK href="../../../CSS/General.css" rel="stylesheet" type="text/css">';
		echo '<a href=Panel.php?id='.$id.'&serie='.$serie.'>Regresar</a><br>';
		echo "<center>Archivo muy pesado</center>".$size;
	}else{*/
		copy($_FILES["factura"]["tmp_name"],$destino);

		$con = "UPDATE _perifericos SET factura = '$destino' WHERE id = $id";
		mysql_query($con,$conex) or die (mysql_error());

		echo "<center>Se subio existosamente,puedes cerrar esta ventana.</center>";
	//}

?>