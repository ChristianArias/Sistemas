<?php 

	include("../../../conexion.php");

	$id = $_GET["switch"];

	$sql = "SELECT * FROM switch WHERE id = $id";
	$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
	$row = mysql_fetch_array($resUsuario);

	$puertos = $row["puertos"]; 			//tipo 0
	$fibra = $row["puertosfibra"]; 			//tipo 1
	$cascadeo = $row["puertoscascadeo"];	//tipo 2

	$brincos = $row["brincos"];

	$res = $puertos/$brincos;
	
	

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<!--<LINK href="../../../CSS/contenido.css" rel="stylesheet" type="text/css">-->
	<LINK href="../../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		#datos{
			position: absolute;
			top: 20%;
			left: 0%;
		}
		#fibra{
			position: absolute;
			top: 80%;
			left: 0%;
		}
		#datos td{
			text-align: center;
			font-size: 10px;
		}
		button{
			white-space: normal;
			width: 50px;
			height: 50px;
			font-size: 10px;
			margin: 0;
		}
		button:hover{
			background: darkgrey;
		}
		@media screen and (max-width:1200px){
			button{
				white-space: normal;
				width: 30px;
				height: 50px;
				font-size: 10px;
				margin: 0;
			}
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right" class="elemento">
		<a href="../Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<br><br>
	
	<div id="feedback">
	
		<table width="100%" border="1px" class="elemento">
			<tr class="elemento"><th><?php echo $row["nombre"]." ".$id;?></th></tr>
			<tr>
				<td align="center"><?php echo $puertos." puertos, ".$row["areas"]."/".$row["agencias"];?></td>
			</tr>
		</table>
	
		<div id="informacion" class="fixedHeaderTable elemento">
			<table id="datos" width="100%" border="1px">
				<tr><th colspan="<?php echo $res;?>">Puertos</th></tr>
				
				<?php
					$cont = 1;
					for($col = 0;$col < $brincos;$col++){
						echo "<tr>";
						for($i = 0;$i<$res;$i++){
							$con = "SELECT * FROM _switch_valores WHERE idSwitch = $id AND idPuerto = $cont AND tipo = 0";
							$resUsuario = mysql_query($con,$conex) or die (mysql_error());
							$row = mysql_fetch_array($resUsuario);
							echo "<td>".$cont."<button onClick='alerta(".$id.",".$cont.",0)'>".$row["valor"]."</button></td>";
							$cont++;
						}
						echo "</tr>";
					}				
				?>
				
				<?php
				
					$cont = 1;
					$brincFibra = $res > $fibra ? 1 : $brincos;
				
					echo "<tr><th colspan=".$fibra.">Fibra</th></tr>";
				
					for($col = 0;$col < $brincFibra;$col++){
						echo "<tr>";
							for($i = 0;$i<$fibra;$i++){
								echo "<td>".$cont."<button onClick='alerta(".$id.",".$cont.",1)'></button></td>";
								$cont++;
							}
						echo "</tr>";
					}
				
				?>
				<?php
				
					$cont = 1;
					$brincCascadeo = $res > $cascadeo ? 1 : $brincos;
				
					echo "<tr><th colspan=".$cascadeo.">Cascadeo</th></tr>";
				
					for($col = 0;$col < $brincCascadeo;$col++){
						echo "<tr>";
							for($i = 0;$i<$cascadeo;$i++){
								echo "<td>".$cont."<button onClick='alerta(".$id.",".$cont.",2)'></button></td>";
								$cont++;
							}
						echo "</tr>";
					}
				
				?>	
			</table>
		</div>
	
	</div>
		
		
	</center>
	
	<div id="openModal" class="modalDialog">
		<div class="elemento">
			<a href="#close" title="Close" class="close">X</a>
			<iframe id="ventana" width="100%" height="100%" src="" class="ventana">
			
			</iframe>
		</div>
	</div>
	
</body>
	<script>
		function alerta(_switch,cont,tipo){
			location.href = "#openModal";
			document.getElementById("ventana").src = "Editar.php?switch="+_switch+"&contador="+cont+"&tipo="+tipo;
		}
		
		window.addEventListener("keyup",function(event){
			var code = event.keyCode || event.which;
			if( code == 27 ){
				location.href = "#close";
			}
		},false);
	</script>
</html>