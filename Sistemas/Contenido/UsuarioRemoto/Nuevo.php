<?php 

	include("../../conexion.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<script src="../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../JS/1.12.1/jquery-ui.js"></script>
	<style>
		#datos{
			width: 80%;
			position: absolute;
			left: 10%;
			top: 20%;
		}
		input{
			width: 100%;
		}
		#servidores{
			width: 100%;
			max-height: 30vh;
			min-height: 30vh;
			overflow-x: auto;
			vertical-align:middle;
		}
		#srvr{
			text-align: center;
		}
		#listequipos{
			width: 80%;
		}
		#nombre,#asignado{
			width: 100%;
		}
		#comentarios{
			resize: none;
			width: 99.5%;
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right" class="elemento">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<div id="datos">
		<table width="100%">
			<tr>
				<th>Asignado</th>
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
				<th width="10%">Usuario</th>
				<td width="40%"><input type="search" id="usuario" placeholder="Usuario"></td>
				<th width="10%">Contraseña</th>
				<td width="40%"><input type="search" id="password" placeholder="Contraseña"></td>
			</tr>
			<tr>
				<th>Area</th>
				<td><input type="search" id="area" readonly></td>
				<th>Agencia</th>
				<td><input type="search" readonly></td>
			</tr>
			<tr>
				<th colspan="2">Servidores</th>
				<td colspan="2" align="center">
					<select name="listequipos" id="listequipos">
						<?php
							$conEquipos = "SELECT * FROM _equipos WHERE activo = 1 ORDER BY INET_ATON(ip)";
							$resEquipos = mysql_query($conEquipos,$conex) or die (mysql_error());
							while($res = mysql_fetch_array($resEquipos)){
								echo '<option value="'.$res['id'].'|'.$res['nombre'].'|'.$res['ip'].'" title="'.$res['ip'].'">'.$res['nombre'].'('.$res['ip'].')</option>';
							}
						?>
					</select>
					<button onClick="addSRVR('nombre del servidor')" title="Agregar equipo al listado">Agregar</button>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<div id="servidores"></div>
				</td>
			</tr>
			<tr><th colspan="4">Comentarios</th></tr>
			<tr><th colspan="4"><textarea id="comentarios" rows="5" placeholder="Comentarios"></textarea></th></tr>
			<tr><td colspan="4" align="center"><label id="mensaje"></label></td></tr>
			<tr><td colspan="4" align="right"><button onClick="guardar()">Guardar</button></td></tr>
		</table>
	</div>
	
</body>
	<script>
		
		var cont = 0;
		var servidores = "";
		var srvr = document.getElementsByClassName("srvr");
		
		function addSRVR(texto){
			var ar = document.getElementById('listequipos');
			var equipo = ar.options[ar.selectedIndex].value;
			crearDin(equipo);
		}
		
		function obtener(){
			var input = document.getElementsByClassName("srvr");
			if(input.length>0){
				var tx = "";
				for(i=0;i<input.length;i++){
					tx += input[i].getAttribute("id")+",";
				}
				servidores = tx.slice(0,tx.length-1);
				return true;   
			}else{
				return false;
			}
		}
		
      function crearDin(texto){
		  
		  var equipo = texto.split('|');
		  
		  var padre = document.getElementById("servidores");
          var input = document.createElement("INPUT");         
          input.type = 'button';
		  input.readOnly = true;
		  input.className = 'srvr';
		  input.setAttribute("id", equipo[0]);
		  input.style.textAlign = "center";
		  input.value = equipo[1]+" ["+equipo[2]+"]";
		  input.title = "Click para eliminar "+equipo[1]+"\n Nombre: "+equipo[1]+" IP: "+equipo[2];
		  input.setAttribute("style", "width:100%");
		  input.addEventListener("click", function(){
    		padre.removeChild(input);
		  });
		  padre.appendChild(input);		  		    
      }
		
		function guardar(){			
			
			var usr = document.getElementById("usuario").value;
			var pwd = document.getElementById("password").value;
			var comentarios = document.getElementById("comentarios").value;
			
			var ar = document.getElementById('asignado');
			var usuario = ar.options[ar.selectedIndex].value;
			
			if(Boolean(obtener())){
				if(Boolean(usr)){
					
					var con = "nombre="+usuario+"&srvr="+servidores+"&usr="+usr+"&pwd="+pwd+"&comentarios="+comentarios;
					
					$.ajax({ 
						type: 	"GET", 
						url: 	"sav_Nuevo.php", 
						data: 	con, 
						success: function(msg){
							switch(msg){
								case "TRUE":
									location.href = "Panel.php";
									break;
								default:
									alert(msg);
									break;
							}
						}	
					});
				}else{
					document.getElementById("mensaje").innerHTML = "El usuario es necesario";
				}
			}else{
				document.getElementById("mensaje").innerHTML = "Selecciona al menos un servidor";
			}
		}
   </script>
</html>