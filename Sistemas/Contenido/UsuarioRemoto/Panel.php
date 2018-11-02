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
<title>Usuarios remoto</title>
	<LINK href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		td{
			min-width: 36.9vh;
			max-width: 36.9vh;
			word-break: break-all;
			border: none;
		}
	</style>
</head>

<body>
	
	<caption id="botones" style="text-align: right">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="#" onClick="descargarExcel()">Descargar</a>
		<a href="Nuevo.php">Agregar</a>
		
		<center>
			<form action="Panel.php" method="POST">
				<input type="search" placeholder="Buscar" width="30%" name="buscar" value="<?php echo $buscar;?>">
				<select name="agencia">
					<option value="">Todas</option>
					<?php
						$sql = "SELECT * FROM _agencia";
						$res = mysql_query($sql,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($res)){
							$agencia == $row['_agencia_nombre'] ? $selected = 'selected="selected"' : $selected = '';
							echo '<option value="'.$row['_agencia_nombre'].'" '.$selected.'>'.$row['_agencia_nombre'].'</option>';
						}
					?>
				</select>
				<button name="" type="submit">Buscar</button>
			</form>
		</center>
	</caption>
	
	<br>
	
	<center>
		<div id="informacion">
			<table border="1px" id="datos" width="100%">				
				<thead>
				<tr>
					<th class="td">Usuario</th>
					<th class="td">Contraseña</th>
					<th class="td">Nombre</th>
					<th class="td">Area</th>
					<th class="td">Servidor(es)</th>
					<th class="td">Agencia</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT * FROM usuariosremoto";
						$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){
					?>
					<tr>
						<td class="td" align="center">
							<a href="Editar.php?id=<?php echo $row["id"]; ?>"><?php echo $row["usuario"]; ?></a>
						</td>
						<td class="td" align="center"><?php echo $row["contrasena"]; ?></a></td>
						<td class="td" align="center"><?php echo $row["nombreUsuario"]; ?></td>
						<td class="td" align="center"><?php echo $row["areas"]; ?></td>
						<td class="td" align="center"><?php echo $row["np"]." - ".$row["ns"]; ?></td>
						<td class="td" align="center"><?php echo $row["agencias"]; ?></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</center>
	
</body>
</html>