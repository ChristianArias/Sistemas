<?php 
	
	date_default_timezone_set('America/Mexico_City');

	include("../../conexion.php");

	$id = $_GET["id"];

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
	<caption id="botones" style="text-align: right">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
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
	
	<center>
	
	<div id="info">
		<table class="elemento">
			<thead>
				<tr>
					<th colspan="4">Editar</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT * FROM _contrasenas WHERE id = $id";
					$res = mysql_query($sql,$conex) or die (mysql_error());
					$row = mysql_fetch_array($res);
				?>
				<tr>
					<th>Servicio</th>
					<td colspan="3"><input id="servicio" type="search" value="<?php echo $row["servicio"]?>"></td>
				</tr>
				<tr>
					<th>Usuario</th>
					<td><input id="usuario" type="search" value="<?php echo $row["usuario"]?>"></td>
					<th>Contraseña</th>
					<td><input id="contrasena" type="search" value="<?php echo base64_decode($row["contrasena"]);?>"></td>
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
					<td colspan="4"><input id="link" type="search" value="<?php echo $row["link"];?>"></td>
				</tr>
				<tr>
					<th colspan="4">Dominios</th>
				</tr>
				<tr>
					<td colspan="4">
						<textarea id="dominio" cols="100" rows="2"><?php echo $row['dominio'];?></textarea>
					</td>
				</tr>
				<tr>
					<th colspan="4">Observaciones</th>
				</tr>
				<tr>
					<td colspan="4">
						<textarea id="observaciones" cols="100" rows="4"><?php echo $row['observaciones'];?></textarea>
					</td>
				</tr>
				<tr><th colspan="4"><label id="mensaje"></label></th></tr>
				<tr>
					<td align="left">
						<button onClick="eliminar(<?php echo $id;?>,'<?php echo $row["servicio"]?>')">Eliminar</button>
					</td>
					<td><button><a href="Reportes/Panel.php?id=<?php echo $id; ?>">Reportes</a></button></td>
					<td align="right" colspan="2">
						<button onClick="editar(<?php echo $id;?>)">Actualizar</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
		
	</center>
		
</body>
	<script>
		function eliminar(id,name){
			res=confirm("¿Eliminar la contraseña "+name+"?");
			if (res){
				location.href = "#close"
			}else{
				
			}
		}
		function editar(id){			
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
				
				var con = "id="+id+"&servicio="+servicio+"&usuario="+usuario+"&contrasena="+contrasena+
				"&modificacion="+fecha+"&link="+link+"&dominio="+dominio+"&observaciones="+observaciones;

				$.ajax({ 
					type: 	"GET", 
					url: 	"save_modificar.php", 
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