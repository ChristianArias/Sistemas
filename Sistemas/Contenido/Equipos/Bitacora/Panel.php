<?php 

	$id = $_GET["id"];
	include("../../../conexion.php");

	$sql = "SELECT * FROM equipos WHERE id = $id";
	$rs = mysql_query($sql,$conex) or die (mysql_error());
	$result = mysql_fetch_array($rs);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bitacora del equipo</title>
	<link href="../../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<link href="../../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		.td{
			max-width: 32.4vw;
			min-width: 32.4vw;
			word-break: break-all;
			word-wrap: break-word;
		}
		tbody tr:hover{
			background: darkgray;
			color: white;
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="Nuevo.php?id=<?php echo $id;?>">Nuevo</a>
	</caption>
	
	<center>
		<br>
		<div id="informacion" class="fixedHeaderTable">
			<table id="datos" width="100%">
				<caption><?php echo $result["nombre"];?></caption>
				<thead>
					<tr>
						<th class="td" onclick="sortTable(0)">Motivo</th>
						<th class="td" onclick="sortTable(1)">Evento</th>
						<th class="td" onclick="sortTable(2)">Fecha</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT * FROM equipos_reportes WHERE idEquipo = $id";
						$res = mysql_query($sql,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($res)){
					?>
					<tr onClick="editar(<?php echo $row["id"]?>)">
						<td class="td"><?php echo $row["asunto"];?></td>
						<td class="td"><?php echo $row["evento"];?></td>
						<td class="td"><?php echo $row["fecha"];?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</center>
</body>
	<script>
		function editar(id){ location.href = "Editar.php?id="+id; }
	</script>
</html>