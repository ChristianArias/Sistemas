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
<title>Panel de impresoras</title>
</head>
	<LINK href="../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		.td{
			width: 9%;
			width: 50vh;
			width: 50mh;
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
		<a href="#openModal" onClick="alerta()">Contactos</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="#" onClick="descargarExcel()">Descargar</a>
		<a href="Nuevo.php">Agregar</a>
	</caption>
	
	<center>
		<div id="busqueda">
			<form action="Panel.php" method="POST">
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
		</div>
		
		<br>
		
		<div id="informacion">
			<caption>Impresoras</caption>
			<table border="1px" id="datos" width="100%">				
				<thead>
				<tr>
					<th class="td">Nombre</th>
					<th class="td">Ip</th>
					<th class="td">Serie</th>
					<th class="td">Marca</th>
					<th class="td">Modelo</th>
					<th class="td">Area</th>
					<th class="td">Agencia</th>
					<th class="td">Usuario</th>
					<th class="td">Contraseña</th>
					<th class="td"></th>
				</tr>
				</thead>
				<tbody>
					<?php 
						$conUsuario = "SELECT * FROM impresoras WHERE (serie LIKE '%$buscar%' OR nombre LIKE '%$buscar%' OR area LIKE '%$buscar%' OR ip LIKE '%$buscar%' OR modelo LIKE '%$buscar%') AND nombre_agencia LIKE '%$agencia%' ORDER BY INET_ATON(ip)";
						$resUsuario = mysql_query($conUsuario,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){
					?>
					<tr>
						<td class="td">
							<a href="Editar.php?id=<?php echo $row["id"];?>">
								<?php echo $row["nombre"];?>
							</a>
						</td>
						<td class="td">
							<?php								
								$ip = $row["ip"];
								echo '<a href="http://'.$ip.'" target="_blank">'.$ip."</a>";
							?>
						</td>
						<td class="td">
							<?php 
								$i = strlen($row['serie'])-6;
								echo substr($row['serie'],0,$i).'<font style="text-decoration:underline;">'.substr($row['serie'],-6).'</font>';
							?>
						</td>
						<td class="td"><?php echo $row["marca"];?></td>
						<td class="td"><?php echo $row["modelo"];?></td>
						<td class="td"><?php echo $row["nombre_area"];?></td>
						<td class="td"><?php echo $row["nombre_agencia"];?></td>
						<td class="td"><?php echo $row["usuario"];?></td>
						<td class="td"><?php echo $row["contraseña"];?></td>
						<td class="td">
							<button class="button" 
									onClick="reporte(<?php echo $row["id"];?>,'<?php echo $row["serie"];?>','<?php echo $row["nombre"]?>')">Reportes</button>
						</td>
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
		function reporte(id,serie,nombre){
			location.href = "Reportes/Panel.php?id="+id+"&serie="+serie+"&nombre="+nombre;
		}
		function alerta(){
			document.getElementById("ventana").src = "../Contactos/Panel.php";
		}
		function descargarExcel(){
       		var table= document.getElementById("datos");
 			var html = table.outerHTML;
 			window.open('data:application/vnd.ms-excel,' + escape(html));
    	}
		function editar(id){
			location.href = ""+id;
		}
	</script>
</html>