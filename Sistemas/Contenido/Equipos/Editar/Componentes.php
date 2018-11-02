<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<LINK href="../../../CSS/General.css" rel="stylesheet" type="text/css">
	<script src="../../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../../JS/1.12.1/jquery-ui.js"></script>
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
			width: 99%;
		}
		.th{
			width: 15%;
		}
		.td{
			width: 70%;
		}
	</style>
</head>

<body>
	
	<table border="1px" class="tabla elemento"><tr><th>Componentes</th></tr></table>
	
	<br>
	
	<table id="tguardar"><tr><td align="right"><button id="guardar" onClick="guardar()">Actualizar</button></td></tr></table>
	
</body>
</html>