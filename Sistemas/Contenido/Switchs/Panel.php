<?php 
	
	include("../../conexion.php");

	if(isset($_POST['buscar'])){
		$buscar = $_POST['buscar'];
	}else{
		$buscar = "";
	}

	if(isset($_POST['agencia'])){
		$agencia = mysql_real_escape_string($_POST['agencia']);	
	}else{
		$agencia = "";
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Panel de Switch's</title>
	<LINK href="../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		.td{
			width: 9%;
			width: 50vh;
			width: 50mh;
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
	<caption id="botones" style="text-align: right" class="elemento">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="#" onClick="descargarExcel()">Descargar</a>
		<a href="Nuevo.php">Agregar</a>
		
		<center>
			<div id="busqueda">
				<form action="Panel.php" method="POST">
					<input type="search" placeholder="Buscar switch's" width="30%" name="buscar" value="<?php echo $buscar;?>">
					<button name="" type="submit">Buscar</button>
				</form>
			</div>
		</center>
		
	</caption>
	
	<br>
	
	<center>
		<div id="informacion" class="fixedHeaderTable">
			<table id="datos" width="100%">
				<thead>
				<tr>
					<th class="td">Nombre</th>
					<th class="td">Serie</th>
					<th class="td">Marca</th>
					<th class="td">Modelo</th>
					<th class="td">Ip</th>
					<th class="td">Puertos</th>
					<th class="td">Area</th>
					<th class="td">Agencia</th>
					<th class="td">Transmision</th>
					<th class="td">Usuario</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT * FROM switch WHERE nombre LIKE '%$buscar%'";
					
						$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){
					?>
					<tr>
            			<TD class="td">
							<a href="Editar.php?switch=<?php echo $row["id"]?>"><?php echo $row['nombre']; ?></a>
						</TD>
						<TD class="td"><?php echo $row['serie']; ?></TD>
						<TD class="td"><?php echo $row['marca']; ?></TD>
						<TD class="td"><?php echo $row['modelo']; ?></TD>
						<TD class="td"><?php echo $row['ip']; ?></TD>
            			<TD class="td" align="center">
							<a href="Puertos/Panel.php?switch=<?php echo $row["id"];?>">
								<?php echo $row['puertos']." puertos"; ?>
							</a>
						</TD>
						<TD class="td"><?php echo $row['areas']; ?></TD>
						<TD class="td"><?php echo $row['agencias']; ?></TD>
						<TD class="td"><?php echo $row['potenciatransmision']; ?></TD>
						<TD class="td"><?php echo $row['usuario']; ?></TD>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		
	</center>
	
</body>
</html>