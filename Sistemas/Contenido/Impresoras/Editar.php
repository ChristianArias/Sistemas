<?php 

	include("../../conexion.php");

	$id = $_GET["id"];

	$conUsuario = "SELECT * FROM impresoras WHERE id = $id";
	$resUsuario = mysql_query($conUsuario,$conex) or die (mysql_error());
	$row = mysql_fetch_array($resUsuario);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar impresora</title>
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
		<center><font size="+3">Editar impresora <?php echo $row["nombre"];?></font><br><label id="mensaje"></label></center>
		<tr>
			<td width="50%">
				<table width="100%">
					<tr><th colspan="3">Impresora</th></tr>
					<tr>
						<td width="30%">Nombre</td>
						<td colspan="2"><input type="search" id="nombre" value="<?php echo $row["nombre"];?>"></td>
					</tr>
					<tr>
						<td>Agencia</td>
						<td>
							<select id="agencia">
								<option value="0"></option>
								<?php
									$conAgencia = "SELECT * FROM _agencia";
									$resAgencia = mysql_query($conAgencia,$conex) or die (mysql_error());
									while($res = mysql_fetch_array($resAgencia)){
										$res["id"] == $row["agencia"] ? $selected = 'selected="selected"' : $selected = "";
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
									$conArea = "SELECT * FROM _areas";
									$resArea = mysql_query($conArea,$conex) or die (mysql_error());
									while($res = mysql_fetch_array($resArea)){
										$res["id"] == $row["area"] ? $selected = 'selected="selected"' : $selected = "";
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
									$conTipo = "SELECT * FROM _dispositivos";
									$resTipo = mysql_query($conTipo,$conex) or die (mysql_error());
									while($res = mysql_fetch_array($resTipo)){
										$res["id"] == $row["tipo"] ? $selected = 'selected="selected"' : $selected = "";
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
						<td width="70%" colspan="2"><input type="search" id="serie" value="<?php echo $row["serie"];?>"></td>
					</tr>
					<tr>
						<td>Marca</td>
						<td colspan="2"><input type="search" id="marca" value="<?php echo $row["marca"];?>"></td>
					</tr>
					<tr>
						<td>Modelo</td>
						<td colspan="2"><input type="search" id="modelo" value="<?php echo $row["modelo"];?>"></td>
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
							<input type="search" id="ip" value="<?php echo $row["ip"];?>">
						</td>
					</tr>
					<tr>
						<td>Nombre de red</td>
						<td colspan="2"><input type="search" id="nombreRed" value="<?php echo $row["nombrered"];?>"></td>
					</tr>
					<tr>
						<td>Usuario</td>
						<td colspan="2"><input type="search" id="usuario" value="<?php echo $row["usuario"];?>"></td>
					</tr>
					<tr>
						<td>Contraseña</td>
						<td colspan="2"><input type="search" id="contraseña" value="<?php echo $row["contraseña"];?>"></td>
					</tr>
				</table>
			</td>
			<td>
				<table width="100%">
					<tr><th colspan="2">Puertos</th></tr>
					<tr>
						<td width="30%">Wifi</td>
						<td width="70%" colspan="2">
							<?php  
								$checked = $row['wifi'] == 1 ? "checked" : "";
								echo '<input type="checkbox" name="wifi" id="wifi" '.$checked.' />' 
							?>
						</td>
					</tr>
					<tr>
						<td>Usb</td>
						<td colspan="2">
							<?php  
								$checked = $row['usb'] == 1 ? "checked" : "";
								echo '<input type="checkbox" name="usb" id="usb" '.$checked.' />' 
							?>
						</td>
					</tr>
					<tr>
						<td>Ethernet</td>
						<td colspan="2">
							<?php  
								$checked = $row['ethernet'] == 1 ? "checked" : "";
								echo '<input type="checkbox" name="ethernet" id="ethernet" '.$checked.' />' 
							?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr><th colspan="2">Comentarios</th></tr>
		<tr>
			<td colspan="2">
				<textarea rows="8"><?php echo $row["comentarios"];?></textarea>
			</td>
		</tr>
		<tr><td align="right" colspan="2"><button>Actualizar</button></td></tr>
	</table>
	</center>
</body>
</html>