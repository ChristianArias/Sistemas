<?php

	include("../../../conexion.php");
	
	$panel = $_GET["id"];
	$cont = $_GET["cont"];
	$con = "SELECT * FROM _paneles_valores WHERE idPanel = $panel AND idPuerto = $cont";
	$resUsuario = mysql_query($con,$conex) or die (mysql_error());
	$row = mysql_fetch_array($resUsuario);
	
	if(isset($row["id"])){
		$id = $row["id"];	
	}else{
		$id = 0;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar puerto</title>
	
	<script src="../../../JS/1.12.1/jquery-ui.js"></script>
	<script src="../../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	
</head>
	
	<style>
		table{
			position: absolute;
			top: 20%;
			left: 0%;
		}
		input{
			width: 100%;
		}
		textarea{
			width: 99%;
			resize: none;
		}
		#eliminar:hover{
			color: red;
		}
		@media screen and (max-width:1200px){
			table{
				position: absolute;
				bottom: 40%;
				left: 0%;
			}
			textarea{
				width: 99%;
				resize: none;
			}
		}
	</style>
	
<body>
	<center>
		
		<table width="100%">
			<tr><th colspan="3">Puerto <?php echo $cont;?></th></tr>
			<tr>
				<th width="20%">Valor del puerto</th>
				<td width="75%"><input type="search" id="valor" value="<?php echo $row["valor"]?>"></td>
				<td width="5%"></td>
			</tr>
			<tr><th colspan="3">Comentarios</th></tr>
			<tr><td colspan="3"><textarea id="comentarios" rows="8"><?php echo $row["comentarios"]?></textarea></td></tr>
			<tr>
				<td>
					<?php 
						switch($id){
							case 0:
								break;
							default:
								echo '<button onClick="eliminar()" id="eliminar">Eliminar</button>';
								break;
						}
					?>				
				</td>
				<td colspan="2" align="right">
					<?php 
						switch($id){
							case 0:
								echo '<button onClick="guardar()">Agregar</button>';
								break;
							default:
								echo '<button onClick="actualizar()">Actualizar</button>';
								break;
						}
					?>					
				</td>
			</tr>
			<tr><td colspan="3" align="center"><label id="texto"></label></td></tr>
		</table>
	</center>
</body>
	
	<script>
		
		function eliminar(){
			var panel = <?php echo $panel;?>;
			var puerto = <?php echo $cont;?>;
			
			alert("panel="+panel+"&puerto="+puerto);
		}
		
		function actualizar(){
			var id = <?php echo $id;?>;
			var panel = <?php echo $panel;?>;
			var puerto = <?php echo $cont;?>;
			var valor = document.getElementById("valor").value;
			var comentarios = document.getElementById("comentarios").value;
			
			$.ajax({
				type: 	"GET", 
				url: 	"save_editar.php", 
				data: 	"id="+id+"&panel="+panel+"&puerto="+puerto+"&valor="+valor+"&comentarios="+comentarios,
				success: function(msg){ 
					switch(msg){
						case "OK":
							document.getElementById("texto").innerHTML = "Puerto actualizado,cierra la ventana para continuar.";
							break;
					}
				}
			});
		}
		
		function guardar(){
			var id = <?php echo $id;?>;
			var panel = <?php echo $panel;?>;
			var puerto = <?php echo $cont;?>;
			var valor = document.getElementById("valor").value;
			var comentarios = document.getElementById("comentarios").value;
			
			$.ajax({
				type: 	"GET", 
				url: 	"save_guardar.php", 
				data: 	"id="+id+"&panel="+panel+"&puerto="+puerto+"&valor="+valor+"&comentarios="+comentarios,
				success: function(msg){ 
					switch(msg){
						case "OK":
							document.getElementById("texto").innerHTML = "Puerto guardado,cierra la ventana para continuar.";
							break;
					}
				}
			});
		}
		
	</script>
	
</html>