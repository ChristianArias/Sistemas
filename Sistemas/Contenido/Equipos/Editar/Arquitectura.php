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
			width: 100%;
			font-size: 10px;
		}
		select{
			width: 99%;
		}
		.th{
			width: 15%;
		}
		.td{
			width: 70%;
		}
	</style>
<body>
	
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
							<input type="search" id="procesador" placeholder="Procesador" value="<?php echo $row["procesador"];?>">
						</td>
					</tr>
					<tr>
						<th>Arquitectura</th>
						<td>
							<input type="search" id="arquitectura" placeholder="Arquitectura" value="<?php echo $row["arquitectura"];?>">
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
							<input type="search" id="memoria" placeholder="Memoria Fisica" value="<?php echo $row["ram"]?>">
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
						<td><input type="search" id="dd" placeholder="Tamaño disco duro" value="<?php echo $row["discoduro"];?>"></td>
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
	
	
	
	<table id="tguardar"><tr><td align="right"><button id="guardar" onClick="guardar()">Actualizar</button></td></tr></table>
	
</body>
	<script>
		function guardar(){
			
			var id = <?php echo $id;?>;	
			var procesador = document.getElementById('procesador').value;//
			var arquitectura = document.getElementById('arquitectura').value;//
			var memoria = document.getElementById('memoria').value;	//		
			var ar = document.getElementById('slots');
			var slots = ar.options[ar.selectedIndex].value;
			var dd = document.getElementById('dd').value;
			var ddserie = document.getElementById("ddserie").value;
			
			var mnsj = "id="+id+"&procesador="+procesador+"&arquitectura="+arquitectura+"&memoria="+memoria+"&slots="+slots+"&dd="+dd+"&ddserie="+ddserie;
			
			$.ajax({ 
				type: 	"GET", 
				url: 	"save_Arquitectura.php", 
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
			
		}	
	</script>
</html>