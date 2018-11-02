<?php
	
	include("../../../conexion.php");

	$id = $_GET["id"];
	$consulta = "SELECT * FROM _equipos WHERE id = $id";
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
	$row = mysql_fetch_array($resultado);

	$factura = $row["factura"];
	$responsiva = $row["responsiva"];

	$serial = strlen($row["serie"])<=0 ? $row["nombre"] : $row["serie"];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
	<LINK href="../../../CSS/General.css" rel="stylesheet" type="text/css">
	<LINK href="../../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<style>
		body{
			font-size: 10px;
		}
		.tabla{
			width: 100%;
		}
		#tguardar{
			position: absolute;
			bottom: 0%;
			left: 0%;
			width: 100%;
		}
		input{
			width: 100%;
			font-size: 10px;
		}
		select{
			width: 100%;
		}
		.th{
			text-align: left;
		}
		.td{
		}
		tr{
			border: 1px solid black;
		}
		#comentarios{
			width: 80%;
			resize: none;
		}
		.button{
			border: none;
			background: white;
		}
		.buttonsel:hover{
			color: red;
		}
		.tablaBorder{
			border: 1px solid black;
		}
	</style>
<body class="elemento">
	
	<table border="1px" class="tabla elemento"><tr><th>Documentacion</th></tr></table>
	
	<br>
	
	<table width="100%" class="tablaBorder">
		<tr><th colspan="2">Factura</th></tr>
		<tr>
			<td width="20%">
				<button class="button buttonsel" onClick="modal('../Factura/Panel.php?id=<?php echo $id;?>&serie=<?php echo $serial;?>')">
					Cargar factura
				</button>				
			</td>
			<td width="80%" align="center">
				<?php
					echo $exists = file_exists($factura) ? 
					'<a href="../Factura/pdf.php?archivo='.base64_encode($factura).'" target="_blank">Ver archivo </a>' : "";

					echo $exists = file_exists($factura) ? 
						'<a href="../Factura/descargar.php?archivo='.base64_encode($factura).'">Descargar archivo </a>' : 
						"Error:no se encuentra el archivo o no se ah cargado. ";

					echo $factura != "" ? 
						"<font color='gray'>Ya se ah cargado una factura,el cargar otra factura remplazaria la anterior</font>" : 
						"Cargar factura";
				?>
			</td>
		</tr>
	</table>
	
	<br>
	
	<table width="100%" class="tablaBorder">
		<tr><th colspan="3">Responsiva</th></tr>
		<tr>
			<td width="12%">
				<button class="button buttonsel" onClick="responsiva(<?php echo $id;?>)">
					Generar responsiva
				</button>				
			</td>
			<td width="10%">
				<button class="button buttonsel" onClick="modal('../Responsiva/Panel.php?id=<?php echo $id;?>&serie=<?php echo $serial;?>')">
					Cargar responsiva
				</button>
			</td>
			
			<td width="80%" align="center">
				<?php
					echo $exists = file_exists($responsiva) ? 
					'<a href="../Factura/pdf.php?archivo='.base64_encode($responsiva).'" target="_blank">Ver archivo </a>' : "";

					echo $exists = file_exists($responsiva) ? 
						'<a href="../Factura/descargar.php?archivo='.base64_encode($responsiva).'">Descargar archivo </a>' : 
						"Error:no se encuentra el archivo o no se ah cargado. ";

					echo $responsiva != "" ? 
						"<font color='gray'>Ya se ah cargado una responsiva,el cargar otra responsiva remplazaria la anterior</font>" : 
						"Cargar responsiva";
				?>
			</td>
		</tr>
	</table>
	
	<!------------------------------------------------------	Modal -------------------------------------->
	<div id="openModal" class="modalDialog">
		<div class="elemento">
			<a href="#close" title="Close" class="close">X</a>
			<iframe id="ventana" width="100%" height="100%" src="" class="ventana">
			
			</iframe>
		</div>
	</div>
	<!------------------------------------------------------	Modal -------------------------------------->
	
</body>
	<script>
		function modal(pagina){
			location.href = "#openModal";
			document.getElementById("ventana").src = pagina;
		}
		function responsiva(id){
			location.href = "../Responsiva/generarResponsiva.php?id="+id;
		}
	</script>
</html>