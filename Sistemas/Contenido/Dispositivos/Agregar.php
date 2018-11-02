<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<script src="../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../JS/1.12.1/jquery-ui.js"></script>
	<style>
		.table{
			width: 50%;
			position: absolute;
			bottom: 25%;
			right: 25%
		}
		.mensaje{
			width: 50%;
			position: absolute;
			bottom: 10%;
			right: 25%
		}
		input[type="search"]{
			width: 100%;
		}
		select{
			width: 100%;
		}
		textarea{
			width: 99.5%;
			resize: none;
		}
		.left{
			text-align: left;
			width: 30%;
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<center>
		<br><br>
		<center><font size="+3">Agregar tipo</font><br></center>
		<br>
		<table class="table">
			<tr>
				<th class="left">Nombre del dispositivo</th>
				<td><input type="search" id="nombre"></td>
			</tr>
			<tr><th colspan="2">Comentarios</th></tr>
			<tr>
				<td colspan="2"><textarea id="comentarios" rows="10"></textarea></td>
			</tr>
			<tr><td align="right" colspan="2"><button onClick="guardar()">Guardar</button></td></tr>
		</table>
		<center><label id="mensaje" class="mensaje"></label></center>
	</center>
</body>
	<script>
		
		
		function guardar(){
			var n = document.getElementById("nombre").value;
			var c = document.getElementById("comentarios").value;
			var mensaje = document.getElementById("mensaje");
			
			$.ajax({ 
				type: 	"GET",
				url: 	"verificar.php",
				data: 	"nombre="+n,
				success: function(msg){
					var res = msg.split('|');
					switch(res[0]){
						case "TRUE":
							mensaje.innerHTML = "Este tipo de dispositivo ya existe "+n;
							mensaje.style.color = "RED";
							break;
						case "FALSE":
							location.href = "sav_Agregar.php?nombre="+n+"&comentarios="+c
							break;
						default:
							alert(msg);
							break;
					}
				}
			});		
		}
	</script>
</html>