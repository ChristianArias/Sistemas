<?php
	
	include("../../../conexion.php");

	$id = $_GET["id"];
	$consulta = "SELECT * FROM _equipos WHERE id = $id";
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
	$row = mysql_fetch_array($resultado);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
	<LINK href="../../../CSS/General.css" rel="stylesheet" type="text/css">
	<script src="../../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../../JS/1.12.1/jquery-ui.js"></script>
	<style>
		body{
			font-size: 10px;
		}
		.tabla{
			width: 100%;
		}
		#tguardar{
			position: absolute;
			bottom: 0%;
			left: 0%;
			width: 100%;
		}
		input{
			width: 98%;
			font-size: 10px;
		}
		select{
			width: 100%;
		}
		.th{
			text-align: left;
		}
		.td{
		}
		tr{
			border: 1px solid black;
		}
		#comentarios{
			width: 80%;
			resize: none;
		}
		#detalles{
			width: 100%;
			position: absolute;
			top: 25%;
			left: 0%;			
		}
		@media screen and (max-width:800px){
			#detalles{
				width: 100%;
				position: absolute;
				top: 10%;
				left: 0%;
			}
		}
	</style>
<body>
	
	<table border="1px" class="tabla elemento"><tr><th>Descripcion</th></tr></table>
	
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
				<td class="td"><input type="search" id="marca" placeholder="Marca" value="<?php echo $row["marca"]?>"></td>
				<th class="th">Modelo</th>
				<td class="td"><input type="search" id="modelo" placeholder="Modelo" value="<?php echo $row["modelo"]?>"></td>
			</tr>
			<tr>
				<th class="th">Numero de serie</th>
				<td><input type="search" id="serie" placeholder="Numero de serie (Serial)" value="<?php echo $row["serie"];?>"></td>
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
				<th class="th">Fecha de compra</th>
				<td><input type="date" id="fcompra" value="<?php echo $row["fcompra"];?>"></td>
				<th class="th">Garantia</th>
				<td><input type="number" id="garantia" min="0" value="<?php echo $row["garantia"]; ?>"></td>
			</tr>
			<tr><th colspan="4">Comentarios</th></tr>
			<tr>
				<td colspan="4" align="center">
					<textarea id="comentarios" rows="5"><?php echo $row["comentarios"];?></textarea>
				</td>
			</tr>
			<tr><th colspan="4"><label id="mensaje"></label></th></tr>
		</table>
		
	</div>
	
	<table id="tguardar">
		<tr>
			<td align="right"><button id="guardar" onClick="guardar()">Actualizar</button></td>
		</tr>
	</table>
	
</body>
	<script>
		function guardar(){
			
			var id = <?php echo $id;?>;			
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
			
			var fcompra = document.getElementById("fcompra").value;
			var garantia = document.getElementById("garantia").value;
			
			if(Boolean(serie)){
				document.getElementById("mensaje").innerHTML = "";
				
				var mnsj = "id="+id+"&tipo="+tipo+"&marca="+marca+"&modelo="+modelo+"&serie="+serie+"&asignado="+usuario+"&area="+area+"&agencia="+agencia+"&comentarios="+comentarios+"&fcompra="+fcompra+"&garantia="+garantia;
				
				$.ajax({ 
					type: 	"GET", 
					url: 	"save_Descripcion.php", 
					data: 	mnsj, 
					success: function(msg){						
						switch(msg){
							case "TRUE":
								location.reload();
								break;
							default:
								alert(msg);
								break;
						}
					}	
				});
			
			}else{
				document.getElementById("mensaje").innerHTML = "Numero de serie no puede estar vacio.";
				document.getElementById("serie").style.border = "1px solid red";
			}
			
		}	
	</script>
</html>