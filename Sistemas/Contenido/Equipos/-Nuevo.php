<?php 
	include("../../conexion.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<script src="../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../JS/1.12.1/jquery-ui.js"></script>	
</head>
	<style>
		a{
			color: black;
			text-decoration: none;
		}
		input[type="search"],textarea{
			width: 100%;
		}
		#area,#agencia,#asignado,#tipo{
			width: 100%;
		}
		#antivirus{
			width: 50%;
		}
		.td{
			text-align: left;
		}
		.td2{
			text-align: left;
		}
		th{
			text-align: center;
		}
		#eliminar:hover{
			color: red;	
		}
		@media screen and (max-width:800px){
			body{
				font-size: 10px;
			}
			#observaciones{
				width: 80%;
			}
		}
	</style>
<body>
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<table width="100%" height="60%">
		<caption><font size="+2">Agregar equipo <label id="e_equipo"></label></font></caption>
	<tr>
		<td width="50%" height="30%" class="td">
			<table width="100%" id="tb1" class="td">
				<tr>
					<th colspan="3">Informacion</th>
				</tr>
				<tr>
					<td width="30%">Nombre de equipo</td>
					<td width="70%"><input type="search" id="nombre" onkeyup="ingreso()"></td>
				</tr>
				<tr>
					<td>Asignado</td>
					<td>
						<select id="asignado">
							<option value="0"></option>
							<?php
								$conUsuario = "SELECT * FROM _usuario ORDER BY _usuario_nombre";
								$resUsuario = mysql_query($conUsuario,$conex) or die (mysql_error());
								while($res = mysql_fetch_array($resUsuario)){
									$res["id"] == $res2["usuario"] ? $selected = 'selected="selected"' : $selected = "";
									echo '<option value="'.$res['id'].'" '.$selected.'>'.$res['_usuario_nombre'].'</option>';
								}
	 						?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Agencia</td>
					<td>
						<select id="agencia">
							<option value="0"></option>
							<?php
								$con = "SELECT * FROM _agencia ORDER BY _agencia_nombre";
								$resUsuario = mysql_query($con,$conex) or die (mysql_error());
								while($res = mysql_fetch_array($resUsuario)){
									$res["id"] == $res2["agencia"] ? $selected = 'selected="selected"' : $selected = "";
									echo '<option value="'.$res['id'].'" '.$selected.'>'.$res['_agencia_nombre'].'</option>';
								}
	 						?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="10%">Area</td>
					<td width="40%">
						<select id="area">
							<option value="0"></option>
							<?php
								$con = "SELECT * FROM _areas ORDER BY _areas_nombre";
								$resUsuario = mysql_query($con,$conex) or die (mysql_error());
								while($res = mysql_fetch_array($resUsuario)){
									$res["id"] == $res2["area"] ? $selected = 'selected="selected"' : $selected = "";
									echo '<option value="'.$res['id'].'" '.$selected.'>'.$res['_areas_nombre'].'</option>';
								}
	 						?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="10%">Tipo</td>
					<td width="40%">
						<select id="tipo">
							<option value="0"></option>
							<?php
								$con = "SELECT * FROM _dispositivos ORDER BY _dispositivos_nombre";
								$resUsuario = mysql_query($con,$conex) or die (mysql_error());
								while($res = mysql_fetch_array($resUsuario)){
									$res["id"] == $res2["tipo"] ? $selected = 'selected="selected"' : $selected = "";
									echo '<option value="'.$res['id'].'" '.$selected.'>'.$res['_dispositivos_nombre'].'</option>';
								}
	 						?>
						</select>
					</td>
				</tr>
			</table>
		</td>
		<td width="50%" height="30%">
			<table width="100%" class="td2">
				<tr>
					<th colspan="2">Arquitectura</th>
				</tr>
				<tr>
					<td width="30%">Marca</td>
					<td width="70%"><input type="search" id="marca"></td>
				</tr>
				<tr>
					<td>Modelo</td>
					<td><input type="search" id="modelo"></td>
				</tr>
				<tr>
					<td>Numero de serie</td>
					<td><input type="search" id="serie"></td>
				</tr>
				<tr>
					<td>Procesador</td>
					<td><input type="search" id="procesador"></td>
				</tr>
				<tr>
					<td>Ram</td>
					<td><input type="search" id="ram"></td>
				</tr>
				<tr>
					<td>Disco duro</td>
					<td><input type="search" id="dd"></td>
				</tr>
			</table>
		</td>
	</tr>
		<tr>
			<td>
				<table width="100%" class="td">
					<tr>
						<th colspan="2">Sistema operativo</th>
					</tr>
					<tr>
						<td width="30%">Sistema operativo</td>
						<td width="70%"><input type="search" id="so"></td>
					</tr>
					<tr>
						<td>Arquitectura</td>
						<td><input type="search" id="arquitectura"></td>
					</tr>
					<tr>
						<td>Serial (OEM)</td>
						<td><input type="search" id="winoem"></td>
					</tr>
					<tr>
						<td>Serial (Instalado)</td>
						<td><input type="search" id="wininst"></td>
					</tr>
				</table>
			</td>
			<td>
				<table width="100%" class="td2">
					<tr>
						<th colspan="2">Red</th>
					</tr>
					<tr>
						<td>Wifi</td>
						<td><input type="checkbox" id="wifi" onclick="wifi()"></td>
					</tr>
					<tr>
						<td>Ethernet</td>
						<td><input type="checkbox" id="ethernet" onClick="enable()"></td>
					</tr>
					<tr>
						<td width="30%">Direccion IP</td>
						<td width="70%"><input type="search" id="ip" disabled></td>
					</tr>
					<tr>
						<td>Nombre en red</td>
						<td><input type="search" id="nombrered"></td>
					</tr>					
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%">
					<tr>
						<th colspan="2">Antivirus</th>
					</tr>
					<tr>
						<td width="70%" align="center">
							<select id="antivirus">
								<option value="0"></option>
								<?php 
									$con = "SELECT * FROM _antivirus";
									$resUsuario = mysql_query($con,$conex) or die (mysql_error());
									while($res = mysql_fetch_array($resUsuario)){
										$res["id"] == $res2["antivirus"] ? $selected = 'selected="selected"' : $selected = "";
										echo '<option value="'.$res['id'].'" '.$selected.'>'.$res['_antivirus_nombre'].'</option>';
									}
								?>
							</select>
						</td>
					</tr>
				</table>
			</td>
			<td>
				<table width="100%">
					<tr>
						<th colspan="4">Office</th>
					</tr>
					<tr>
						<td width="40%">
							<div id="paq1">
							<select id="office1" style="width:100%;" onclick="selected('office1','textoffice1')">
                    		<option value="0,"></option>
                    		<?php
								$con = "SELECT * FROM _paqueterias";
								$resUsuario = mysql_query($con,$conex) or die (mysql_error());
								while($res = mysql_fetch_array($resUsuario)){
									echo '<option value="'.$res['id'].",".$res['nombre']."[".$res['codigoserial']."]".'" '.$selected.'>'.$res['codigoserial'].'</option>';
								}
	 						?>
                    		</select>
							</div>
						</td>
						<td colspan="2" width="50%">
							<input type="text" id="textoffice1" style="width:99%;" disabled="disabled" />
						</td>
						<td>
							<img src="../../Iconos/nuevo.png" width="10" height="10" title="Agregar">
							<img src="../../Iconos/actualizar.png" width="10" height="10" title="Actualizar" onClick="actpaq1()">
						</td>
						<script>
							function actpaq1(){
								$("#paq1").load(location.href + " #paq1");
								document.getElementById('textoffice1').value = "";
							}
						</script>
					</tr>
					<tr>
						<td width="40%">
							<div id="paq2">
							<select id="office2" style="width:100%;" onclick="selected('office2','textoffice2')">
                    		<option value="0,"></option>
                    		<?php
								$con = "SELECT * FROM _paqueterias";
								$resUsuario = mysql_query($con,$conex) or die (mysql_error());
								while($res = mysql_fetch_array($resUsuario)){
									echo '<option value="'.$res['id'].",".$res['nombre']."[".$res['codigoserial']."]".'" '.$selected.'>'.$res['codigoserial'].'</option>';
								}
	 						?>
                    		</select>
							</div>
						</td>
						<td colspan="2" width="50%">
							<input type="text" id="textoffice2" style="width:99%;" disabled="disabled" />
						</td>
						<td>
							<img src="../../Iconos/nuevo.png" width="10" height="10" title="Agregar">
							<img src="../../Iconos/actualizar.png" width="10" height="10" title="Actualizar" onClick="actpaq2()">
						</td>
						<script>
							function actpaq2(){
								$("#paq2").load(location.href + " #paq2");
								document.getElementById('textoffice2').value = "";
							}
						</script>
					</tr>
					<tr>
						<td width="40%">
							<div id="paq3">
								<select id="office3" style="width:100%;" onclick="selected('office3','textoffice3')">
                    			<option value="0,"></option>
                    			<?php
									$con = "SELECT * FROM _paqueterias";
									$resUsuario = mysql_query($con,$conex) or die (mysql_error());
									while($res = mysql_fetch_array($resUsuario)){
										echo '<option value="'.$res['id'].",".$res['nombre']."[".$res['codigoserial']."]".'" '.$selected.'>'.$res['codigoserial'].'</option>';
									}
	 							?>
                    			</select>
							</div>
						</td>
						<td colspan="2" width="50%">
							<input type="text" id="textoffice3" style="width:99%;" disabled="disabled" />
						</td>
						<td>
							<img src="../../Iconos/nuevo.png" width="10" height="10" title="Agregar">
							<img src="../../Iconos/actualizar.png" width="10" height="10" title="Actualizar" onClick="actpaq3()">
						</td>
						<script>
							function actpaq3(){
								$("#paq3").load(location.href + " #paq3");
								document.getElementById('textoffice3').value = "";
							}
						</script>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<table width="100%">
					<tr>
						<td width="70%" align="center" colspan="2">
							<textarea id="observaciones" cols="100%" rows="2%" style="resize:none;" placeholder="Comentarios"></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<table width="100%">
					<tr>
						<td></td>
						<td align="right">
							<button onClick="guardar()">Guardar</button>
						</td>
					</tr>
				</table>
			</td>
		</tr>
