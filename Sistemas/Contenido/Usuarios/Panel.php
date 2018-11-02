<?php

	include("../../conexion.php");

	if(isset($_POST['buscar'])){
		$buscar = $_POST['buscar'];
	}else{
		$buscar = "";
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
	<LINK href="../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		#datos{
			height: 50%;
			font-size: 10px;
		}
		.th{
			min-width: 15.9vw;
			max-width: 15.9vw;
			word-break: break-all;
			word-wrap: 	break-word;
		}
		.td{
			min-width: 15.9vw;
			max-width: 15.9vw;
			word-break: break-all;
			word-wrap: 	break-word;
		}
		.button{
			width: 100%;
			height: auto;
			font-size: 90%;
		}
		tbody tr:hover{
			background: darkgray;
			color: white;
		}
		tbody a:hover{
			color: red;
		}
		textarea{
			border: none;
			resize: none;
			/*overflow:hidden;*/
			white-space: nowrap;
			text-overflow: ellipsis;
		}
	</style>
<body>
	
	<caption id="botones" style="text-align: right" class="elemento">
		
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="#" onClick="descargarExcel()">Descargar</a>
		<a href="Nuevo.php">Agregar</a>		
		
		<center>
			<div id="busqueda">
				<form action="Panel.php" method="POST">
					<input type="search" placeholder="Buscar usuario" width="30%" name="buscar" value="<?php echo $buscar;?>">
					<button name="" type="submit">Buscar</button>
				</form>
			</div>
		</center>
		
	</caption>
	
	<br>
	
	<center>
		<div id="informacion" class="fixedHeaderTable">
			<table id="datos" width="100%" border="1px">
				<thead>
				<tr>
					<th class="th">No. Vendedor</th>
					<th class="th">Nombre</th>
					<th class="th">Puesto</th>
					<th class="th">Area</th>
					<th class="th">Agencia</th>
					<th class="th">Correo</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT * FROM usuario WHERE (usuario LIKE '%$buscar%' OR puesto LIKE '%$buscar%') ORDER BY usuario";				
						$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){
					?>
					<tr>
						<td class="td"><?php echo $row["novendedor"];?></td>
            			<td class="td">
							<a href="Editar.php?id=<?php echo $row["id"]?>"><?php echo $row['usuario']; ?></a>
						</td>
            			<td class="td"><?php echo $row['puesto']; ?></td>
						<td class="td"><?php echo $row['nombreArea']; ?></td>
						<td class="td"><?php echo $row['_agencia']; ?></td>
						<td class="td" title="<?php echo $row['correo']; ?>">
							<?php echo $row['correo']; ?><!--<textarea disabled></textarea>-->
						</td>
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
	</script>
</html>
		
		<!--
<table id="datos" width="100%">
				<thead>
				<tr>
					<th class="td">No. Vendedor</th>
					<th class="td1">Nombre</th>
					<th class="td2">Puesto</th>
					<th class="td3">Area</th>
					<th class="td4">Agencia</th>
					<th class="td5">Correo</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT * FROM usuario WHERE (usuario LIKE '%$buscar%' OR puesto LIKE '%$buscar%')";					
						$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){
					?>
					<tr>
						<td class="td"><?php echo $row["novendedor"];?></td>
            			<td class="td1">
							<a href="Editar.php?id=<?php echo $row["id"]?>"><?php echo $row['usuario']; ?></a>
						</td>
            			<td class="td2"><?php echo $row['puesto']; ?></td>
						<td class="td3"><?php echo $row['nombreArea']; ?></td>
						<td class="td4"><?php echo $row['_agencia']; ?></td>
						<td class="td5"><?php echo $row['correo']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
