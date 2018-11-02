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
		}
		.th{
			width: 15%;
		}
		.td{
			width: 70%;
		}
	</style>
<body>
	<table border="1px" class="tabla elemento"><tr><th>Sistema operativo</th></tr></table>
	
	<br>
	
	<table class="tabla elemento">
		<tr>
			<th class="th">Sistema operativo</th>
			<td class="td" colspan="3">
				<input type="search" id="so" placeholder="Sistema operativo" value="<?php echo $row["SO"];?>">
			</td>
			<th class="th">Fecha de instalacion</th>
			<td><input type="date"></td>
		</tr>
		<tr>
			<th class="th">Windows product key(OEM)</th>
			<td><input type="search" id="winoem" placeholder="Windows product key(OEM)" value="<?php echo $row["winOEM"];?>"></td>
			<th class="th">Windows product key(INSTALADO)</th>
			<td>
				<input type="search" id="wininst" placeholder="Windows product key(INSTALADO)" value="<?php echo $row["winINST"];?>">
			</td>
			<th class="th">Service pack</th>
			<td><input type="search" id="servcpack" placeholder="Service pack"></td>
		</tr>
	</table>
	
	<table id="tguardar"><tr><td align="right"><button id="guardar" onClick="guardar()">Actualizar</button></td></tr></table>
	
</body>
	<script>
		function guardar(){
			
			var id = <?php echo $id;?>;	
			var so = document.getElementById('so').value;//
			var winoem = document.getElementById('winoem').value;	//
			var wininst = document.getElementById('wininst').value;
			var servcpack = document.getElementById('servcpack').value;
			
			var mnsj = "id="+id+"&so="+so+"&winoem="+winoem+"&wininst="+wininst+"&servcpack="+servcpack;
			
			$.ajax({ 
				type: 	"GET", 
				url: 	"sav_SistemaOperativo.php", 
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