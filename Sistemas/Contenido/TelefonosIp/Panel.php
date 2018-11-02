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
<title>Telefonos IP</title>
	<LINK href="../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		.td{
			width: 7.5%;
			width: 25vh;
			width: 25mh;
		}
		.button{
			width: 100%;
			height: auto;
			font-size: 100%;
		}
		tbody tr:hover{
			background: darkgray;
			color: black;
			
		}
		tbody a:hover{
			color: red;
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="#" onClick="descargarExcel()">Descargar</a>
		<a href="Agregar.php">Agregar</a>
	</caption>
	<center>
		<div id="busqueda">
			<form action="Panel.php" method="POST">
				<input type="search" placeholder="Buscar Telefono IP" width="30%" name="buscar" value="<?php echo $buscar;?>">
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
	</center>
	
	<br>
	
	<div id="informacion" class="fixedHeaderTable">
			<table id="datos" width="100%">
				<thead>
					<tr>
						<th class="td">IP</th>
						<th class="td">Usuario Acceso</th>
						<th class="td">Contraseña</th>
						<th class="td">Extencion 1</th>
						<th class="td">Extencion 2</th>
						<th class="td">Extencion 3</th>
						<th class="td">Extencion 4</th>
						<th class="td">Usuario</th>
						<th class="td">Area</th>
						<th class="td">Agencia</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$consulta = "SELECT * FROM telefonosip WHERE (ip LIKE '%$buscar%' OR ext1 LIKE '%$buscar%' OR ext2 LIKE '%$buscar%' OR user1 LIKE '%$buscar%' OR user2 LIKE '%$buscar%') AND _agencia LIKE '%$agencia%'";
						$resUsuario = mysql_query($consulta,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){
					?>
					<tr>
						<td class="td">
							<a href="<?php echo "http://".$row['ip'];?>" target="_blank">
								<?php echo $row["ip"];?></td>
							</a>
						<td class="td" title="Click para editar"  onClick="editar(<?php echo $row["id"] ?>)"><?php echo $row["usuarioAcceso"]; ?></td>
						<td class="td"><?php echo $row["contrasenaAcceso"]; ?></td>
						<td class="td"><?php echo $row["ext1"]; ?></td>
						<td class="td"><?php echo $row["ext2"]; ?></td>
						<td class="td"><?php echo $row["ext3"]; ?></td>
						<td class="td"><?php echo $row["ext4"]; ?></td>
						<td class="td"><?php echo $row["user1"]; ?></td>
						<td class="td"><?php echo $row["_areas"]; ?></td>
						<td class="td"><?php echo $row["_agencia"];?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
	</div>
</body>
	<script>
		function editar(id){
			location.href = "Editar.php?id="+id;
		}
		function descargarExcel(){
       		var table= document.getElementById("datos");
 			var html = table.outerHTML;
 			window.open('data:application/vnd.ms-excel,' + escape(html));
    	}
	</script>
</html>