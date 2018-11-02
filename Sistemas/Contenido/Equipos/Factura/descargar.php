<?php
	
	$file = base64_decode($_GET["archivo"]);
	
	$str = split("/",$file);
	$filename = $str[count($str)-1];	
	
	header("Content-Description: Descargar imagen"); 
	header("Content-Disposition: attachment; filename=$filename");
	header("Content-Type: application/force-download"); 
	header("Content-Length: " . filesize($file)); 
	header("Content-Transfer-Encoding: binary"); 

	readfile($file);

?>