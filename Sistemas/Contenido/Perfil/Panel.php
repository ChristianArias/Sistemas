<?php

	include("../../conexion.php");

	session_start();

	$id = $_SESSION['sis_id'];

	$sql = "SELECT * FROM usuariossistema WHERE id = $id";
	$res = mysql_query($sql,$conex) or die (mysql_error());
	$row = mysql_fetch_array($res);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
	<style>
		.tabla{
			width: 50%;
			position: absolute;
			right: 10%;
			top: 8%;
		}
		#userpic{
			width: 30%;
			height: 80%;
			position: absolute;
			top: 10%;
			left: 2%;
			border: 1px solid white;
			resize: both;
		}
		#userbackground{
			width: 50%;
			height: 50%;
			position: absolute;
			top: 40%;
			left: 35%;
			border: 1px solid white;
			resize: both;
		}
		.elemento{
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-o-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
	</style>
	<!--background="data:image/jpeg;base64,<?php //echo base64_encode($row["fondo"]); ?>"-->
<body >
	
	<div id="userpic">
		<label>Imagen de usuario</label>
		<img src="data:image/jpeg;base64,<?php echo base64_encode($row["imagen"]);?>" width="100%" height="100%">
		<br>
		<input type="file">
	</div>
	
	<div id="userbackground">
		<label>Imagen de fondo</label>
		<img src="data:image/jpeg;base64,<?php echo base64_encode($row["fondo"]);?>" width="100%" height="100%">
		<br>
		<input type="file">
	</div>
	
	<table class="tabla elemento">
		<tr>
			<th colspan="3"><?php echo $row["nombre"]." ".$row["apellido"];?></th>
		</tr>
		<tr>
			
			<td width="40%">Nombre</td>
			<td width="25%"><?php echo $row["usuario"];?></td>
		</tr>
		<tr>
			<td>Apellido</td>
			<td><?php echo $row["usuario"];?></td>
		</tr>
		<tr>
			<td>Usuario</td>
			<td><?php echo $row["usuario"];?></td>
		</tr>
		<tr>
			<td>Contraseña</td>
			<td><a href="Contrasena/Cambiar.php">Actualizar</a></td>
		</tr>
		<tr>
			<td>Correo</td>
			<td><?php echo $row["correo"];?></td>
		</tr>
		<tr>
			<td>Telefono</td>
			<td><?php echo $row["telefono"];?></td>
		</tr>
		<tr>
			<td>Movil</td>
			<td><?php echo $row["movil"];?></td>
		</tr>
	</table>
	
</body>
</html>