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
<title>Documento sin título</title>
</head>
	<LINK href="../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		#datos{
			height: 50%;
		}
		.td{
			width: 50%;
			width: 500vh;
			width: 500mh;
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
<body>
	<caption id="botones" style="text-align: right" class="elemento">
		
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="#" onClick="descargarExcel()">Descargar</a>
		<a href="Nuevo.php">Agregar</a>
		
		<center>
			<div id="busqueda">
				<form action="Panel.php" method="POST">
					<input type="search" placeholder="Buscar antivirus" width="30%" name="buscar" value="<?php echo $buscar;?>">
					<button name="" type="submit">Buscar</button>
				</form>
			</div>
		</center>
		
	</caption>
	
	<center>
		<div id="informacion" class="fixedHeaderTable">
			<table id="datos" width="100%">
				<thead class="elemento">
					<tr>
						<th class="td">Nombre</th>
						<th class="td">Licencia</th>
						<th class="td">Licencias libres</th>
						<th class="td">Tipo</th>
						<th class="td">Comentario</th>
						<th class="td">Fecha</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT * FROM antivirus WHERE nombre LIKE '%$buscar%'";
					
						$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){
					?>
					<tr>
            			<TD class="td">
							<a href="Editar.php?id=<?php echo $row["id"]?>"><?php echo $row['nombre']; ?></a>
						</TD>
            			<TD class="td" align="center"><?php echo $row['cantlicencias']; ?></TD>
						<TD class="td" align="center"><?php echo $row['libres']; ?></TD>
						<TD class="td"><?php echo $row['tipolicencias']; ?></TD>
						<TD class="td"><?php echo $row['comentario']; ?></TD>
						<TD class="td">
							<?php 
								$dias = $row['dias'];
								$licencias = $row['cantlicencias'];						
								if($licencias > 1){
									if($dias > 0){
										echo "<font color='black'>Caduca en ".$row['dias']." dias</font>";
									}else{
										echo "<font color='red'>Caduca en ".$row['dias']." dias</font>";
									}
								}else{
									echo '<font color="black"> Licencia libre </font>';
								}
							?>
						</TD>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		
	</center>
</body>
</html>