<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<script type="text/javascript" src="../../JS/dom-drag.js"></script>
</head>
	<style>
		#divcalendario{
			resize: both;
    		overflow: hidden;
			width: 50%;
			min-width: 50%;
			height: 400px;
			min-height: 400px;
			position: relative;
			left:0%;
			top: 0%;
			border: 1px solid grey;
			background-color: white;
		}
		#calendario{
			width: 95%;
			height: 80%;
			position: absolute;
			left: 2.5%;
			bottom: 5%;
			border: none;
		}
		#ayuda{
			position: relative;
			background-color: white;
		}
		@media screen and (max-width:1000px){
			#divcalendario{
				resize: both;
				overflow: hidden;
				width: 100%;
				min-height: 350px;
				position: relative;
				left:0%;
				top: 0%;
				border: 1px solid grey;
				background-color: white;
			}
		}
	</style>
<body onLoad="date()">
	
	<div id="divcalendario" title="Mueveme" class="">
		<center>
			<br>
			<input type="month" id="date" onChange="date()" value="<?php echo date("Y-m");?>">
			<br>
			<iframe id="calendario" src=""></iframe>
		</center>
	</div>
	
	<div id="ayuda" style="float: left">
		<table border="1px">
			<tr><th colspan="2">Accesos de busqueda</th></tr>
			<tr><td>Agencia</td><td>agencia</td></tr>
			<tr><td>Atas</td><td>atas</td></tr>
			<tr><td>Contraseñas</td><td>pwd</td></tr>
			<tr><td>Equipos</td><td>equipos</td></tr>
			<tr><td>Impresoras</td><td>impresoras</td></tr>
		</table>
	</div>
	
</body>
	<script>
		var calendario = document.getElementById("divcalendario");
		//, null, 0, screen.width - 530, 0, screen.height - 600
		Drag.init( calendario );
		Drag.init(document.getElementById("ayuda"));
		
		function date(){
			var date = document.getElementById("date").value;
			var d = date.split("-");
			
			var ano = d[0];
			var mes = d[1];
			
			document.getElementById("calendario").src = "../Calendario/calendario.php?ano="+ano+"&mes="+mes;
		}
	</script>
</html>

<!--
#tareas{
			border: none;
			width: 100%;
			height: 50vh;
		}
		#calendario{
			width: 97%;
			min-height: 60vh;
			position: absolute;
			top: 0px;
			border: 1px solid red;
		}
		#divcalendario{
			resize: both;
    		overflow: hidden;
			width: 50%;
			min-height: 45%;
			position: relative;
			left: 500px;
			top: 50px;
			border: 1px solid grey;
			background-color: white;
		}
		#date{
			border: none;
			text-align: center;
			font-size: 20px;
		}
		@media screen and (max-width:1000px){
			#divcalendario{
				resize: both;
				overflow: visible;
				width: 100%;
				min-height: 100vh;
				max-height: 100vh;
				position: relative;
				left: 500px;
				top: 50px;
				border: 1px solid grey;
				background-color: white;
			}
		}