<?php 
	
	date_default_timezone_set('America/Mexico_City');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<script src="../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../JS/1.12.1/jquery-ui.js"></script>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
</head>
	<style>
		table{
			width: 80%;
			position: absolute;
			top: 15%;
			left: 10%;
			background: white;
		}
		body{
			font-size: 80%;
		}
		input{
			width: 100%;
		}
		textarea{
			width: 99%;
			resize: none;
		}
		#mensaje{
			color: red;
		}
		.elemento{
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-o-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
	</style>
<body>	
	<caption id="botones" style="text-align: right">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<center>
	
	<div id="info">
		<table class="elemento">
			<thead>
				<tr>
					<th colspan="4">Agregar</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Servicio</th>
					<td colspan="3"><input id="servicio" type="search"></td>
				</tr>
				<tr>
					<th>Usuario</th>
					<td><input id="usuario" type="search"></td>
					<th>Contraseña</th>
					<td><input id="contrasena" type="search"></td>
				</tr>
				<tr>
					<th colspan="1">Ultima modificacion</th>
					<td colspan="3" align="center">
						<label id="modificacion"><?php echo date('Y-m-d'); ?></label>
					</td>
				</tr>
				<tr>
					<th colspan="4">Link</th>
				</tr>
				<tr>
					<td colspan="4"><input id="link" type="search"></td>
				</tr>
				<tr>
					<th colspan="4">Dominios</th>
				</tr>
				<tr>
					<td colspan="4">
						<textarea id="dominio" cols="100" rows="2"></textarea>
					</td>
				</tr>
				<tr>
					<th colspan="4">Observaciones</th>
				</tr>
				<tr>
					<td colspan="4">
						<textarea id="observaciones" cols="100" rows="4"></textarea>
					</td>
				</tr>
				<tr><th colspan="4"><label id="mensaje"></label></th></tr>
				<tr>
					<td align="right" colspan="4">
						<button onClick="guardar()">Actualizar</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
		
	</center>
</body>
	<script>
		function guardar(){
			var servicio = document.getElementById("servicio").value;
			var usuario = document.getElementById("usuario").value;
			var contrasena = document.getElementById("contrasena").value;
			var fecha = document.getElementById("modificacion").innerHTML;
			var link = document.getElementById("link").value;
			var dominio = document.getElementById("dominio").value;
			var observaciones = document.getElementById("observaciones").value;
			
			if(Boolean(servicio)){
				
				document.getElementById("mensaje").innerHTML = "";
				document.getElementById("servicio").style.border = "1px solid grey";
				
				var con = "servicio="+servicio+"&usuario="+usuario+"&contrasena="+contrasena+"&modificacion="+fecha+"&link="+link+"&dominio="+dominio+"&observaciones="+observaciones;
				
				$.ajax({ 
					type: 	"GET", 
					url: 	"save_Nuevo.php", 
					data: con, 
					success: function(msg){
						document.getElementById("mensaje").innerHTML = msg;	
					}
				});
			}else{
				document.getElementById("mensaje").innerHTML = "Nombre de servicio es necesario";
				document.getElementById("servicio").style.border = "1px solid red";
			}
			
		}
	</script>
</html>