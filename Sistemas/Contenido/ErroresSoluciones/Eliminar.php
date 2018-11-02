<?php 
	
	$ruta = "C:/Users/Administrador/Documents/Compartidos/Sistemas/ErroresYSoluciones/";
	$archivo = $_GET["archivo"];
	echo $archivo;
	$fh = fopen($ruta.$archivo, 'a');
	fclose($fh);
	unlink($ruta.$archivo);
	header('Location: Panel.php');

?>