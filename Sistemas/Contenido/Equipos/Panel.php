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
	<script src="../../JS/Sort.js"></script>
	<style>
		.td{
			max-width: 9.4vw;
			min-width: 9.4vw;
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
		<a href="Agregar.php">Agregar</a>
		<a href="Papelera.php">Papelera</a>
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
		
		<br>
		
		<div id="informacion" class="fixedHeaderTable">
			<table id="datos" width="100%">
				<thead>
					<tr>
						<th class="td" onclick="sortTable(0)">Nombre</th>
						<th class="td" onclick="sortTable(1)">Ip</th>
						<th class="td" onclick="sortTable(2)">Serie</th>
						<th class="td" onclick="sortTable(3)">Marca</th>
						<th class="td" onclick="sortTable(4)">Modelo</th>
						<th class="td" onclick="sortTable(5)">Tipo</th>
						<th class="td" onclick="sortTable(6)">Area</th>
						<th class="td" onclick="sortTable(7)">Agencia</th>
						<th class="td" onclick="sortTable(8)">Antivirus</th>
						<th class="td" onclick="sortTable(9)">Usuario</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT * FROM equipos WHERE (nombre LIKE '%$buscar%' OR area LIKE '%$buscar%' OR ip LIKE '%$buscar%' OR _serial LIKE '%$buscar%' OR _serial1 LIKE '%$buscar%' OR _serial2 LIKE '%$buscar%' OR _usuario LIKE '%$buscar%' OR serie LIKE '%$buscar%') AND _agencia LIKE '%$agencia%' AND activo = 1 ORDER BY INET_ATON(ip)";
					
						$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){
					?>
					<tr>
						<TD class="td">
							<a href="Editar.php?id=<?php echo $row["id"];?>">
								<?php  echo $row['nombre']; ?>
							</a>
						</TD>
            			<TD class="td">
							<?php 
								echo str_replace(',',',<br>',$row["ip"]);
							?>
						</TD>
            			<TD class="td"><?php echo $row['serie'];?></TD>
            			<TD class="td"><?php echo $row['marca'];?></TD>
            			<TD class="td"><?php echo $row['modelo'];?></TD>
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
		function sortTable(n) {
			var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
			table = document.getElementById("datos");
			switching = true;
			//Set the sorting direction to ascending:
			dir = "asc"; 
			/*Make a loop that will continue until
			no switching has been done:*/
			while (switching) {
				//start by saying: no switching is done:
				switching = false;
				rows = table.getElementsByTagName("TR");
				/*Loop through all table rows (except the
				first, which contains table headers):*/
				for (i = 1; i < (rows.length - 1); i++) {
					//start by saying there should be no switching:
					shouldSwitch = false;
					/*Get the two elements you want to compare,
					one from current row and one from the next:*/
					x = rows[i].getElementsByTagName("TD")[n];
					y = rows[i + 1].getElementsByTagName("TD")[n];
					/*check if the two rows should switch place,
					based on the direction, asc or desc:*/
						if(dir == "asc") {
							if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
							//if so, mark as a switch and break the loop:
								shouldSwitch= true;
								break;
							}
						} else if (dir == "desc") {
							if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
							//if so, mark as a switch and break the loop:
							shouldSwitch= true;
							break;
						}
					}//fin del for
				}//fin del while
				if (shouldSwitch) {
					/*If a switch has been marked, make the switch
					and mark that a switch has been done:*/
					rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
					switching = true;
					//Each time a switch is done, increase this count by 1:
					switchcount ++; 
				}else {
					/*If no switching has been done AND the direction is "asc",
					set the direction to "desc" and run the while loop again.*/
					if (switchcount == 0 && dir == "asc") {
						dir = "desc";
						switching = true;
					}
				}
			}
		}
		
	</script>
</html>

<!--


	