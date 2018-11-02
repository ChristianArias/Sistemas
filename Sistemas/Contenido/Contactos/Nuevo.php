<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		#contenido{
			width: 99%;
			position: absolute;
			left: 0%;
			bottom: 0%;
			align-items: center;
			align-content: center;
			text-align: center;
		}
		#informacion{
			width: 100%;
		}
		#comentarios{
			width: 100%;
			resize: none;
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right" class="elemento">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<div id="contenido">
		<table id="informacion" border="1px">
			<tr>
				<th>Nombre completo</th>
				<td><input type="search" id="nombre"></td>
				<td rowspan="4"><textarea id="comentarios"></textarea></td>
			</tr>
		</table>
	</div>
	
</body>
</html>