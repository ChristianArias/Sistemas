<?php 

	include("../../conexion.php");

	if(isset($_POST['buscar'])){
		$buscar = $_POST['buscar'];
	}else{
		$buscar = "";
	}

	if(isset($_POST['agencia'])){
		$agencia = mysql_real_escape_string($_POST['agencia']);	
	}else{
		$agencia = "";
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Panel de equipos</title>
</head>
	<LINK href="../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		.td{
			max-width: 9.3vw;
			min-width: 9.3vw;
			word-break: break-all;
			word-wrap: break-word;
		}
		.button{
			width: 100%;
			height: auto;
			font-size: 100%;
		}
		tbody tr:hover{
			background: darkgray;
			color: white;
		}
		tbody a:hover{
			color: red;
		}
	</style>
<body>
	
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<center>
		<div id="busqueda">
			<form action="Panel.php" method="POST">
				<input type="search" placeholder="Buscar equipo" width="30%" name="buscar" value="<?php echo $buscar;?>">
				<select name="agencia">
					<option value="">Todas</option>
					<?php
						$sql = "SELECT * FROM _agencia";
						$res = mysql_query($sql,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($res)){
							$agencia == $row['_agencia_nombre'] ? $selected = 'selected="selected"' : $selected = '';
							echo '<option value="'.$row['_agencia_nombre'].'" '.$selected.'>'.$row['_agencia_nombre'].'</option>';
						}
					?>
				</select>
				<button name="" type="submit">Buscar</button>
			</form>
		</div>
				
		<div id="informacion" class="fixedHeaderTable">
			<caption>Equipos eliminados</caption>
			<table id="datos" width="100%">
				<thead>
					<tr>
						<th class="td">Nombre</th>
						<th class="td">Ip</th>
						<th class="td">Serie</th>
						<th class="td">Marca</th>
						<th class="td">Modelo</th>
						<th class="td">Tipo</th>
						<th class="td">Area</th>
						<th class="td">Agencia</th>
						<th class="td">Antivirus</th>
						<th class="td">Usuario</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT * FROM equipos WHERE (nombre LIKE '%$buscar%' OR area LIKE '%$buscar%' OR ip LIKE '%$buscar%' OR _serial LIKE '%$buscar%' OR _serial1 LIKE '%$buscar%' OR _serial2 LIKE '%$buscar%' OR _usuario LIKE '%$buscar%' OR serie LIKE '%$buscar%') AND _agencia LIKE '%$agencia%' AND activo = 0 ORDER BY INET_ATON(ip)";
					
						$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){
					?>
					<tr>
						<TD class="td">
							<a href="Editar.php?id=<?php echo $row["id"];?>">
								<?php
									if(isset($row["nombre"])){
										echo $row["nombre"];
									}else{
										echo "S/N";
									}
								?>
							</a>
						</TD>
            			<TD class="td">
							<?php
								$texto = $row['ip'];
								
								(strlen($texto) <= 15) ? 
									$imp = "<a href='file://' target='_blank'>".$texto."</a>" : 
									$imp ="<a href='#'>". substr($texto, 0, 15).'...'."</a>"; 
							
								echo $imp;
								//echo "<a href='#'>".$row['ip']."</a>"; 
							?>
						</TD>
            			<TD class="td">
							<?php
								$texto = $row['serie'];
								
								(strlen($texto) <= 12) ? 
									$imp = $texto : 
									$imp = substr($texto, 0, 12); 
							
								echo $imp;
								//echo "<a href='#'>".$row['ip']."</a>"; 
							?>
						</TD>
            			<TD class="td">
							<?php
								$texto = $row['marca'];
								
								(strlen($texto) <= 12) ? 
									$imp = $texto : 
									$imp = substr($texto, 0, 12); 
							
								echo $texto;
								//echo "<a href='#'>".$row['ip']."</a>"; 
							?>
						</TD>
            			<TD class="td">
							<?php
								$texto = $row['modelo'];
								
								(strlen($texto) <= 12) ? 
									$imp = $texto : 
									$imp = substr($texto, 0, 12); 
							
								echo $texto;
								//echo "<a href='#'>".$row['ip']."</a>"; 
							?>
						</TD>
            			<TD class="td"><?php echo $row['_tipo']; ?></TD>
            			<TD class="td"><?php echo $row['_areas']; ?></TD>
            			<TD class="td"><?php echo $row['_agencia']; ?></TD>
            			<TD class="td"><?php echo $row['_antivirus']; ?></TD>
            			<TD class="td"><?php echo $row['_usuario']; ?></TD>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		
	</center>
	
</body>
	<script>
		function descargarExcel(){
       		var table= document.getElementById("datos");
 			var html = table.outerHTML;
 			window.open('data:application/vnd.ms-excel,' + escape(html));
    	}
		function ir(pagina){
			location.href = pagina;
		}
	</script>
</html>

<!--


	