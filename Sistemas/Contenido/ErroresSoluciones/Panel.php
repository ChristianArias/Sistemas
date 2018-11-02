<?php

	

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		div{
			overflow:auto;
			width: 99%;
			height: 85%;
			position: absolute;
			top:10%;
			left: 0%;
		}
		.icon{
			width: 	10px;
			height: 10px;
		}
		.icon:hover{
			width: 	10.1px;
			height: 10.1px;
		}
	</style>
<body>
	
	<caption id="botones" style="text-align: right">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="Nuevo.php">Agregar</a>
	</caption>
	
	<center>Errores y/o Soluciones</center>
	
	<br>
	<div id="datos" class="elemento">
		<?php

			$directorio = opendir("C:/Users/Administrador/Documents/Compartidos/Sistemas/ErroresYSoluciones/"); //ruta actual

			while ($archivo = readdir($directorio)){ //obtenemos un archivo y luego otro sucesivamente

				if (is_dir($archivo)){//verificamos si es o no un directorio

					//echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
				}
				else{
					echo 
						"   ".
						'<a href="Eliminar.php?archivo='.$archivo.'" class="btnicon"><img src="../../Iconos/desmarcar.png" class="icon" title="Eliminar '.$archivo.'"></a>'.
						"   ".
						'<a href="Ver.php?archivo='.$archivo.'" class="btnicon"><img src="../../Iconos/ver.png" class="icon" title="Visualizar"></a>'.
						"   ".
						'<a class="btnicon"><img src="../../Iconos/editar.png" class="icon" title="Editar archivo"></a>'.
						"   ".
						'<a href="Ver.php?archivo='.$archivo.'">'.$archivo."</a>".
						"</br>";
				}
			}

		?>		
	</div>
</body>
</html>