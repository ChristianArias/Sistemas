<?php
	
	include("../../conexion.php");

	if(isset($_POST['buscar'])){
		$buscar = $_POST['buscar'];
	}else{
		$buscar = "";
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dispositivos</title>
	<LINK href="../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		.td{
			width: 33%;
			width: 80vh;
			width: 80mh;
		}
		.button{
			width: 100%;
			height: auto;
			font-size: 100%;
		}
		tbody tr:hover{
			background: darkgray;
			color: white;
		}
		tbody a:hover{
			color: red;
		}
	</style>
</head>

<body>
	
	<caption id="botones" style="text-align: right">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="#" onClick="descargarExcel()">Descargar</a>
		<a href="Agregar.php">Agregar</a>
	</caption>
		
	<center>
		<div id="busqueda">
			<form action="Panel.php" method="POST">
				<input type="search" placeholder="Buscar dispositivo" width="30%" name="buscar" value="<?php echo $buscar;?>">
				<button name="" type="submit">Buscar</button>
			</form>
		</div>
	</center>
	
	<br>
	
	<div id="informacion" class="fixedHeaderTable">
		<table id="datos" width="100%">
			<thead class="elemento">
				<tr>
					<th class="td">Nombre</th>
					<th class="td">Cantidad</th>
					<th class="td">Comentario</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$con = "SELECT * FROM dispositivos WHERE _dispositivos_nombre LIKE '%$buscar%'";
					$resultadoRep = mysql_query($con,$conex) or die (mysql_error());
					while($row = mysql_fetch_array($resultadoRep)){
				?>
				<tr onClick="ir('Editar.php?id=<?php echo $row["id"];?>')">
					<td class="td">
						<?php echo $row["_dispositivos_nombre"];?>
					</td>
					<td class="td" align="center"><?php echo $row["cantidad"]." dispositivos";?></td>
					<td class="td"><?php echo $row["comentario"];?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	
</body>
	<script>
		function ir(pagina){
			location.href = pagina;
		}	
	</script>
</html>