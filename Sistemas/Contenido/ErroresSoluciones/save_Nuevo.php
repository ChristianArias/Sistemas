<?php

	$ruta = "C:/Users/Administrador/Documents/Compartidos/Sistemas/ErroresYSoluciones/";
	$nombre_archivo = $ruta.$_GET["nombre"].".txt";
	$contenido = utf8_decode($_GET["contenido"]);

	if(file_exists($nombre_archivo)){
		
	}else{
		
	}

	if($archivo = fopen($nombre_archivo, "w")){
		if(fwrite($archivo,$contenido. "\n\r")){
			echo "Se ha guardado correctamente";
		}else{
			echo "Ha habido un problema al crear el archivo";
		}
		fclose($archivo);
	}

?>