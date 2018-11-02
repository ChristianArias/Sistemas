<?php 
	
	include("../../../conexion.php");

	$id = $_GET["id"];
	$sql = "SELECT * FROM _contrasenas WHERE id = $id";
	$res = mysql_query($sql,$conex) or die (mysql_error());
	$row = mysql_fetch_array($res);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Nuevo reporte contraseñas</title>
	<script src="../../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../../JS/1.12.1/jquery-ui.js"></script>
	<LINK href="../../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		table{
			width: 100%;
		}
		#motivo,#observaciones{
			width: 99.5%;
			resize: none;
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right">
		<a href="Panel.php?id=<?php echo $id;?>">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	<br><br><br>
	<table>
		<tr><td colspan="4" align="center">Nuevo reporte</td></tr>
		<tr><th colspan="4"><?php echo $row["servicio"];?></th></tr>
		<tr>
			<th>No. reporte</th>
			<td><input type="search"></td>
			<th align="right">Fecha de reporte</th>
			<td align="right"><input type="date" value=""></td>
		</tr>
		<tr><th colspan="4" align="center">Motivo</th></tr>
		<tr><td colspan="4"><textarea id="motivo" rows="6"></textarea></td></tr>
		<tr><th colspan="4" align="center">Observaciones</th></tr>
		<tr><td colspan="4"><textarea id="observaciones" rows="6"></textarea></td></tr>
		<tr>
			<td colspan="4" align="right">
				<select id="estatus">
					<option value="0">Activo</option>
					<option value="1">En espera</option>
					<option value="2">Cerrado</option>
				</select>
			</td>
		</tr>
		<tr><td colspan="4" align="right"><button>Guardar</button></td></tr>
	</table>
</body>
</html>