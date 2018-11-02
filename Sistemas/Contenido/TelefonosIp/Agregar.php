<?php 
	include("../../conexion.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Agregar telefono ip</title>
	<!--<LINK href="../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">-->
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<script src="../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../JS/1.12.1/jquery-ui.js"></script>
	<style>
		.body{
			font-size: 10px;
		}
		#contenido{
			width: 99vw;
		}
		#tabla{
			min-width: 95vw;
		}
		table{
			width: 100%;
		}
		input{
			width: 100%;
		}
		select{
			width: 95%;
		}
		.actualizar{
			border: none;
			background-color: white;
		}
		#comentarios{
			width: 99.5%;
			resize: none;
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<center>
		<br>
			<center><font size="+3">Nuevo telefono IP</font><br><label id="mensaje"></label></center>
		<br><br>
		
		<div id="contenido" class="body">
			<table id="tabla">
				
				<tr>
					<th>Tipo</th>
					<td>
						<div id="div_dispositivos">
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
						<button class="actualizar" onClick="refresh('div_dispositivos')" title="Actualizar">
							<img src="../../Iconos/actualizar.png" width="10vw" height="10vh">
						</button>
						</div>
					</td>
				</tr>
				<tr>
					<th width="10%">Marca</th>
					<td width="40%"><input type="search" id="marca" placeholder="Marca"></td>
					<th width="10%">Modelo</th>
					<td width="40%"><input type="search" id="modelo" placeholder="Modelo"></td>
				</tr>
				<tr>
					<th>Numero de serie</th>
					<td><input type="search" id="serie" placeholder="Numero de serie(Serial)"></td>
				</tr>
				<tr>
					<th>Asignado</th>
					<td colspan="3">
						<div id="div_asignado">
							<select id="asignado">
								<?php
									$conUsuario = "SELECT * FROM _usuario ORDER BY _usuario_nombre";
									$resUsuario = mysql_query($conUsuario,$conex) or die (mysql_error());
									while($res = mysql_fetch_array($resUsuario)){
										echo '<option value="'.$res['id'].'" >'.$res['_usuario_nombre'].'</option>';
									}
								?>
							</select>
						<button class="actualizar" onClick="refresh('div_asignado')" title="Actualizar">
							<img src="../../Iconos/actualizar.png" width="10vw" height="10vh">
						</button>
						</div>
					</td>
				</tr>
				<tr>
					<th>Direccion ip</th>
					<td><input type="search" id="ip" placeholder="Direccion IP"></td>
					<th>Mac</th>
					<td><input type="search" id="mac" placeholder="Mac"></td>
				</tr>
				<tr>
					<th class="th">Area</th>
					<td>
						<div id="div_areas">
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
						<button class="actualizar" onClick="refresh('div_areas')" title="Actualizar">
							<img src="../../Iconos/actualizar.png" width="10vw" height="10vh">
						</button>
						</div>
					</td>
					<th class="th">Agencia</th>
					<td>
						<div id="div_agencias">
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
						<button class="actualizar" onClick="refresh('div_agencias')" title="Actualizar">
							<img src="../../Iconos/actualizar.png" width="10vw" height="10vh">
						</button>
						</div>
					</td>					
				</tr>
				<tr>
					<th>Usuario de acceso</th>
					<td><input type="search" id="usr" placeholder="Usuario de acceso"></td>
					<th>Contraseña de acceso</th>
					<td><input type="search" id="pwd" placeholder="Contraseña de acceso"></td>
				</tr>
				<tr>
					<td colspan="4">
						<table>
							<tr>
								<th>Extencion 1</th>
								<th>Extencion 2</th>
								<th>Extencion 3</th>
								<th>Extencion 4</th>
							</tr>
							<!--disabled selected-->
							
							<tr>
								<td><input type="search" id="ext0" placeholder="Extencion 1"></td>
								<td><input type="search" id="ext1" placeholder="Extencion 2"></td>
								<td><input type="search" id="ext2" placeholder="Extencion 3"></td>
								<td><input type="search" id="ext3" placeholder="Extencion 4"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr><th colspan="4">Comentarios</th></tr>
				<tr>
					<td colspan="4">
						<textarea id="comentarios" placeholder="Comentarios" rows="10"></textarea>
					</td>
				</tr>
				
				<tr><td colspan="4" align="right"><button onClick="guardar()">Guardar</button></td></tr>
			</table>
		</div>
	</center>
</body>
	<script>
		function refresh(div){
			//$("#"+div).load(location.href + " #"+div);
			$("#"+div).load(location.href + " #"+div).error(function(){ alert("Error al cargar");});
		}
		
		function guardar(){
			var ar = document.getElementById('tipo');
			var tipo = ar.options[ar.selectedIndex].value;
			var marca = document.getElementById("marca").value;
			var modelo = document.getElementById("modelo").value;
			var serie = document.getElementById("serie").value;
			var ar = document.getElementById('asignado');
			var asignado = ar.options[ar.selectedIndex].value;
			var ip = document.getElementById("ip").value;
			var mac = document.getElementById("mac").value;
			var ar = document.getElementById('area');
			var area = ar.options[ar.selectedIndex].value;	
			var ar = document.getElementById('agencia');
			var agencia = ar.options[ar.selectedIndex].value;
			var usr = document.getElementById("usr").value;
			var pwd = document.getElementById("pwd").value;
			var ext0 = document.getElementById("ext0").value;
			var ext1 = document.getElementById("ext1").value;
			var ext2 = document.getElementById("ext2").value;
			var ext3 = document.getElementById("ext3").value;
			var comentarios = document.getElementById("comentarios").value;
			
			if( Boolean(validarIp(ip)) ){
				
				var mnsj = "tipo="+tipo+"&ip="+ip+"&marca="+marca+"&modelo="+modelo+"&serie="+serie+"&asignado="+asignado+"&ip="+ip+"&mac="+mac+"&area="+area+"&agencia="+agencia+"&usr="+usr+"&pwd="+pwd+"&ext0="+ext0+"&ext1="+ext1+"&ext2="+ext2+"&ext3="+ext3+"&comentarios="+comentarios;
				
				$.ajax({ 
					type: 	"GET", 
					url: 	"VerificarIp.php", 
					data: 	"ip="+ip, 
					success: function(msg){
						var res = msg.split('|');
						switch(res[0]){
							case "TRUE":
								document.getElementById("mensaje").innerHTML = "La direccion IP ya existe,"+res[1];
								break;
							case "FALSE":
								location.href = "sav_Agregar.php?"+mnsj;
								break;
							default:
								alert(msg);
								break;
						}
					}
				});
			}else{
				//alert("Verifica la ip")
			}
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
	</script>
</html>
	
	<!--

