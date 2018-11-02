<?php

	include("../../conexion.php");
	session_start();
	$usuario = $_SESSION['sis_nombre'];

	$day = $_GET["dia"];
	$month = $_GET["mes"];
	$ano = $_GET["ano"];

	$mes = strlen($month)==1 ? "0".$month : $month;
	$dia = strlen($day)==1 ? "0".$day : $day;

	//$fecha = $ano."-".$mes."-".$dia;
	$fecha = "$ano-$mes-$dia";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		#contenido{
			width: 95%;
			position: absolute;
			bottom: 0%;
			left: 3%;
		}
		input[type="search"],input[type="date"],#compartircon,#tipo{
			width: 100%;
		}
		
		#compartido{
			width: 100%;
			border: 1px solid black;
			min-height: 20vh;
			max-height: 20vh;
			overflow-x: auto;
		}
		#comentarios{
			width: 100%;
			resize: none;
		}
		#mensaje{
			color: red;
		}
		#compartido button{
			width: 100%;
		}
	</style>
</head>

<body>
	<table id="contenido">
		<caption>Nuevo evento</caption>
		<tr>
			<th colspan="2">
				<select id="tipo">
					<option value="0">Evento</option>
					<option value="1">Tarea</option>
				</select>
			</td>
			<td colspan="2"><input type="search" id="titulo" placeholder="Titulo *" maxlength="100"></td>
		</tr>
		<tr>
			<td colspan="4"><input type="search" id="ubicacion" placeholder="Ubicacion" maxlength="100"></td>
		</tr>
		<tr>
			<td width="50%">
				<label for="checkbox_id">Todo el dia</label>
				<input type="checkbox" name="checkbox" id="checkbox_id" onClick="today()">			
			</td>
			<td width="15%">Inicio</td>
			<td><input type="date" value="<?php echo $fecha?>" min="<?php echo $fecha;?>" id="inicio"></td>
			<td><input type="time" value="00:00:01" id="timeinicio"></td>
		</tr>
		<tr>
			<td><input type="hidden" value="<?php echo $fecha;?>" id="istoday"></td>
			<td>Fin</td>
			<td><input type="date" value="<?php echo $fecha?>" min="<?php echo $fecha;?>" id="fin"></td>
			<td><input type="time" value="23:59:59" id="timefin"></td>
		</tr>
		<tr>
			<th colspan="4">
				<textarea id="comentarios" placeholder="Comentarios" rows="3"></textarea>
			</th>
		</tr>
		<tr>
			<td colspan="1">Compartir con:</td>
			<td><a href="#" onClick="addShare()">Agregar</a></td>
			<td colspan="2">
				<select id="compartircon">
					<?php 
						$sql = "SELECT * FROM usuariossistema WHERE usuario != '$usuario'";
						$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){
							echo 
								"<option value='".$row["id"].",".$row["nombre"]." ".$row["apellido"]."'>"
									.$row["nombre"]." ".$row["apellido"].
								"</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<div id="compartido"></div>
			</td>
		</tr>
		<tr><td align="center" colspan="4"><label id="mensaje"></label></td></tr>
		<tr>
			<td><a href="#" onClick="javascript:window.location.reload();">Actualizar</a></td>
			<td><a href="dia.php?mes=<?php echo $month;?>&ano=<?php echo $ano;?>&dia=<?php echo $dia;?>">Cancelar</a></td>
			<td colspan="2" align="right">
				<a href="#" onClick="agregar()">Agregar</a>
			</td>
		</tr>
	</table>
</body>
	<script>
		
		var inicio = "",fin = "";
		var hoy = document.getElementById("istoday").value;
		
		function today(){
			var control = document.getElementById("checkbox_id");
			var campos = ["inicio","fin","timeinicio","timefin"];
			if(control.checked){
				for($i = 0;$i<campos.length;$i++){
					document.getElementById(campos[$i]).disabled = true;
				}
			}else{
				for($i = 0;$i<campos.length;$i++){
					document.getElementById(campos[$i]).disabled = false;
				}
				document.getElementById("timeinicio").value = "00:00:01";
				document.getElementById("timefin").value = "23:59:59";
			}
		}
		
			
		function addShare(){
			var ar = document.getElementById('compartircon');
			var compartircon = ar.options[ar.selectedIndex].value;
			
			var texto = compartircon.split(',');
			
			var padre = document.getElementById("compartido");
			var input = document.createElement("INPUT");
			input.className = 'btnpadre';
			input.type = 'button';
			input.value = texto[1];
			input.setAttribute("style", "width:100%");
			input.setAttribute("id", texto[0]);

			input.addEventListener("click", function(){
    			padre.removeChild(input);
		  	});
			
			var elementos = document.getElementsByClassName("btnpadre");
			if(elementos.length==0){
				padre.appendChild(input);
			}else{
				var res = false;
				for(i=0;i<elementos.length;i++){
					var titulo = elementos[i].value;
					if(titulo==texto[1]){
						res = true;
					}
				}if(!res){
					padre.appendChild(input);
				}else{
					document.getElementById("mensaje").innerHTML = "Ya agregaste a "+texto[1];
				}	
			}
		}
		
		function getinicio(){
			if(document.getElementById("checkbox_id").checked){return hoy+" 00:00:01";}else{return document.getElementById("inicio").value+" "+document.getElementById("timeinicio").value;}
		}
		
		function getfin(){
			if(document.getElementById("checkbox_id").checked){return hoy+" 23:59:59";}else{return document.getElementById("fin").value+" "+document.getElementById("timefin").value;}
		}
		
		function obtener(){
			var texto = "";
			var input = document.getElementsByClassName("btnpadre");
			if(input.length>0){
				for(i=0;i<input.length;i++){
					texto += input[i].getAttribute("id")+",";
				}
				return texto.slice(0,texto.length-1);
			}else{
				return "";
			}
		}
		
		function agregar(){
			
			var titulo = document.getElementById("titulo").value;
			var ubicacion = document.getElementById("ubicacion").value;
			var comentarios = document.getElementById("comentarios").value;
			var ar = document.getElementById('tipo');
			var tipo = ar.options[ar.selectedIndex].value;
			
			if(Boolean(titulo)){
				
				var mensaje = "tipo="+tipo+"&titulo="+titulo+"&ubicacion="+ubicacion+"&inicio="+getinicio()+"&final="+getfin()+"&comentarios="+comentarios+"&compartircon="+obtener();
				
				location.href = "sav_NuevoEvento.php?"+mensaje;
			}else{
				document.getElementById("mensaje").innerHTML = "Titulo es requerido";
			}
		}
	</script>
</html>