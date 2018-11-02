<?php 
	
	include("../../conexion.php");
	$id = $_GET["id"];
	$consulta = "SELECT * FROM _perifericos WHERE id = $id";
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
	$row = mysql_fetch_array($resultado);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar periferico</title>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<!--<LINK href="../../CSS/estyle.css" rel="stylesheet" type="text/css">-->
	<LINK href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<script src="../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../JS/1.12.1/jquery-ui.js"></script>
	<style>
		.body{
			font-size: 10px;
		}
		iframe{
			border: none;
			height: 73vh;
			width: 99.5%;
		}
		#datos{
			width: 100%;
			border: 1px solid black;
		}
		.tabla{
			width: 100%;
		}
		#comentarios{
			width: 80%;
			resize: none;
		}
		#asignado{
			width: 99%;
		}
		input,select{
			width: 98%;
		}
		.button{
			border: none;
			background: white;
		}
		.buttonsel:hover{
			color: red;
			
		}
		.tablaBorder{
			border: 1px solid black;
		}
		#descripcion{
			height: 75vh;
		}
		#detalles{
			width: 100%;
			position: absolute;
			top: 35%;
			left: 0%;
		}
		#guardar{
			border: 1px solid grey;
		}
		@media screen and (max-width:800px){
			#descripcion{
				height: 100vh;
			}
		}
		#mensaje{
			color: red;
		}
		
		div.tab {
			overflow: hidden;
			background-color: #f1f1f1;
		}

		div.tab button {
			background-color: inherit;
			float: left;
			border: none;
			outline: none;
			cursor: pointer;
			padding: 8px 10px;
			transition: 0.3s;
			font-size: 10px;
		}

		div.tab button:hover {
			background-color: #ddd;
		}

		div.tab button.active {
			background-color: #ccc;
		}

		a {
			text-decoration: none;
			color: black;
		}

		.tabcontent {
			display: none;
			padding: 3px 6px;
			border-top: none;
		}

		.main {
			font-family: 	Arial, Verdana, sans-serif;
			color:		black;
			font-size:	8px;
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<br><center><label id="titulo" class="elemento">Actualizar equipo <?php echo $row["nombre"];?></label></center><br>
	
	<div class="tab">
		<button class="tablinks" onclick="openCity(event, 'descripcion')" id="defaultOpen">Descripción</button>
  		<button class="tablinks" onclick="openCity(event, 'divarquitectura')">Arquitectura</button>
        <button class="tablinks" onclick="openCity(event, 'divso')">Sistema operativo</button>
		<button class="tablinks" onclick="openCity(event, 'divred')">Red</button>
		<button class="tablinks" onclick="openCity(event, 'documentacion')">Documentacion</button>
    </div>
<!------------------------------------------------------------------------------------------------------------------------>
	<div id="descripcion" class="tabcontent body">
		<br>
			<table border="1px" class="tabla elemento"><tr><th>Descripción</th></tr></table>
		<br>
		
		<div id="detalles">
			<br>
			<table class="elemento" width="100%">
				<tr>
					<th class="th" width="10%">Tipo</th>
					<td class="td" width="40%">
						<select id="tipo">
							<?php
								$con = "SELECT * FROM _dispositivos ORDER BY _dispositivos_nombre";
								$resUsuario = mysql_query($con,$conex) or die (mysql_error());
								while($res = mysql_fetch_array($resUsuario)){
									$res["id"] == $row["tipo"] ? $selected = 'selected="selected"' : $selected = "";
									echo '<option value="'.$res['id'].'" '.$selected.'>'.$res['_dispositivos_nombre'].'</option>';
								}
							?>
						</select>
					</td>
					<th class="th" width="10%"></th>
					<td class="td" width="40%"></td>
				</tr>
				<tr>
					<th class="th">Marca</th>
					<td class="td">
						<input type="search" id="marca" placeholder="Marca" value="<?php echo $row["marca"];?>">
					</td>
					<th class="th">Modelo</th>
					<td class="td">
						<input type="search" id="modelo" placeholder="Modelo" value="<?php echo $row["modelo"];?>">
					</td>
				</tr>
				<tr>
					<th class="th">Numero de serie</th>
					<td>
						<input type="search" id="serie" placeholder="Numero de serie (Serial)" value="<?php echo $row["serie"];?>">
					</td>
				</tr>
				<tr>
					<th class="th">Asignado</th>
					<td colspan="3">
						<select id="asignado">
							<?php
								$conUsuario = "SELECT * FROM _usuario ORDER BY _usuario_nombre";
								$resUsuario = mysql_query($conUsuario,$conex) or die (mysql_error());
								while($res = mysql_fetch_array($resUsuario)){
									$res["id"] == $row["asignado"] ? $selected = 'selected="selected"' : $selected = "";
									echo '<option value="'.$res['id'].'" '.$selected.'>'.$res['_usuario_nombre'].'</option>';
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="th">Area</th>
					<td>
						<select id="area">
							<?php
								$con = "SELECT * FROM _areas ORDER BY _areas_nombre";
								$resUsuario = mysql_query($con,$conex) or die (mysql_error());
								while($res = mysql_fetch_array($resUsuario)){
									$res["id"] == $row["area"] ? $selected = 'selected="selected"' : $selected = "";
									echo '<option value="'.$res['id'].'" '.$selected.'>'.$res['_areas_nombre'].'</option>';
								}
							?>
						</select>
					</td>
					<th class="th">Agencia</th>
					<td>
						<select id="agencia">
							<?php
								$con = "SELECT * FROM _agencia ORDER BY _agencia_nombre";
								$resUsuario = mysql_query($con,$conex) or die (mysql_error());
								while($res = mysql_fetch_array($resUsuario)){
									$res["id"] == $row["agencia"] ? $selected = 'selected="selected"' : $selected = "";
									echo '<option value="'.$res['id'].'" '.$selected.'>'.$res['_agencia_nombre'].'</option>';
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<th>Fecha de compra</th>
					<td><input type="date" id="fcompra" value="<?php echo date("Y-m-d");?>"></td>
					<th>Garantia</th>
					<td><input type="number" id="garantia" min="0" value="0"></td>
				</tr>
				<tr><th colspan="4">Comentarios</th></tr>
				<tr>
					<td colspan="4" align="center">
						<textarea id="comentarios" rows="5"></textarea>
					</td>
				</tr>
				<tr><th colspan="4"></th></tr>
			</table>
		</div>
	</div>
	<!------------------------------------------------------------------------------------------------->
	<div id="divarquitectura" class="tabcontent body">
		<br>
		<table border="1px" class="tabla elemento"><tr><th>Arquitectura</th></tr></table>
		<br>
		<table class="tabla elemento">
			<tr>
				<td width="50%">
					<table width="100%">
						<tr><th class="th" colspan="2">Procesador</th></tr>
						<tr>
							<th class="th">Nombre</th>					
							<td>
								<input type="search" id="procesador" placeholder="Procesador">
							</td>
						</tr>
						<tr>
							<th>Arquitectura</th>
							<td>
								<input type="search" id="arquitectura" placeholder="Arquitectura">
							</td>
						</tr>
					</table>
				</td>

				<td width="50%">
					<table width="100%">
						<tr><th class="th" colspan="4">Memoria Ram</th></tr>
						<tr>
							<th class="th">Memoria Fisica</th>
							<td>
								<input type="search" id="memoria" placeholder="Memoria Fisica">
							</td>
							<th class="th">Slot's</th>
							<td>
								<select id="slots">
									<?php
										for($i = 1;$i<15;$i++){
											echo "<option>".$i."</option>";
										}
									?>
								</select>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td>
					<table width="100%">
						<tr><th class="th" colspan="4">Almacenamiento(Disco duro)</th></tr>
						<tr>
							<th class="th">Tamaño</th>
							<td><input type="search" id="dd" placeholder="Tamaño disco duro"></td>
						</tr>
						<tr>
							<th>Numero de serie</th>
							<td>
								<input type="search" id="ddserie" placeholder="Numero de serie (Diso Duro)" value="">
							</td>
						</tr>
					</table>
				</td>
			</tr>

		</table>
	</div>
	
	<div id="divso" class="tabcontent body">
		<br>
			<table border="1px" class="tabla elemento"><tr><th>Sistema operativo</th></tr></table>
		<br>
	</div>
	<div id="divred" class="tabcontent body">
		<br>
			<table border="1px" class="tabla elemento"><tr><th>Red</th></tr></table>
		<br>
	</div>
	
	<div id="documentacion" class="tabcontent body">
		
		<br>
		
		<table border="1px" class="tabla elemento"><tr><th>Documentacion</th></tr></table>
		
		<br>
		
		<table width="100%" class="tablaBorder">
			<tr><th colspan="2">Factura</th></tr>
			<tr>
				<td width="20%">
					<?php $factura = $row["factura"];	$responsiva = $row["responsiva"];?>
					
					<button class="button buttonsel" onClick="modal('Factura/Panel.php?id=<?php echo $row["id"];?>&serie=<?php echo $row["serie"];?>')">
						Cargar factura
					</button>				
				</td>
				<td width="80%" align="center">
					<?php
						echo $exists = file_exists($factura) ? 
						'<a href="Factura/pdf.php?archivo='.base64_encode($factura).'" target="_blank">Ver archivo </a>' : "";

						echo $exists = file_exists($factura) ? 
							'<a href="Factura/descargar.php?archivo='.base64_encode($factura).'">Descargar archivo </a>' : 
							"Error:no se encuentra el archivo o no se ah cargado. ";

						echo $factura != "" ? 
							"<font color='gray'>Ya se ah cargado una factura,el cargar otra factura remplazaria la anterior</font>" : 
							"Cargar factura";
					?>
				</td>
			</tr>
		</table>

		<br>
		
		<table width="100%" class="tablaBorder">
			<tr><th colspan="3">Responsiva</th></tr>
			<tr>
				<td width="12%">
					<button class="button buttonsel" onClick="responsiva(<?php echo $id;?>)">
						Generar responsiva
					</button>				
				</td>
				<td width="10%">
					<button class="button buttonsel" onClick="modal('Responsiva/Panel.php?id=<?php echo $row["id"];?>&serie=<?php echo $row["serie"];?>')">
						Cargar responsiva
					</button>
				</td>
				
				<td width="80%" align="center">
					<?php
						echo $exists = file_exists($responsiva) ? 
						'<a href="Factura/pdf.php?archivo='.base64_encode($responsiva).'" target="_blank">Ver archivo </a>' : "";

						echo $exists = file_exists($responsiva) ? 
							'<a href="Factura/descargar.php?archivo='.base64_encode($responsiva).'">Descargar archivo </a>' : 
							"Error:no se encuentra el archivo o no se ah cargado. ";

						echo $responsiva != "" ? 
							"<font color='gray'>Ya se ah cargado una responsiva,el cargar otra responsiva remplazaria la anterior</font>" : 
							"Cargar responsiva";
					?>
				</td>
			</tr>
		</table>
		
	</div>
	<div id="openModal" class="modalDialog">
		<div class="elemento">
			<a href="#close" title="Close" class="close">X</a>
			<iframe id="ventana" width="100%" height="100%" src="" class="ventana">
			
			</iframe>
		</div>
	</div>
</body>
	<script>
		function modal(pagina){
			location.href = "#openModal";
			document.getElementById("ventana").src = pagina;
		}
		function responsiva(id){
			location.href = "Responsiva/generarResponsiva.php?id="+id;
		}
		
		function openCity(evt, cityName) {
    		var i, tabcontent, tablinks;
    		tabcontent = document.getElementsByClassName("tabcontent");
    		for (i = 0; i < tabcontent.length; i++) {
        		tabcontent[i].style.display = "none";
    		}
    		tablinks = document.getElementsByClassName("tablinks");
    		for (i = 0; i < tablinks.length; i++) {
        		tablinks[i].className = tablinks[i].className.replace(" active", "");
    		}
    		document.getElementById(cityName).style.display = "block";
    		evt.currentTarget.className += " active";
		}
		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();	
	</script>
</html>