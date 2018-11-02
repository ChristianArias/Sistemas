<?php
	
	include("../../../conexion.php");

	$id = $_GET["id"];
	$consulta = "SELECT * FROM equipos WHERE id = $id";
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
		#divAntivirus{
			width: 100%;
			position: absolute;
			top: 50%;
			left: 0%;
		}
	</style>
<body>
	
	<div id="divPaqueterias">
	
		<table border="1px" class="tabla elemento"><tr><th>Paqueterias</th></tr></table>
		
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
						<input type="text" id="textoffice" style="width:100%;" disabled="disabled" value="<?php echo $row['_paq0'];?>"/>
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
                		<input type="text" id="textoffice1" style="width:100%;" disabled="disabled" value="<?php echo $row['_paq1'];?>"/>
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
                		<input type="text" id="textoffice2" style="width:100%;" disabled="disabled" value="<?php echo $row['_paq2'];?>"/>
                	</td>
				</tr>
			</table>
		</center>
	
	</div>
	
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
	
	<table id="tguardar"><tr><td align="right"><button id="guardar" onClick="guardar()">Actualizar</button></td></tr></table>
	
</body>
	<script>
		function guardar(){
			
			var id = <?php echo $id;?>;	
			var x = document.getElementById("office").value;
			var of = x.split(",");			
			var x = document.getElementById("office1").value;
			var of1 = x.split(",");			
			var x = document.getElementById("office2").value;
			var of2 = x.split(",");	
			var ar = document.getElementById('antivirus');
			var antivirus = ar.options[ar.selectedIndex].value;
			
			var mnsj = "id="+id+"&office0="+of[0]+"&office1="+of1[0]+"&office2="+of2[0]+"&antivirus="+antivirus;
			
			$.ajax({ 
				type: 	"GET", 
				url: 	"sav_Paqueterias.php", 
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
		function actAsignado(){
			$("#divAsignado").load(location.href + " #divAsignado");
		}
		function selected(sel,input){
			var x = document.getElementById(sel).value;
			var res = x.split(",");
			document.getElementById(input).value = res[1];
		}
		function infoAnt(){
			var data = <?php echo $id;?>;
			document.getElementById("antivi").innerHTML = data;
		}	
	</script>
</html>