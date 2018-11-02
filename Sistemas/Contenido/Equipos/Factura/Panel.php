<?php 

	include("../../../conexion.php");
	
	$id = $_GET["id"];
	$serie = $_GET["serie"];
	
	$con = "SELECT * FROM _equipos WHERE id = $id";
	$res = mysql_query($con,$conex) or die (mysql_error());
	$row = mysql_fetch_array($res);
	$factura = $row["factura"];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<script src="../../../JS/jquery.min.js"></script>
	<LINK href="../../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		#archivo{
			width: 100%;
			position: absolute;
			bottom: 5%;
			left: 0%;
		}
		#cargar,input[type="file"]{
			width: 100%;
		}
		#info{
			font-size: 10px;
		}
	</style>
</head>

<body class="elemento">
	
	<center>
		<caption><?php echo "Cargar factura ".$row["nombre"];?></caption>
		<table><tr><td><?php echo $serie;?></td></tr></table>
	</center>
	
	<form action="Cargar.php?id=<?php echo $id;?>&serie=<?php echo $serie;?>" method="POST" enctype="multipart/form-data">
		<table id="archivo">
			<tr>
				<td width="85%">
					<input type="file" accept="application/pdf" name="factura" id="factura" required>
				</td>
				<td width="15%"><button id="cargar"><?php echo $factura!="" ? "Actualizar" : "Cargar";?></button></td>
			</tr>
			<tr>
				<th colspan="2">
					<label id="info">
						<?php
							echo $exists = file_exists($factura) ? 
								'<a href="pdf.php?archivo='.base64_encode($factura).'" target="_blank">Ver archivo </a>' : "";
						
							echo $exists = file_exists($factura) ? 
								'<a href="descargar.php?archivo='.base64_encode($factura).'">Descargar archivo </a>' : 
								"Error:no se encuentra el archivo o no se ah cargado. ";
						
							echo $factura != "" ? 
								"<font color='red'>Ya se ah cargado una factura,el cargar otra factura remplazaria la anterior</font>" : 
								"Cargar factura";
						?>
					</label>
				</th>
			</tr>
		</table>
	</form>
	
</body>
	<script>
		function getFilePath(){
			 $('input[type=file]').change(function () {
				 var filePath=$('#fileUpload').val(); 
			 });
		}
	</script>
</html>