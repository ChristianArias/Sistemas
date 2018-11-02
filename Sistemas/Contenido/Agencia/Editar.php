<?php 

	include("../../conexion.php");

	$id = $_GET["id"];
	$sql = "SELECT * FROM _agencia WHERE id = $id";
	$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
	$row = mysql_fetch_array($resUsuario);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		table{
			width: 50%;
			position: absolute;
			bottom: 10%;
			left: 25%;
		}
		textarea{
			width: 100%;
			resize: none;
		}	
	</style>
<body class="elemento">
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<br>
	
	<center>
		<table>
			<tr><th>Editar agencia</th></tr>
			<tr><th>Nombre</th></tr>
			<tr><td align="center"><input type="search" id="nombre" value="<?php echo $row["_agencia_nombre"]?>"></td></tr>
			<tr><th>Comentarios</th></tr>
			<tr><th><textarea id="comentario" rows="10"><?php echo $row['comentario']; ?></textarea></th></tr>
			<tr><td align="right"><button>Editar</button></td></tr>
		</table>
	</center>
</body>
</html>