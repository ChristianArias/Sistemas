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
<title>Nuevo evento</title>
	<style>
		table{
			width: 100%;
		}
		a{
			color: black;
			text-decoration: none;
		}
		a:hover{
			color: red;
		}
		#asunto,#evento{
			width: 99.5%;
			resize: none;
		}
		#espacios{
			min-height: 10vh;
		}
		#mensaje{
			align-content: center;
			text-align: center;
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right">
		<a href="Panel.php?id=<?php echo $id;?>">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<div id="espacios"></div>
	
	<table>
		<tr><td align="right" colspan="2"><input type="date" id="fecha" value="<?php echo date("Y-m-d");?>"></td></tr>
		<tr><td align="center" colspan="2"><?php echo "Movimiento de ".$result["nombre"];?></td></tr>
		<tr><td colspan="2">* Evento</td></tr>
		<tr><td colspan="2"><input type="text" id="evento"></td></tr>
		<tr><td colspan="2">Asunto</td></tr>
		<tr><td colspan="2"><textarea id="asunto" rows="10"></textarea></td></tr>
		<tr><td align="center" colspan="2"><label id="mensaje"> </label></td></tr>
		<tr>
			<td><input type="checkbox" id="fin" name="fin"><label for="fin">Finalizado</label></td>
			<td align="right"><button onClick="guardar()">Guardar</button></td>
		</tr>
	</table>
</body>
	<script>
		function guardar(){
			var id = <?php echo $id;?>;
			var date = document.getElementById("fecha").value;
			var evento = document.getElementById("evento").value;
			var asunto = document.getElementById("asunto").value;
			var fin = document.getElementById("fin").checked;
			
			if(Boolean(evento)){
				location.href = "sav_Nuevo.php?id="+id+"&date="+date+"&evento="+evento+"&asunto="+asunto+"&fin="+fin;
			}else{
				document.getElementById("mensaje").innerHTML = "Evento es necesario";
			}
		}
	</script>
</html>