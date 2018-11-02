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
	</style>
<body>
	
	<table border="1px" class="tabla elemento"><tr><th>Red</th></tr></table>
	
	<br>
	
	<center>
		<table class="elemento" width="70%">
			<tr>
				<th class="th" width="10%">Nombre de red</th>
				<td width="30%">
					<input type="search" id="hostname" placeholder="Host name" value="<?php echo $row["nombreRed"]?>">
				</td>
				<th class="th" width="5%">Ip</th>
				<td width="30%">
					<input type="search" id="ip" placeholder="Direccion Ip" value="<?php echo $row["ip"]?>">
				</td>
				<?php 
					$row["wifi"] == 1 ? $wifi = 'checked="CHECKED"' : $wifi = "";
					$row["ethernet"] == 1 ? $ethernet = 'checked="CHECKED"' : $ethernet = "";
				?>
				<td>Wifi</td>
				<td><input id="ethernet" type="checkbox" <?php echo $ethernet;?>/></td>
				<td>Ethernet</td>
				<td><input id="wifi" type="checkbox"  <?php echo $wifi;?>/></td>
			</tr>
			<tr><td colspan="8" align="center"><label id="mensaje"></label></td></tr>
		</table>	
	</center>
	
	<table id="tguardar"><tr><td align="right"><button id="guardar" onClick="guardar()">Actualizar</button></td></tr></table>
	
</body>
	<script>
		function guardar(){
			
			var id 			= <?php echo $id;?>;	
			var nameRed 	= document.getElementById("hostname").value;
			var ip 			= document.getElementById("ip").value;
			var wifi 		= document.getElementById('wifi').checked;
			var ethernet 	= document.getElementById('ethernet').checked;
			
			var mnsj = "id="+id+"&hostname="+nameRed+"&ip="+ip+"&wifi="+wifi+"&ethernet="+ethernet;
			
			if(Boolean(ip)){
				document.getElementById("ip").style.border = "1px solid black";
				if(Boolean(wifi) || Boolean(ethernet)){
					$.ajax({ 
						type: 	"GET", 
						url: 	"sav_Red.php", 
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
					document.getElementById("mensaje").innerHTML = "Selecciona un tipo de conexion[Wifi|Ethernet]";
				}
			}else{
				document.getElementById("mensaje").innerHTML = "Direccion ip no puede ir vacio.";
				document.getElementById("ip").style.border = "1px solid red";
			}
		}
	</script>
</html>