</table>
</body>
	<script>
		function selected(sel,input){
			var x = document.getElementById(sel).value;
			var res = x.split(",");
			document.getElementById(input).value = res[1];
		}
		
		function ingreso(){
			document.getElementById("e_equipo").innerHTML = document.getElementById('nombre').value;
			document.getElementById('nombrered').value = document.getElementById('nombre').value;
		}
		
		function guardar(){
			//informacion
			var nombre = document.getElementById('nombre').value;			
			var ar = document.getElementById('asignado');
			var usuario = ar.options[ar.selectedIndex].value;
			var ar = document.getElementById('agencia');
			var agencia = ar.options[ar.selectedIndex].value;			
			var ar = document.getElementById('area');
			var area = ar.options[ar.selectedIndex].value;			
			var ar = document.getElementById('tipo');
			var tipo = ar.options[ar.selectedIndex].value;
			//arquitectura
			var marca = document.getElementById('marca').value;
			var modelo = document.getElementById('modelo').value;
			var serie = document.getElementById('serie').value;
			var procesador = document.getElementById('procesador').value;
			var ram = document.getElementById('ram').value;
			var discoduro = document.getElementById('dd').value;
			//Sistema operativo
			var so = document.getElementById('so').value;
			var arquitectura = document.getElementById('arquitectura').value;
			var winoem = document.getElementById('winoem').value;
			var wininst = document.getElementById('wininst').value;
			//Red
			var ip = document.getElementById('ip').value;
			var nombrered = document.getElementById('nombrered').value;
			var wifi = document.getElementById('wifi').checked;
			var ethernet = document.getElementById('ethernet').checked;
			//antivirus
			var ar = document.getElementById('antivirus');
			var antivirus = ar.options[ar.selectedIndex].value;
			//Observaciones
			var comentarios = document.getElementById('observaciones').value;
			//Office
			var x = document.getElementById("office1").value;
			var of = x.split(",");
			
			var x = document.getElementById("office2").value;
			var of1 = x.split(",");
			
			var x = document.getElementById("office3").value;
			var of2 = x.split(",");
			
			var mnsj = 	"nombre="+nombre
						+"&serie="+serie
						+"&marca="+marca
						+"&modelo="+modelo
						+"&ip="+ip
						+"&area="+area
						+"&agencia="+agencia
						+"&tipo="+tipo
						+"&ethernet="+ethernet
						+"&wifi="+wifi
						+"&comentarios="+comentarios
						+"&antivirus="+antivirus
						+"&usuario="+usuario
						+"&ram="+ram
						+"&dd="+discoduro
						+"&procesador="+procesador
						+"&so="+so
						+"&arquitectura="+arquitectura
						+"&nombrered="+nombrered
						+"&winoem="+winoem
						+"&wininst="+wininst
						+"&paq0="+of[0]
						+"&paq1="+of1[0]
						+"&paq2="+of2[0];
			
			if( nombre != "" && (ethernet||wifi) ){
				location.href = "Panel.php";
			}else{
				alert("Nombre/Wifi o Ethernet son necesarios.")
			}
		}
		
		function enable(){
			var check = document.getElementById("ethernet");
			var ip = document.getElementById("ip");
			if (check.checked == true){
				ip.disabled = false;
				
			}else{
				ip.disabled = true;
				ip.value = "";
			}
		}
		
		function wifi(){
			var wifi = document.getElementById("wifi").checked;
			var eth = document.getElementById("ethernet").checked;
			var ip = document.getElementById("ip");
			if(wifi){
				if(!eth){
					document.getElementById('ip').value = document.getElementById('nombrered').value;
				}
			}else{
				//document.getElementById('ip').value = "";
			}
		}
	</script>
</html>
