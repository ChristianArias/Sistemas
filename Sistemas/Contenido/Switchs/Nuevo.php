<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Agregar Switch</title>
	<style>
		table{
			width: 60%;
			position: relative;
			margin: 5% auto;
		}
		input{
			width: 100%;
		}
		select{
			width: 50%;
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right" class="elemento">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<table>
		<caption id="titulo">Agregar Switch</caption>
		<tr>
			<th width="15%">Nombre</th>
			<td width="35%"><input type="search" id="nombre"></td>
			<th width="15%">Numero de serie</th>
			<td width="35%"><input type="search" id="serie"></td>
		</tr>
		<tr>
			<th width="15%">Marca</th>
			<td width="35%"><input type="search" id="marca"></td>
			<th width="15%">Modelo</th>
			<td width="35%"><input type="search" id="modelo"></td>
		</tr>
		<tr>
			<th width="15%">Direccion ip</th>
			<td width="35%"><input type="search" id="ip"></td>
			<th width="15%"></th>
			<td width="35%"></td>
		</tr>
		
		<tr>
			<th>Potencia de transmision</th>
			<td><input type="search" id="potencia"></td>
			<th>Administrable</th>
			<td align="left"><input type="checkbox" id="administrable"></td>
		</tr>
		<tr>
			<th>No. de brincos</th>
			<td>
				<select id="brincos">
					<?php 
						for($i = 0;$i<100;$i++){
							echo "<option>".$i."</option>";
						}
					
					?>
				</select>
			</td>
			<th>No. de puertos</th>
			<td>
				<select id="puertos">
					<?php 
						for($i = 0;$i<100;$i++){
							echo "<option>".$i."</option>";
						}
					
					?>
				</select>
			</td>
		</tr>
		<tr>
			<th>No. de puertos Fibra</th>
			<td>
				<select id="fibra">
					<?php 
						for($i = 0;$i<100;$i++){
							echo "<option>".$i."</option>";
						}
					
					?>
				</select>
			</td>
			<th>No. de puertos cascadeo</th>
			<td>
				<select id="cascadeo">
					<?php 
						for($i = 0;$i<100;$i++){
							echo "<option>".$i."</option>";
						}
					
					?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Area</th>
			<td></td>
			<th>Agencia</th>
			<td></td>
		</tr>
		<tr>
			<th>Tipo</th>
			<td></td>
		</tr>
		<tr>
			<th>Usuario</th>
			<td><input type="search" id="usuario"></td>
			<th>Contraseña</th>
			<td><input type="password" id="pwd"></td>
		</tr>
		<tr><td colspan="4" align="right"><button>Guardar</button></td></tr>
	</table>
</body>
</html>