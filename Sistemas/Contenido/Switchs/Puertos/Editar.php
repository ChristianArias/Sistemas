<?php 

	include("../../../conexion.php");

	$switch		= $_GET["switch"];
	$cont 		= $_GET["contador"];
	$tipo 		= $_GET["tipo"];

	$_tipo = "";
	switch($tipo){
		case 0:
			$_tipo = "Puerto";
			break;
		case 1:
			$_tipo = "Fibra";
			break;
		case 2;
			$_tipo = "Cascadeo";
			break;	
	}

	$con = "SELECT * FROM _switch_valores WHERE idSwitch = $switch AND idPuerto = $cont AND tipo = $tipo";
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
	<LINK href="../../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		table{
			width: 60%;
			position: absolute;
			top: 15%;
			left: 20%;
		}
		input{
			width: 100%;
		}
		select{
			width: 100%;
		}
		textarea{
			width: 100%;
			resize: none;
		}
		#eliminar{			
			position: absolute;
			top: 90%;
		}
		#agregar,#actualizar{			
			position: absolute;
			top: 90%;
			right: 0%;
		}
		option{
			text-align: center;
		}
		#eliminar:hover{
			color: red;
		}
		@media screen and (max-width:1200px){
			table{
				position: absolute;
				bottom: 40%;
				left: 20%;
			}
			textarea{
				width: 99%;
				resize: none;
			}
		}
	</style>
	
<body>
	<center>
		
		<?php //echo "id ".$id." switch ".$switch." puerto ".$cont." tipo ".$tipo."(".$_tipo.")";?>
		
		<table class="elemento">
			<tr><th colspan="3"><?php echo $_tipo." ".$cont;?></th></tr>
			<tr>
				<th width="40%">Valor del puerto</th>
				<td width="55%"><input type="search" id="valor" value="<?php echo $row["valor"]?>"></td>
				<td width="5%"></td>
			</tr>
			<tr>
				<th>Velocidad del puerto</th>
				<td><input type="search" id="valor" value="<?php echo $row["velocidadpuerto"]?>"></td>
				<td></td>
			</tr>
			<tr><th colspan="2">Panel</th><th>Puerto</th></tr>
			<tr>
				<td colspan="2" align="center">
					<select>
						<?php
							$cont = 0;
							$sql = "SELECT * FROM paneles";
							$res = mysql_query($sql,$conex) or die (mysql_error());
							while($row = mysql_fetch_array($res)){
								$cont = $row["puertos"];
								//$agencia == $row['_agencia_nombre'] ? $selected = 'selected="selected"' : $selected = '';
								
								echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
							}
						?>
					</select>
				</td>
				<td align="center">
					<select>
						<?php 
							for($i = 1;$i<500;$i++){
								echo "<option>".$i."</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr><th colspan="3">Comentarios</th></tr>
			<tr><td colspan="3"><textarea id="comentarios" rows="5"></textarea></td></tr>
			<tr><td colspan="3" align="center"><label id="texto"></label></td></tr>
		</table>
	</center>
	
	<?php 
		switch($id){
			case 0:
				break;
			default:
				echo '<button onClick="eliminar()" id="eliminar">Eliminar</button>';
				break;
		}
		switch($id){
			case 0:
				echo '<button onClick="guardar()" id="agregar">Agregar</button>';
				break;
			default:
				echo '<button onClick="actualizar()" id="actualizar">Actualizar</button>';
				break;
		}
	?>	
</body>
</html>