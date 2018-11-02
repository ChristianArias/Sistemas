<?php 
	
	$i 		= $_GET["i"];
	$str 	= $_GET["tx"];
	
	switch($i){
		case 0:
			echo base64_encode($str);
			break;
		case 1:
			echo base64_decode($str);
			break;
		default:
			echo "Error";
			break;
	}
	
	
?>