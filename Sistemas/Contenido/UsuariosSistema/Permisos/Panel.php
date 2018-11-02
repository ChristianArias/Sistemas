<?php 

	$id = $_GET["id"];

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<LINK href="../../../CSS/General.css" rel="stylesheet" type="text/css">
	<script src="../../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<style>
		#modulos{
			width: 10%;
		}
		.td{
			min-width: 9.3vw;
			max-width: 9.3vw;
		}
		#datos{
			width: 100%;
		}
		#modulos,#permisos{
			font-size: 10px;
		}
	</style>
</head>

<body>
	
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		
		<center>
			<select id="modulos">
				<option value="0">Usuario</option>
				<option value="1">Administrador</option>
				<option value="3">Persolanizar</option>
			</select>
			
			<br><br>
			
			<table id="permisos" class="permisos">
				<tr>
					<td class="td"><input type="checkbox" id="alta">Alta</td>
					<td class="td"><input type="checkbox" id="baja">Baja</td>
					<td class="td"><input type="checkbox" id="modificar">Actualiza</td>
					<td class="td"><input type="checkbox" id="reportes">Reportes</td>
				</tr>
			</table>
		</center>
	</caption>
	
	<br>
	
	<div id="datos">
		<center>
			<table id="modulos" border="1px">
				<thead>
					<tr>
						<th class="td">Herramientas</th>
						<th class="td">Tickets</th>
						<th class="td">Relacion de Ip's</th>
						<th class="td">Equipos</th>
						<th class="td">Impresoras</th>
						<th class="td">Telefonia</th>
						<th class="td">Enlaces</th>
						<th class="td">Switchs</th>
						<th class="td">Paneles</th>
						<th class="td">Usuarios</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="td">
							<form name="formherramientas">
								<table width="100%">
									<tr><td><input type="checkbox" id="h1">Usuarios remoto</td></tr>
									<tr><td><input type="checkbox" id="h2">Dispositivos</td></tr>
									<tr><td><input type="checkbox" id="h3">Perifericos</td></tr>
									<tr><td><input type="checkbox" id="h4">Antivirus</td></tr>
									<tr><td><input type="checkbox" id="h5">paqueterias</td></tr>
									<tr><td><input type="checkbox" id="h6">Areas</td></tr>
									<tr><td><input type="checkbox" id="h7">Usuarios</td></tr>
									<tr><td><input type="checkbox" id="h8">Agencias</td></tr>
									<tr><td><input type="checkbox" id="h9">Contraseñas</td></tr>
									<tr><td><input type="checkbox" id="h10">Contactos</td></tr>
									<tr><td><input type="checkbox" id="h11">Errores y/o soluciones</td></tr>
									<tr><td><input type="checkbox" id="h12">Tareas</td></tr>
								</table>
							</form>
						</td>
						<td class="td">
							<table width="100%">
								<tr><td><input type="checkbox" id="areas">Panel de ticket's</td></tr>
							</table>
						</td>
						<td class="td">
							<table width="100%">
								<tr><td><input type="checkbox" id="areas">Relacion de Ip's</td></tr>
							</table>
						</td>
						<td class="td">
							<table width="100%">
								<tr><td><input type="checkbox" id="areas">Panel de equipos</td></tr>
								<tr><td><input type="checkbox" id="areas">Panel de perifericos</td></tr>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</center>
	</div>
	
	
</body>
	<script>
		function permisos(){
			$(".permisos").toggle();
  			$('tr:nth-child(1)').toggle();
		}
		function tbherramientas(){
			for (i=0;i<document.formherramientas.elements.length;i++){
				if(document.formherramientas.elements[i].type == "checkbox"){
					document.f1.elements[i].checked=1
				}
			}
		}
	</script>
</html>
	
	<!--
<table width="100%" border="1px">
		<tr>
			<td>
				<table border="1px">
					<tr><th>Herramientas</th></tr>
					<tr><td><input type="checkbox">Usuarios remoto</td></tr>
					<tr><td><input type="checkbox">Dispositivos</td></tr>
					<tr><td><input type="checkbox">Perifericos</td></tr>
					<tr><td><input type="checkbox">Antivirus</td></tr>
					<tr><td><input type="checkbox">Paqueterias</td></tr>
					<tr><td><input type="checkbox">Areas</td></tr>
					<tr><td><input type="checkbox">Usuario</td></tr>
					<tr><td><input type="checkbox">Agencias</td></tr>
					<tr><td><input type="checkbox">Contraseñas</td></tr>
					<tr><td><input type="checkbox">Contactos</td></tr>
					<tr><td><input type="checkbox">Errores y/o Soluciones</td></tr>
					<tr><td><input type="checkbox">Tareas</td></tr>
				</table>
			</td>
			<td>
				<table border="1px">
					<tr><th>Ticket's</th></tr>
					<tr><td><input type="checkbox">Panel de Ticket's</td></tr>
					<tr><td><input type="checkbox">Nuevo</td></tr>
					<tr><th>Relacion de Ip's</th></tr>
					<tr><td><input type="checkbox">Relacion de Ip's</td></tr>
				</table>
			</td>
			<td>
				<table border="1px">
					<tr><th>Equipos</th></tr>
					<tr><td><input type="checkbox">Panel de equipos</td></tr>
					<tr><td><input type="checkbox">Dispositivos</td></tr>
					<tr><td><input type="checkbox">Perifericos</td></tr>
					<tr><td><input type="checkbox">Antivirus</td></tr>
					<tr><td><input type="checkbox">Paqueterias</td></tr>
					<tr><td><input type="checkbox">Areas</td></tr>
					<tr><td><input type="checkbox">Usuario</td></tr>
					<tr><td><input type="checkbox">Agencias</td></tr>
					<tr><td><input type="checkbox">Contraseñas</td></tr>
					<tr><td><input type="checkbox">Contactos</td></tr>
					<tr><td><input type="checkbox">Errores y/o Soluciones</td></tr>
					<tr><td><input type="checkbox">Tareas</td></tr>
				</table>
			</td>
		</tr>
	</table>