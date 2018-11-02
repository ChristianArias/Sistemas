<?php
	
	include("../../conexion.php");
	$id = $_GET["id"];
	$con = "SELECT * FROM dispositivos WHERE id = $id";
	$res = mysql_query($con,$conex) or die (mysql_error());
	$row = mysql_fetch_array($res);	

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar tipo de dispositivo</title>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		.table{
			width: 50%;
			position: absolute;
			bottom: 20%;
			right: 25%
		}
		.mensaje{
			width: 50%;
			position: absolute;
			bottom: 10%;
			right: 25%
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
		.left{
			text-align: left;
			width: 30%;
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<center>
		<br><br>
		<center><font size="+3">Editar tipo</font><br></center>
		<br>
		<table class="table">
			<tr>
				<th class="left">Nombre del dispositivo</th>
				<td>
					<input type="search" id="nombre" value="<?php echo $row["_dispositivos_nombre"];?>">
				</td>
			</tr>
			<tr><th colspan="2">Comentarios</th></tr>
			<tr>
				<td colspan="2">
					<textarea id="comentarios" rows="10"><?php echo $row["comentario"];?></textarea>
				</td>
			</tr>
			<tr>
				<td><button onClick="del(<?php echo $row["id"].",".$row["cantidad"];?>)">Eliminar</button></td>
				<td align="right"><button onClick="editar()">Actualizar</button></td>
			</tr>
		</table>
		<center><label id="mensaje" class="mensaje"></label></center>
	</center>
</body>
	<script>
		function del(id,cant){
			var a = document.getElementById("mensaje");			
			if(cant>0){ 
				a.innerHTML = "Imposible eliminar,tiene "+cant+" dispositivos asignados";
				a.style.color = "red";
			} else {
				var r = confirm("¿Deseas eliminar esta clave?");
				if(r == true) location.href = "sav_Eliminar.php?id="+id;
				else location.href = "Panel.php";
			}
		}
		function editar(){
			var id = <?php echo $id;?>;
			var n = document.getElementById("nombre").value;
			var c = document.getElementById("comentarios").value;
			location.href = "sav_Editar.php?id="+id+"&nombre="+n+"&comentarios="+c;			
		}
	</script>
</html>