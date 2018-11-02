<?php 
	
	$destino 	= "christianarias@mail.com";

	$titulo 	= "Titulo de prueba";
	$mail 		= "Prueba de mensaje";

	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	//dirección del remitente 
	$headers .= "From: Geeky Theory < christianarias@mail.com >\r\n";
	//Enviamos el mensaje a tu_dirección_email 
	$bool = mail($destino,$titulo,$mail,$headers);
	if($bool){
    	echo "Mensaje enviado";
	}else{
    	echo "Mensaje no enviado";
	}

?>