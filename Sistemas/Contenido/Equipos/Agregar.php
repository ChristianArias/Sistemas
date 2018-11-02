<?php 

	include("../../conexion.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<!--<LINK href="../../CSS/estyle.css" rel="stylesheet" type="text/css">-->
		
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
	
<body class="elemento">
	
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<div style="float:right">
			<a href="LoadPC.rar" download="LoadPC.rar">PC loader</a>
		</div>
	</caption>
	
	<center><font size="+3">Nuevo equipo</font><br><label id="mensaje"></label></center>
		
	
	<div class="tab">
		<button class="tablinks" onclick="openCity(event, 'descripcion')" id="defaultOpen">Descripción</button>
  		<button class="tablinks" onclick="openCity(event, 'divarquitectura')">Arquitectura</button>
        <button class="tablinks" onclick="openCity(event, 'divso')">Sistema operativo</button>
		<button class="tablinks" onclick="openCity(event, 'red')" id="defaultOpen">Red</button>
		<button class="tablinks" onclick="openCity(event, 'paquet')" id="defaultOpen">Paqueterias / Antivirus</button>
		<div style="float:right">
			<button onClick="guardar()" id="guardar">Guardar</button>
		</div>
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
					<td class="td"><input type="search" id="marca" placeholder="Marca"></td>
					<th class="th">Modelo</th>
					<td class="td"><input type="search" id="modelo" placeholder="Modelo"></td>
				</tr>
				<tr>
					<th class="th">Numero de serie</th>
					<td><input type="search" id="serie" placeholder="Numero de serie (Serial)"></td>
				</tr>
				<tr>
					<th class="th">Asignado</th>
					<td colspan="3">
						<select id="asignado">
							<?php
								$conUsuario = "SELECT * FROM _usuario ORDER BY _usuario_nombre";
								$resUsuario = mysql_query($conUsuario,$conex) or die (mysql_error());
								while($res = mysql_fetch_array($resUsuario)){
									$res["id"] == $row["usuario"] ? $selected = 'selected="selected"' : $selected = "";
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
<!------------------------------------------------------------------------------------------------------------------------>
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
<!------------------------------------------------------------------------------------------------------------------------>
	<div id="divso" class="tabcontent body">
		<br>
		<table border="1px" class="tabla elemento"><tr><th>Sistema operativo</th></tr></table>
		<br>
		<table class="tabla elemento">
			<tr>
				<th class="th">Sistema operativo</th>
				<td class="td" colspan="3">
					<input type="search" id="so" placeholder="Sistema operativo">
				</td>
				<th class="th">Fecha de instalacion</th>
				<td><input type="date"></td>
			</tr>
			<tr>
				<th class="th">Windows product key(OEM)</th>
				<td><input type="search" id="winoem" placeholder="Windows product key(OEM)"></td>
				<th class="th">Windows product key(INSTALADO)</th>
				<td>
					<input type="search" id="wininst" placeholder="Windows product key(INSTALADO)">
				</td>
				<th class="th">Service pack</th>
				<td><input type="search" id="servcpack" placeholder="Service pack"></td>
			</tr>
		</table>
	</div>	
	
	<div id="red" class="tabcontent body">
		<br>
		<table border="1px" class="tabla elemento"><tr><th>Red</th></tr></table>
		<br>
		<center>
			<table class="elemento" width="70%">
				<tr>
					<th class="th" width="10%">Nombre de red</th>
					<td width="30%">
						<input type="search" id="hostname" placeholder="Host name">
					</td>
					<th class="th" width="5%">Ip</th>
					<td width="30%">
						<input type="search" id="ip" placeholder="Direccion Ip">
					</td>
					<td>Wifi</td>
					<td><input id="ethernet" type="checkbox" /></td>
					<td>Ethernet</td>
					<td><input id="wifi" type="checkbox" /></td>
				</tr>
				<tr><td colspan="8" align="center"><label id="mensaje"></label></td></tr>
			</table>
		</center>
	</div>
<!------------------------------------------------------------------------------------------------------------------------>
	<div id="paquet" class="tabcontent body">
		<br>
		<table border="1px" class="tabla elemento"><tr><th>Paqueterias / Antivirus</th></tr></table>
		<br>
		
		<center>
			<table class="elemento" width="100%">
				<tr>
					<th width="50%">Paqueteria</th>
					<th width="50%">Serial</th>
				</tr>
				<tr>
					<td>
						<div id="divPaq">
							<select id="office" style="width:100%;" onclick="selected('office','textoffice')">
								<option value="0,"></option>
								<?php
									$con = "SELECT * FROM _paqueterias";
									$resUsuario = mysql_query($con,$conex) or die (mysql_error());
									while($res = mysql_fetch_array($resUsuario)){
										
										$res["id"] == $row["paq0"] ? $selected = 'selected="selected"' : $selected = "";
										
										echo '<option value="'.$res['id'].",".$res['nombre'].'" '.$selected.'>'.$res['codigoserial'].'</option>';
									}
								?>
							</select>
						</div>
					</td>
					<td>
						<input type="text" id="textoffice" style="width:100%;" disabled="disabled"/>
					</td>
				</tr>
				<tr>
					<td>
						<div id="paq1">
							<select id="office1" style="width:100%;" onclick="selected('office1','textoffice1')">
								<option value="0,"></option>
								<?php
									$con = "SELECT * FROM _paqueterias";
									$resUsuario = mysql_query($con,$conex) or die (mysql_error());
									while($res = mysql_fetch_array($resUsuario)){
										
										$res["id"] == $row["paq1"] ? $selected = 'selected="selected"' : $selected = "";
										
										echo '<option value="'.$res['id'].",".$res['nombre'].'" '.$selected.'>'.$res['codigoserial'].'</option>';
									}
								?>
							</select>
						</div>
                	</td>
					<td>
                		<input type="text" id="textoffice1" style="width:100%;" disabled="disabled"/>
                	</td>
				</tr>
				<tr>
					<td>
						<div id="paq2">
						<select id="office2" style="width:100%;" onclick="selected('office2','textoffice2')">
							<option value="0,"></option>
								<?php
									$con = "SELECT * FROM _paqueterias";
									$resUsuario = mysql_query($con,$conex) or die (mysql_error());
									while($res = mysql_fetch_array($resUsuario)){

										$res["id"] == $row["paq1"] ? $selected = 'selected="selected"' : $selected = "";

										echo '<option value="'.$res['id'].",".$res['nombre'].'" '.$selected.'>'.$res['codigoserial'].'</option>';
									}
								?>
						</select>
						</div>
                	</td>
                	<td>
                		<input type="text" id="textoffice2" style="width:100%;" disabled="disabled"/>
                	</td>
				</tr>
			</table>
			
			<br>
	
			<div id="divAntivirus">

				<table border="1px" class="tabla elemento"><tr><th>Antivirus</th></tr></table>

				<br>

				<center>
					<table class="elemento" width="20%">
						<tr>
							<td>
								<div id="divAsignado">
								<select id="antivirus" onChange="actualizar()">
									<?php
										$con = "SELECT * FROM _antivirus ORDER BY _antivirus_nombre";
										$resUsuario = mysql_query($con,$conex) or die (mysql_error());
										while($res = mysql_fetch_array($resUsuario)){

											$res["id"] == $row["antivirus"] ? $selected = 'selected="selected"' : $selected = "";

											echo '<option value="'.$res['id'].'" '.$selected.'>'.$res['_antivirus_nombre'].'</option>';
										}
									?>
								</select>
								</div>
							</td>
						</tr>
					</table>
				</center>		
			</div>
			
		</center>
		
	</div>
	
</body>
	<script>
		
		
		
		function selected(sel,input){
			var x = document.getElementById(sel).value;
			var res = x.split(",");
			document.getElementById(input).value = res[1];
		}
		
		function validarIp(ip) {
			var patronIp = new RegExp("^([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3})$");			
			if(Boolean(ip)){			
				if(ip.search(patronIp)==0){
					if(ip.search(patronIp)==0){
						valores=ip.split(".");
						if(valores[0]<=255 && valores[1]<=255 && valores[2]<=255 && valores[3]<=255){
							document.getElementById("mensaje").innerHTML = "";
							document.getElementById("ip").style.border = "1px solid grey";
							return true;
						}
					}
				}
				document.getElementById("mensaje").innerHTML = "Verifica la direccion ip.";
				document.getElementById("ip").style.border = "1px solid red";
				return false;
			}else{
				document.getElementById("mensaje").innerHTML = "Direccion ip no puede ir vacio.";
				document.getElementById("ip").style.border = "1px solid red";
				return false;
			}
		}
		
		function guardar(){
			
			var ar = document.getElementById('tipo');
			var tipo = ar.options[ar.selectedIndex].value;
			var marca = document.getElementById('marca').value;
			var modelo = document.getElementById('modelo').value;
			var serie = document.getElementById('serie').value;
			var ar = document.getElementById('asignado');
			var usuario = ar.options[ar.selectedIndex].value;
			var ar = document.getElementById('area');
			var area = ar.options[ar.selectedIndex].value;	
			var ar = document.getElementById('agencia');
			var agencia = ar.options[ar.selectedIndex].value;
			var comentarios = document.getElementById('comentarios').value;
			var procesador = document.getElementById('procesador').value;//
			var arquitectura = document.getElementById('arquitectura').value;//
			var memoria = document.getElementById('memoria').value;	//		
			var ar = document.getElementById('slots');
			var slots = ar.options[ar.selectedIndex].value;
			var dd = document.getElementById('dd').value;
			var ddserie = document.getElementById("ddserie").value;
			var so = document.getElementById('so').value;//
			var winoem = document.getElementById('winoem').value;	//
			var wininst = document.getElementById('wininst').value;
			var servcpack = document.getElementById('servcpack').value;
			var nameRed 	= document.getElementById("hostname").value;
			var ip 			= document.getElementById("ip").value;
			var wifi 		= document.getElementById('wifi').checked;
			var ethernet 	= document.getElementById('ethernet').checked;
			var x = document.getElementById("office").value;
			var of = x.split(",");			
			var x = document.getElementById("office1").value;
			var of1 = x.split(",");			
			var x = document.getElementById("office2").value;
			var of2 = x.split(",");	
			var ar = document.getElementById('antivirus');
			var antivirus = ar.options[ar.selectedIndex].value;
			
			var fcompra = document.getElementById("fcompra").value;
			var garantia = document.getElementById("garantia").value;
			
			if(Boolean(serie)){
				document.getElementById("mensaje").innerHTML = "";
				document.getElementById("serie").style.border = ".1px solid grey";
				
				if( Boolean(validarIp(ip)) ){//&& Boolean(validarIp(ip))){
					
					if(Boolean(nameRed)){
						
						var mnsj = "tipo="+tipo+"&marca="+marca+"&modelo="+modelo+"&serie="+serie+"&asignado="+usuario+"&area="+area+"&agencia="+agencia+"&comentarios="+comentarios+"&procesador="+procesador+"&arquitectura="+arquitectura+"&memoria="+memoria+"&slots="+slots+"&dd="+dd+"&ddserie="+ddserie+"&so="+so+"&winoem="+winoem+"&wininst="+wininst+"&servcpack="+servcpack+"&hostname="+nameRed+"&ip="+ip+"&wifi="+wifi+"&ethernet="+ethernet+"&office0="+of[0]+"&office1="+of1[0]+"&office2="+of2[0]+"&antivirus="+antivirus+"&fcompra="+fcompra+"&garantia="+garantia;
									
						$.ajax({ 
							type: 	"GET", 
							url: 	"Agregar/VerificarIp.php", 
							data: 	"ip="+ip, 
							success: function(msg){
								
								var res = msg.split('|');
								
								switch(res[0]){
									case "TRUE":
										document.getElementById("mensaje").innerHTML = "La direccion IP ya existe,"+res[1];
										break;
									case "FALSE":
										//document.getElementById("mensaje").innerHTML = "Guardarndo informacion.";
										//alert(mnsj);
										location.href = "Agregar/sav_Agregar.php?"+mnsj;
										break;
									default:
										alert(msg);
										break;
								}
							}
						});
						
					}else{
						document.getElementById("mensaje").innerHTML = "Nombre de red no puede estar vacio.";
						document.getElementById("hostname").style.border = "1px solid red";
					}
				}else{}
			}else{
				document.getElementById("mensaje").innerHTML = "Numero de serie no puede estar vacio.";
				document.getElementById("serie").style.border = "1px solid red";
			}
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