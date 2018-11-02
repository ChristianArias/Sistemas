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

	if(isset($_POST['agrupacion'])){
		$agrupacion = $_POST['agrupacion'];	
		$agrupacion == "" ? $agrupaciones = "" : $agrupaciones = "_tipo in (\"".str_replace(',','","',$agrupacion)."\") AND";
	}else{
		$agrupacion = "";
		$agrupaciones = "";
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
		.td{
			min-width: 11.9vw;
			max-width: 11.9vw;
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
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="#" onClick="descargarExcel()">Descargar</a>
		<div style="float:right">
			<a href="#openModal" onClick="alerta('Agrupaciones/Panel.php')">Agrupaciones</a>
		</div>
	</caption>
	
	<center>
		<div id="busqueda">
			<form action="Panel.php" method="POST">
				<input type="search" placeholder="Buscar" width="30%" name="buscar" value="<?php echo $buscar;?>">
				<select name="agencia" title="Agencias">
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
				<select name="agrupar" title="Agrupaciones">
					<option value="">Todas</option>
					<?php
						$conAgrupacion = "SELECT * FROM _agrupaciones";
						$resAgrupacion = mysql_query($conAgrupacion,$conex) or die (mysql_error());
						while($res = mysql_fetch_array($resAgrupacion)){
							$agrupacion == $res['valores'] ? $selected = 'selected="selected"' : $selected = '';
							echo '<option value="'.$res['valores'].'" '.$selected.' title="'.$res['valores'].'">'.$res['nombre'].'</option>';
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
						<th class="td">Area</th>
						<th class="td">Tipo</th>
						<th class="td">Agencia</th>
						<th class="td">Antivirus</th>
						<th class="td">Usuario</th>
						<th class="td">Puesto</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$conUsuario = "SELECT * FROM lista WHERE $agrupaciones
						(nombre LIKE '%$buscar%' OR ip LIKE '%$buscar%' OR _area LIKE '%$buscar%' OR tipo LIKE '%$buscar%' OR usuario LIKE '%$buscar%') AND _agencia LIKE '%$agencia%'";
						$resUsuario = mysql_query($conUsuario,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){
					?>
					<tr>
						<TD class="td"><?php echo $row['nombre']; ?></TD>
            			<TD class="td"><?php echo $row['ip']; ?></TD>
            			<TD class="td"><?php echo $row['_area']; ?></TD>
            			<TD class="td"><?php echo $row['_tipo']; ?></TD>
            			<TD class="td"><?php echo $row['_agencia']; ?></TD>
            			<TD class="td"><?php echo $row['antivirus']; ?></TD>
            			<TD class="td"><?php echo $row['usuario']; ?></TD>
            			<TD class="td"><?php echo $row['puesto']; ?></TD>
					</tr>
					<?php }?>
				</tbody>
			</table>
	</div>
	<div id="openModal" class="modalDialog">
		<div class="elemento">
			<a href="#close" title="Close" class="close">X</a>
			<iframe id="ventana" width="100%" height="100%" src="" class="ventana"></iframe>
		</div>
	</div>
</body>
	<script>
		function alerta(pagina){
			document.getElementById("ventana").src = pagina;
		}
		function descargarExcel(){
			var table= document.getElementById("informacion");
			var html = table.outerHTML;
			window.open('data:application/vnd.ms-excel,' + escape(html));
    	}
	</script>
</html>