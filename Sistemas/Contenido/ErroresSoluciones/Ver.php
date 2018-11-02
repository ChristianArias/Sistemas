
<!doctype html>
<html>
<head>
<!--<meta charset="utf-8">-->
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" /> 
	
<title>Documento sin t&iacute;tulo</title>
</head>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		textarea{
			width: 100%;
			resize: none;
			border: none;
		}
		#eliminar{
			position: absolute;
			bottom: 0%;
			right: 0%;
		}
	</style>
<body>
	
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<br/><br/>
	<?php  
	
		//$caracteres = array("á","é","í","ó","ú","ñ","Ñ");
		//$standar=array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;","&Ntilde;");
	
		$ruta = "C:/Users/Administrador/Documents/Compartidos/Sistemas/ErroresYSoluciones/";
		$file = $_GET["archivo"];
		$archivo = file_get_contents($ruta.$file); //Guardamos archivo.txt en $archivo
		$archivo = ucfirst($archivo); //Le damos un poco de formato
		$archivo = nl2br($archivo); //Transforma todos los saltos de linea en tag <br/>
		echo "<strong>".utf8_decode($_GET["archivo"]).":</strong><br>";
	
		//$stringresult = str_replace($caracteres, $standar, $archivo);
	
		echo "<textarea rows='19' >".$archivo."</textarea>";
		echo '<a href="Eliminar.php?archivo='.$file.'" id="eliminar">Eliminar</a>';
	?>	
</body>
</html>