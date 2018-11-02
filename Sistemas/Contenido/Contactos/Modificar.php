<?php

	include("../../conexion.php");

	$id = $_GET["id"];
	$sql = "SELECT * FROM _telefonos WHERE id = $id";					
	$res = mysql_query($sql,$conex) or die (mysql_error());
	$row = mysql_fetch_array($res);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	
</head>
	<style>
		table{
			position: absolute;
			bottom: 30%;
		}
		.size{
			font-size: 80%;
		}
		.table{
			width: 90%;
		}
		.width{
			width: 100%;
		}
		textarea{
			resize: none;
		}
		#eliminar:hover{
			color: red;
		}
		@media screen and (max-width:700px){
			table{
				position: absolute;
				bottom: 10%;
			}
		}
	</style>
<body>
	<table class="table size">
		<tr><th colspan="4">Modificar contacto</th></tr>
		<tr>
			<td>Nombre completo</td>
			<td><input type="search" id="nombre" class="width" value="<?php echo $row["nombreCompleto"];?>" placeholder="Nombre completo"></td>
			<td rowspan="4" colspan="2" width="30%">
				<textarea id="comentarios" rows="7" class="width" placeholder="Comentarios"></textarea>
			</td>
		</tr>
		<tr>
			<td>Correo</td>
			<td><input type="search" id="correo" class="width" value="<?php echo $row["correoElectronico"];?>" placeholder="Correo"></td>
		</tr>
		<tr>
			<td>
				<select class="width">
					<option value="Trabajo">Trabajo</option>
					<option value="Particular">Particular</option>
					<option value="Movil">Movil</option>
					<option value="Principal">Principal</option>
				</select>
			</td>
			<td><input type="search" id="tel1" class="width" value="<?php echo $row["numero1"];?>" placeholder="Telefono"></td>
		</tr>
		<tr>
			<td>
				<select class="width">
					<option value="Trabajo">Trabajo</option>
					<option value="Particular">Particular</option>
					<option value="Movil">Movil</option>
					<option value="Principal">Principal</option>
				</select>
			</td>
			<td><input type="search" id="tel2" class="width" value="<?php echo $row["numero2"];?>" placeholder="Telefono"></td>
		</tr>
		<tr>
			<td colspan="2"><button id="eliminar" onClick="regresar()">Eliminar</button></td>
			<td colspan="2" align="right"><button>Actualizar</button></td>
		</tr>
	</table>
</body>
	<script>
		function regresar(){
			location.href = "";
		}
	</script>
</html>