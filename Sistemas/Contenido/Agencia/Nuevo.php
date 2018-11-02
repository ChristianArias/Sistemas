<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<script src="../../JS/1.12.1/jquery-ui.js"></script>
	<script src="../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<style>
		table{
			width: 50%;
			position: absolute;
			bottom: 10%;
			left: 25%;
		}
		textarea{
			width: 100%;
			resize: none;
		}	
	</style>
<body class="elemento">
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<br>
	
	<center>
		<table>
			<tr><th>Agregar agencia</th></tr>
			<tr><th>Nombre</th></tr>
			<tr><td align="center"><input type="search" id="nombre"></td></tr>
			<tr><th>Comentarios</th></tr>
			<tr><th><textarea id="comentario" rows="10"></textarea></th></tr>
			<tr><td align="right"><button>Agregar</button></td></tr>
		</table>
	</center>
</body>
	<script>
			
	</script>
</html>