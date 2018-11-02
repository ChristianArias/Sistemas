<?php 
	
	include("../../../conexion.php");

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
<title>Listado general de reportes</title>
	<LINK href="../../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		td{
			min-width: 27.5vh;
			max-width: 27.5vh;
			word-break: break-all;
			word-wrap: break-word;
			border: none;
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="#" onClick="descargarExcel()">Descargar</a>
		<a href="../Panel.php">Impresoras</a>
		
		<center>
			<form action="Reportes.php" method="POST">
				<input type="search" placeholder="Buscar impresora" width="30%" name="buscar" value="<?php echo $buscar;?>">
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
		</center>
	</caption>
	
	<br>
	
	<center>
		<div id="informacion">
			<table border="1px" id="datos" width="100%">				
				<thead>
				<tr>
					<th class="td">Reporte</th>
					<th class="td">Impresora</th>
					<th class="td">Serie</th>
					<th class="td">Area</th>
					<th class="td">Agencia</th>
					<th class="td">Fecha</th>
					<th class="td">Falla</th>
					<th class="td">Trabajo efectuado</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT * FROM reportes_impresoras WHERE (idreporte LIKE '%$buscar%' OR nombre LIKE '%$buscar%' OR serie LIKE '%$buscar%') AND agencia LIKE '%$agencia%' ORDER BY fecha DESC";
						$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){
					?>
					<tr>
						<td class="td" align="center">
							<a href="#openModal" onClick="mostrar('../Reportes/Ver.php?id=<?php echo $row["id"];?>')">
								<?php echo $row["idreporte"]; ?>
							</a>
						</td>
						<td class="td" align="center">
							<?php echo $row["nombre"]; ?></a>
						</td>
						<td class="td" align="center"><?php echo $row["serie"]; ?></td>
						<td class="td" align="center"><?php echo $row["area"]; ?></td>
						<td class="td" align="center"><?php echo $row["agencia"]; ?></td>
						<td class="td" align="center"><?php echo $row["fecha"]; ?></td>
						<td class="td"><?php echo $row["fallareportada"]; ?></td>
						<td class="td"><?php echo $row["trabajoefectuado"]; ?></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</center>
	
	<div id="openModal" class="modalDialog">
		<div class="elemento">
			<a href="#close" title="Close" class="close">X</a>
			<center></cen><label id="name"></label></center>
			<iframe id="ventana" width="100%" height="100%" src="" class="ventana"></iframe>
		</div>
	</div>
	
</body>
	<script>
		function mostrar(pagina){
			document.getElementById("ventana").src = pagina;
		}
		
		function descargarExcel(){
       		var table= document.getElementById("datos");
 			var html = table.outerHTML;
 			window.open('data:application/vnd.ms-excel,' + escape(html));
    	}
	</script>
</html>