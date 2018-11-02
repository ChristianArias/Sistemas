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
<title>Documento sin título</title>
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
				<input type="search" placeholder="Buscar ata" width="30%" name="buscar" value="<?php echo $buscar;?>">
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
						<th class="td">Nombre</th>
						<th class="td">Serie</th>
						<th class="td">Ip</th>
						<th class="td">Agencia</th>
						<th class="td">Area</th>
						<th class="td">Puerto</th>
						<th class="td">Panel 1</th>
						<th class="td">Usuario</th>
						<th class="td">Puerto</th>
						<th class="td">Panel 2</th>
						<th class="td">Usuario</th>
						<th class="td">Acceso</th>
						<th class="td">Contraseña</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$conUsuario = "SELECT * FROM ata WHERE 
						(nombre LIKE '%$buscar%' OR ip LIKE '%$buscar%' OR ext1 LIKE '%$buscar%' OR ext2 LIKE '%$buscar%') AND agencias LIKE '%$agencia%'";
						$resUsuario = mysql_query($conUsuario,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){

						$statsAta = $row["statAta"];
					?>
					<tr class="inactivo">
						<td class="td">
							<a href="Editar.php?id=<?php echo $row["id"];?>"><?php echo $row["nombre"]?></a>
						</td>
						<td class="td"><?php echo $row["serie"]?></td>
						<td class="td">
							<a href="http://<?php echo $row["ip"];?>" target="_blank"><?php echo $row["ip"]?></a>
						</td>
						<td class="td"><?php echo $row["agencias"]?></td>
						<td class="td"><?php echo $row["areas"]?></td>
						<td class="td" id="user1" title="<?php echo $row["user1"]; ?>">
							<?php echo $row["ext1"]?>
						</td>
						<td class="td" id="user1"><?php echo $row["panel1"]?></td>
						<td class="td" id="user1"><?php echo $row["user1"]?></td>
						
						<td class="td" id="user2" title="<?php echo $row["user2"]; ?>">
							<?php echo $row["ext2"]?>
						</td>
						<td class="td" id="user2"><?php echo $row["panel2"]?></td>
						<td class="td" id="user2"><?php echo $row["user2"]?></td>
						<td class="td"><?php echo $row["usuarioAcceso"]?></td>
						<td class="td"><?php echo $row["contrasenaAcceso"]?></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	
</body>
	<script>
		function openCity(evt, cityName) {
    		var i, tabcontent, tablinks;
    		tabcontent = document.getElementsByClassName("tabcontent");
    		for (i = 0; i < tabcontent.length; i++) {
        		tabcontent[i].style.display = "none";
    		}
    		tablinks = document.getElementsByClassName("tablinks");
    		for (i = 0; i < tablinks.length; i++) {
        		tablinks[i].className = tablinks[i].className.replace(" active", "");
    		}
    		document.getElementById(cityName).style.display = "block";
    		evt.currentTarget.className += " active";
		}
		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
		
		function descargarExcel(){
       		var table= document.getElementById("datos");
 			var html = table.outerHTML;
 			window.open('data:application/vnd.ms-excel,' + escape(html));
    	}
		function estatus(){
			alert("as")
		}
	</script>
</html>
		
<!--

