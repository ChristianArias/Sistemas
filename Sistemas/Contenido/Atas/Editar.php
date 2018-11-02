<?php

	include("../../conexion.php");

	$id = $_GET["id"];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		#informacion{
			width: 99%;
			position: absolute;			
			top: 10%;
		}
		
		#datos{
			width: 30%;
		}
		#usuarios{
			width: 50%;
		}
		input[type="search"]{
			width: 100%;
		}
		input[type="password"]{
			width: 99%;
		}
		select{
			width: 100%;
		}
		textarea{
			width: 99.5%;
			resize: none;
		}
		@media screen and (max-height:300px){
			.body{
				font-size: 5px;
			}
			#informacion{
				width: 100%;
				border: 1px solid red;
			}
			#datos{
				width: 80%;
				border: 1px solid black;
			}
			#usuarios{
				width: 85%;
			}
		}
	</style>
</head>

<body>
	
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<br>
	
	<div id="informacion">
	
	<center>
		
	<table id="datos">
		<caption><font size="+2">Agregar Ata</font></caption>
		<tr>
			<th>Nombre</th>
			<td><input type="search" id="nombre" placeholder="Nombre"></td>
		</tr>
		<tr>
			<th>Numero de Serie</th>
			<td><input type="search" id="serie" placeholder="serie"></td>
		</tr>
		<tr>
			<th>Direccion Ip</th>
			<td><input type="search" id="ip" placeholder="IP"></td>
		</tr>
		<tr>
			<th>Agencia</th>
			<td>
				<select id="agencia">
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
		</tr>
		<tr>
			<th>Area</th>
			<td>
				<select id="area">
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
		</tr>
		<tr>
			<th>Tipo</th>
			<td>
				<select id="tipo">
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
		</tr>
		<tr><th colspan="2">Acceso</th></tr>
		<tr>
			<th>Usuario</th>
			<td><input type="search" id="usuario" placeholder="Usuario"></td>
		</tr>
		<tr>
			<th>Contraseña</th>
			<td><input type="password" id="contrasena" placeholder="Contraseña"></td>
		</tr>
	</table>
		
		<table id="usuarios">
			<tr><th colspan="4">Usuarios</th></tr>
			<tr>
				<th>Usuario</th>
				<td>
					<select id="user0">
					<?php
						$con = "SELECT * FROM _usuario";
						$resUsuario = mysql_query($con,$conex) or die (mysql_error());
						while($res = mysql_fetch_array($resUsuario)){
							echo '<option value="'.$res['id'].'">'.$res['_usuario_nombre'].'			</option>';
						}
					?>
					</select>
				</td>
				<th>Usuario</th>
				<td>
					<select id="user1">
					<?php
						$con = "SELECT * FROM _usuario";
						$resUsuario = mysql_query($con,$conex) or die (mysql_error());
						while($res = mysql_fetch_array($resUsuario)){
							echo '<option value="'.$res['id'].'">'.$res['_usuario_nombre'].'			</option>';
						}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<th>Extencion</th>
				<td><input type="search" id="ext0" placeholder="Extencion"></td>
				<th>Extencion</th>
				<td><input type="search" id="ext1" placeholder="Extencion"></td>
			</tr>
			<tr>
				<th>Panel</th>
				<td><input type="search" id="panel0" placeholder="Panel"></td>
				<th>Panel</th>
				<td><input type="search" id="panel1" placeholder="Panel"></td>
			</tr>
			<tr>
				<td colspan="4">
					<textarea id="comentarios" rows="5" placeholder="Comentarios"></textarea>
				</td>
			</tr>
			<tr><td align="right" colspan="4"><button>Guardar</button></td></tr>
		</table>
		
	</center>
		
	</div>
	
	<?php echo $id;?>
</body>
</html>