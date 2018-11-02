<?php 

	include("../../../conexion.php");

	date_default_timezone_set('America/Mexico_City');

	$id = $_GET["id"];
	$sql = "SELECT * FROM _impresoras WHERE id = $id";					
	$res = mysql_query($sql,$conex) or die (mysql_error());
	$row = mysql_fetch_array($res);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<LINK href="../../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
</head>
	<style>
		a{
			color: black;
			text-decoration: none;
		}
		a:hover{
			color: red;
		}
		.tabla{
			width: 60%;
		}
		input[type="search"]{
			width: 100%;
		}
		textarea{
			width: 99%;
			height: 40%;
			resize: none;
		}
		body{
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
		<a href="Panel.php?<?php echo "id=".$row["id"]; ?>">Regresar</a>
		<a href="javascript:window.location.reload();">Actualizar</a>
		<a href="#openModal" onClick="alerta()">Contactos</a>
	</caption>
	
	<center>
		<table class="tabla">
			<caption>Nuevo reporte</caption>
			<thead>
				<tr>
					<th align="center" colspan="4">
						<?php
							$i = strlen($row["serie"])-6;
							echo $row["nombre"]." ( ".substr($row["serie"],0,$i).'<font style="text-decoration:underline;">'.substr($row["serie"],-6).'</font>'." )";
						?>
					</th>
				</tr>
				<tr>
					<th>N° de reporte</th>
					<td><input type="search" id="reporte"></td>
					<th>Fecha de reporte</th>
					<td>
						<input type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d")?>" align="middle" />
					</td>
				</tr>
				<tr><th colspan="4">Falla reportada</th></tr>
				<tr>
					<td colspan="4">
						<textarea rows="12" id="falla"></textarea>
					</td>
				</tr>
				<tr><th colspan="4">Trabajo efectuado</th></tr>
				<tr>
					<td colspan="4">
						<textarea rows="12" id="trabajo"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="4" align="right"><button onClick="salvar(<?php echo $id;?>)">Guardar</button></td>
				</tr>
			</thead>
		</table>
	</center>
	
	<div id="openModal" class="modalDialog">
		<div class="elemento">
			<a href="#close" title="Close" class="close">X</a>
			<center></cen><label id="name"></label></center>
			<iframe id="ventana" width="100%" height="100%" src="" class="ventana">
			
			</iframe>
		</div>
	</div>
	
	<script>
		function alerta(){
			document.getElementById("ventana").src = "../../Contactos/Panel.php";
		}
		function salvar(id){
			var reporte = document.getElementById("reporte").value;
			var fecha 	= document.getElementById("fecha").value;
			var falla 	= document.getElementById("falla").value;
			var trabajo = document.getElementById("trabajo").value;
			
			location.href = "save_reporte.php?id="+id+"&numero="+reporte+"&fecha="+fecha+"&falla="+falla+"&trabajo="+trabajo;
		}
	</script>
</body>
</html>