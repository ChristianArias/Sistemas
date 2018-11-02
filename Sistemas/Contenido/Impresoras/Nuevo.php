<?php 

	include("../../conexion.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Nueva impresora</title>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		.table{
			width: 80%;
			position: absolute;
			top: 15%;
			right: 10%
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
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<br>
	
	<center>
		
		<table class="table elemento">
			<center><font size="+3">Nueva impresora</font><br><label id="mensaje"></label></center>
			<tr>
				<td width="50%">
					<table width="100%">
						<tr><th colspan="3">Impresora</th></tr>
						<tr>
							<td width="30%">Nombre</td>
							<td colspan="2"><input type="search" id="nombre" onkeyup="ingreso()"></td>
						</tr>
						<tr>
							<td>Agencia</td>
							<td>
								<select id="agencia">
									<option value="0"></option>
									<?php
										$con = "SELECT * FROM _agencia ORDER BY _agencia_nombre";
										$resUsuario = mysql_query($con,$conex) or die (mysql_error());
										while($res = mysql_fetch_array($resUsuario)){
											$res["id"] == $res2["agencia"] ? $selected = 'selected="selected"' : $selected = "";
											echo '<option value="'.$res['id'].'" '.$selected.'>'.$res['_agencia_nombre'].'</option>';
										}
									?>
								</select>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>Area</td>
							<td>
								<select id="area">
									<option value="0"></option>
									<?php
										$con = "SELECT * FROM _areas ORDER BY _areas_nombre";
										$resUsuario = mysql_query($con,$conex) or die (mysql_error());
										while($res = mysql_fetch_array($resUsuario)){
											$res["id"] == $res2["area"] ? $selected = 'selected="selected"' : $selected = "";
											echo '<option value="'.$res['id'].'" '.$selected.'>'.$res['_areas_nombre'].'</option>';
										}
									?>
								</select>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>Tipo</td>
							<td>
								<select id="tipo">
									<option value="0"></option>
									<?php
										$con = "SELECT * FROM _dispositivos ORDER BY _dispositivos_nombre";
										$resUsuario = mysql_query($con,$conex) or die (mysql_error());
										while($res = mysql_fetch_array($resUsuario)){
											$res["id"] == $res2["tipo"] ? $selected = 'selected="selected"' : $selected = "";
											echo '<option value="'.$res['id'].'" '.$selected.'>'.$res['_dispositivos_nombre'].'</option>';
										}
									?>
								</select>
							</td>
							<td></td>
						</tr>
					</table>
				</td>
				<td width="50%">
					<table width="100%">
						<tr><th colspan="2">Detalles</th></tr>
						<tr>
							<td width="30%">Numero de serie</td>
							<td width="70%" colspan="2"><input type="search" id="serie"></td>
						</tr>
						<tr>
							<td>Marca</td>
							<td colspan="2"><input type="search" id="marca"></td>
						</tr>
						<tr>
							<td>Modelo</td>
							<td colspan="2"><input type="search" id="modelo"></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table width="100%">
						<tr><th colspan="2">Conexion</th></tr>
						<tr>
							<td width="30%">Direccion ip</td>
							<td width="70%" colspan="2">
								<input type="search" id="ip">
							</td>
						</tr>
						<tr>
							<td>Nombre de red</td>
							<td colspan="2"><input type="search" id="nombreRed"></td>
						</tr>
						<tr>
							<td>Usuario</td>
							<td colspan="2"><input type="search" id="usuario"></td>
						</tr>
						<tr>
							<td>Contraseña</td>
							<td colspan="2"><input type="search" id="contraseña"></td>
						</tr>
					</table>
				</td>
				<td>
					<table width="100%">
						<tr><th colspan="2">Puertos</th></tr>
						<tr>
							<td width="30%">Wifi</td>
							<td width="70%" colspan="2">
								<input type="checkbox">
							</td>
						</tr>
						<tr>
							<td>Usb</td>
							<td colspan="2"><input type="checkbox"></td>
						</tr>
						<tr>
							<td>Ethernet</td>
							<td colspan="2"><input type="checkbox"></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr><th colspan="2">Comentarios</th></tr>
			<tr>
				<td colspan="2">
					<textarea rows="8"></textarea>
				</td>
			</tr>
			<tr><td align="right" colspan="2"><button>Actualizar</button></td></tr>
		</table>
	</center>
</body>
	<script>
		function ingreso(){
			document.getElementById("lbnombre").innerHTML = document.getElementById('nombre').value;
		}
	</script>
</html>